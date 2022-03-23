<template>
  <div class="text-center section">
    <h2 class="flex justify-center font-bold text-lg">
      <div v-if="isExpanded" class="flex-grow py-4 border-b border-gray-200 xs:border-b-0 bg-blue-50 xs:bg-white font-medium xs:font-bold text-xl"> 
        Calendario <span v-if="isZoneSettled">zona di {{calendars.name}}</span> 
      </div>
    </h2>
    <div v-if="isExpanded" class="text-xs sm:text-sm mx-auto max-w-4xl my-2"> 
      <button @click="read = !read" class="flex flex-col px-3 py-2 mx-auto bg-blue-50 border border-blue-400" :class="read == false ? 'rounded' : null">
        <div v-if="read == false" class="inline-block mx-auto font-medium"> Clicca qui per informazioni sugli orari di ritiro </div>
        <div v-if="read == true" class="text-left flex-grow"> I rifiuti vanno esposti la <span class="font-semibold">sera precedente</span> il giorno di raccolta <span class="font-semibold">dalle ore 19.00 alle ore 21.00</span>. Nel calendario viene evidenziato il giorno corrente fino alle 12, poi quello successivo, visto che a quell'ora è già stato effettuato il ritiro. </div>
        <div v-if="read == true" class="inline-block font-medium italic mx-auto"> Nascondi testo</div>
      </button>      
    </div>
    <div v-if="isMobile && isExpanded || !isMobile && !isExpanded" class="text-xs my-1 px-2 font-medium"> Clicca sul calendario per la legenda colori </div>
    <div v-if="!isMobile && isExpanded" class="text-xs sm:text-sm sm:py-2 font-medium"> Clicca sui bottoni colorati per vedere che tipo di rifiuti vanno gettati in quel cestino </div>
    <v-calendar
      class="custom-calendar max-w-full"
      :masks="masks"
      :attributes="attributes"
      disable-page-swipe
      :min-date="new Date()"
    >
      <template v-slot:day-content="{ day, attributes }">
        <div v-if="isZoneSettled" class="flex flex-col h-full z-10 overflow-hidden" :class="isMobile || !isExpanded ? 'cursor-pointer' : null" @click="isMobile || !isExpanded ? switchColorLegend(true) : null">
          <div v-for="(attr, index) in attributes" :key="index"
            class="day-label my-1 mx-auto px-1"
            :class="{
              'text-sm': !isExpanded,
              'text-gray-900': day.date.setHours(0,0,0,0) != pickUpDay.setHours(0,0,0,0),
              'text-black font-extrabold border-b-3 border-black': day.date.setHours(0,0,0,0) == pickUpDay.setHours(0,0,0,0)
            }"
          > {{ day.day }} </div>
          <!-- <div class="h-8 w-8 rounded-full pt-1" :class="attr.customData.isOnlySummer == false && attr.customData.class != null || attr.customData.isOnlySummer == true && (day.month == 6 || day.month == 7 || day.month == 8 || day.month == 9) ? attr.customData.class + ' text-white pt-1' : ' text-black'"> {{ day.day }} </div> -->
          <div class="flex-grow overflow-y-auto overflow-x-auto">
            <div
              v-for="(attr, index) in attributes"
              :key="index"
              class="font-bold"
            >
              <div v-if="attr.customData.isOnlySummer == false && attr.customData.class != null || attr.customData.isOnlySummer == true && (day.month == 6 || day.month == 7 || day.month == 8 || day.month == 9)"
                :class="isExpanded ? 
                attr.customData.class + ' mt-1 mb-3 w-4 h-4 mx-auto rounded-full sm:text-xs sm:leading-tight sm:rounded sm:p-2 sm:mx-1 sm:text-white sm:w-auto sm:h-auto cursor-pointer' : 
                attr.customData.class + ' mt-0 w-3 h-3 mx-auto rounded-full cursor-pointer'"
                @click="!isMobile && isExpanded && attr.customData.class != null ? showMaterial(attr.customData.title) : null"
              >
                <div class="hidden sm:block">{{ isExpanded ? attr.customData.title : "" }}</div> 
              </div>
            </div>
          </div>
        </div>
        <div v-else>
          <div class="flex justify-center mx-auto py-2 sm:py-4">
            <div :class="{
              'text-gray-900': day.date.setHours(0,0,0,0) != new Date().setHours(0,0,0,0),
              'text-black font-extrabold border-b-3 border-black': day.date.setHours(0,0,0,0) == new Date().setHours(0,0,0,0)
            }"> {{ day.day }} </div>
          </div>
        </div>
      </template>
    </v-calendar>
    <div v-if="isExpanded" class="flex flex-col items-center xs:mt-4 mb-20 xs:mb-4">
      <t-modal v-model="showModal" header="Scegli la tua zona" close="chiudi">
        <Modal @exit="switchModal(false)" @catch-error="catchErr" :isMobile="isMobile"></Modal>
      </t-modal>
      <t-button @click="switchModal(true)" type="button">Cambia la zona</t-button>
    </div>
    <t-modal v-model="showColorLegend" header="Legenda colori" close="chiudi">
      <ColorLegend @exit="switchColorLegend(false)" @catch-error="catchErr" :isMobile="isMobile" :isExpanded="isExpanded"></ColorLegend>
    </t-modal>
  </div>
</template>

<script>
import Modal from "@/components/Modal";
import ColorLegend from "@/components/ColorLegend";

export default {
  name: "Calendar",
  components: {
    Modal,
    ColorLegend
  },
  props: {
    isExpanded: {
      type: Boolean,
      default: true
    },
    isMobile: {
      type: Boolean,
      default: true
    },
  },
  data() {
    return {
      masks: {
        weekdays: "WWW",
      },
      calendars: {},
      attributes: [],
      showModal: false,
      isZoneSettled: false,
      showColorLegend: false,
      pickUpDay: 0,
      read: false,
    };
  },
  mounted() {
    this.getPickUpDate();
    JSON.parse(localStorage.getItem("MaterialDescriptions"));
    this.getZone();
  },
  methods: {
    /** Determina se mostrare evidenziato all'utente il giorno corrente oppure il successivo
     * (dalle 12 in poi per essere previdenti), visto che A.M.I.A. dice: 
     * <<I rifiuti vanno esposti (a bordo strada) la sera antecedente il giorno di raccolta 
     *   dalle ore 19.00 alle ore 21.00>>
     */
    getPickUpDate() {
    const today = new Date();
      if (today.getHours() >= 12 && today.getHours() < 24) {
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1); //metto il giorno seguente
        tomorrow.setHours(0,0,0,0); //mezzanotte esatta
        this.pickUpDay = tomorrow;
      } else {
        today.setHours(0,0,0,0);
        this.pickUpDay = today;
      }
    },
    getZone() {
      let zone = JSON.parse(localStorage.getItem("Zone"));
      if (zone) {
        this.isZoneSettled = true;
        this.calendars = zone;
        this.calendar();
      }
    },
    showMaterial(materialUpper) {
      let material = materialUpper.toLowerCase();
      this.$router.push({name: "material-description", params: {material}});
    },
    calendar() {
      for (let i = 0; i < this.calendars.calendars.length; i++) {
        this.attributes.push({
          customData: {
            title: this.calendars.calendars[i].material,
            class: this.calendars.calendars[i].class,
            isOnlySummer: this.calendars.calendars[i].isOnlySummer,
          },
          dates: { months: [1,2,3,4,5,6,7,8,9,10,11,12], weekdays: this.calendars.calendars[i].nDay} //NOTA: In realtà il rifiuto va portato fuori la sera prima!
        });
      }
    },
    /**
     * Determina se la finestra di dialogo è aperta e va chiusa viceversa. Alla chiusura esegue altre operazioni.
     * @param isOpening {boolean} Vero se il click è per aprire la finestra, falso altrimenti.
     */
    switchModal(isOpening) {
      this.showModal = !this.showModal;
      if (isOpening == false) {
        this.attributes = [];
        this.getZone();
      }
    },
    switchColorLegend() {
      this.showColorLegend = !this.showColorLegend;
    },
    catchErr(e) {
      this.$emit('catch-error', e);
      this.switchModal('false');
    }
  },
};
</script>

<style lang="postcss" scoped>
::-webkit-scrollbar {
  width: 0px;
}
::-webkit-scrollbar-track {
  display: none;
}

/deep/ .vc-container {
  border-color: rgb(255, 255, 255);  
}
/deep/ .custom-calendar.vc-container {
  --day-border: 1px solid #b8c2cc;
  --day-border-highlight: 1px solid #b8c2cc;
  --day-width: 30px;
  --day-height: 30px;
  --weekday-bg: #f8fafc;
  --weekday-border: 1px solid #eaeaea;
  border-radius: 0;
  width: 100%;
  & .vc-header {
    background-color: #f1f5f8;
    padding: 4px 0;
  }
  & .vc-weeks {
    padding: 0;
    margin: 0;
  }
  & .vc-weekday {
    background-color: var(--weekday-bg);
    border-bottom: var(--weekday-border);
    border-top: var(--weekday-border);
    padding: 1px 0;
  }
  & .vc-day {
    padding: 0;
    text-align: left;
    height: var(--day-height);
    min-width: var(--day-width);
    background-color: white;
    &.weekday-1,
    &.weekday-7 {
      background-color: #eff8ff;
    }
    &:not(.on-bottom) {
      border-bottom: var(--day-border);
      &.weekday-1 {
        border-bottom: var(--day-border-highlight);
      }
    }
    &:not(.on-right) {
      border-right: var(--day-border);
    }
  }
  & .vc-day-dots {
    margin-bottom: 5px;
  }
}
</style>
