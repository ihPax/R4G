<template>
  <div class="text-center section">
    <h2 class="flex justify-center font-bold text-lg">
      <div v-if="isExpanded || !isExpanded && !isMobile" @click="read = read == null ? false : null" class="flex-grow pt-4 border-b border-gray-200 xs:border-b-0 bg-blue-50 xs:bg-white font-medium xs:font-bold text-xl cursor-pointer"> 
        Calendario <span v-if="isZoneSettled && isExpanded">zona di {{zone.name}}</span> 
        <button type="button" class="block mx-auto">
          <svg v-if="read == null" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" :class="!isZoneSettled ? 'animate-bounce-short' : 'animate-pulse-short'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
          </svg>
          <svg v-if="read != null" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" :class="!isZoneSettled ? 'animate-bounce-short' : 'animate-pulse-short'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 11l7-7 7 7M5 19l7-7 7 7" />
          </svg>
        </button>
      </div>
    </h2>
    <div v-if="isExpanded || !isExpanded && !isMobile" class="text-sm mx-auto max-w-4xl my-2"> 
      <button v-if="read != null" @click="read = read == null ? true : !read" class="flex flex-col p-2 mx-auto bg-blue-50 border border-blue-300 sm:rounded" :class="read == false || !isMobile ? 'rounded' : 'pb-0'">
        <div v-if="read == false" class="flex items-center">
          <div class="font-medium ml-0.5 sm:text-base"> Clicca qui per info<span v-if="!isMobile">rmazioni</span> sugli orari di ritiro </div>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
          </svg>
        </div>
        <div v-if="read == true" class="text-left flex-grow"> I rifiuti vanno esposti la <span class="font-semibold">sera precedente</span> il giorno di raccolta <span class="font-semibold">dalle ore 19.00 alle ore 21.00</span>. Nel calendario viene evidenziato il giorno corrente fino alle 12, poi quello successivo, visto che a quell'ora è già stato effettuato il ritiro. </div>
        <div v-if="read == true" class="inline-block mx-auto"> 
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
          </svg> 
        </div> 
      </button>
    </div>
    <div v-if="(read == false && (isMobile && isExpanded || !isMobile && !isExpanded)) && isZoneSettled" class="my-1 px-2 font-medium text-sm sm:text-base"> Clicca sul calendario per la legenda colori </div>
    <div v-if="(read == false && (!isMobile && isExpanded || !isMobile && isExpanded)) && isZoneSettled" class="sm:py-2 text-sm sm:text-base font-medium"> Clicca sui bottoni colorati per vedere che tipo di rifiuti vanno gettati in quel cestino </div>
    <v-calendar
      ref="calendar"
      class="custom-calendar max-w-full"
      :masks="masks"
      :attributes="attributes"
      disable-page-swipe
      :min-date="new Date()"
    >
      <template v-slot:day-content="{ day, attributes }">
        <div v-if="isZoneSettled" class="flex flex-col h-full z-10 overflow-hidden" :class="isMobile || !isExpanded ? 'cursor-pointer' : null" @click="isMobile || !isExpanded ? switchColorLegend() : null">
          <div v-for="(attr, index) in attributes" :key="index"
            class="day-label mx-auto px-1"
            :class="{
              'text-sm': !isExpanded,
              'text-gray-400': day.date.setHours(0,0,0,0) < new Date().setHours(0,0,0,0),
              'my-1': day.date.setHours(0,0,0,0) != pickUpDay.setHours(0,0,0,0),
              'text-black font-extrabold border-b-4 border-black mt-1': isExpanded && day.date.setHours(0,0,0,0) == pickUpDay.setHours(0,0,0,0),
              'text-black font-extrabold underline border-black my-1': !isExpanded && day.date.setHours(0,0,0,0) == pickUpDay.setHours(0,0,0,0),
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
                @click="!isMobile && isExpanded && attr.customData.material != null ? showMaterial(attr.customData.material) : null"
              >
                <div class="hidden sm:block">{{ isExpanded ? attr.customData.material : "" }}</div> 
              </div>
            </div>
          </div>
        </div>
        <div v-else>
          <div class="flex justify-center mx-auto py-2 sm:py-4">
            <div :class="{
              'text-sm': !isExpanded,
              'text-gray-400': day.date.setHours(0,0,0,0) < new Date().setHours(0,0,0,0),
              'text-black font-extrabold': day.date.setHours(0,0,0,0) == new Date().setHours(0,0,0,0) //viene evidenziato oggi, visto che non è settata una zona e relativi ritiri
            }"> {{ day.day }} </div>
          </div>
        </div>
      </template>
    </v-calendar>
    <div v-if="isExpanded" class="flex flex-col items-center xs:mt-4 mb-20 xs:mb-4">
      <t-modal v-model="showModal" header="Scegli la tua zona" close="chiudi">
        <Modal @exit="switchModal(true)" @catch-error="catchErr" :isMobile="isMobile"></Modal>
      </t-modal>
      <t-button @click="switchModal(false)" type="button"> {{ !isZoneSettled ? "Scegli" : "Cambia" }} la zona </t-button>
    </div>
    <t-modal v-model="showColorLegend" header="Legenda colori" close="chiudi">
      <ColorLegend @exit="switchColorLegend()" @catch-error="catchErr" :isMobile="isMobile" :isExpanded="isExpanded"></ColorLegend>
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
      zone: {},
      attributes: [],
      showModal: false,
      isZoneSettled: false,
      showColorLegend: false,
      pickUpDay: 0,
      read: null,
    };
  },
  mounted() {
    this.getPickUpDate();
    JSON.parse(localStorage.getItem("MaterialDescriptions"));
    this.getZone();
  },
  methods: {
    /** Determina se mostrare evidenziato all'utente il giorno corrente oppure il successivo
     * (dalle 12 in poi, per essere previdenti), visto che A.M.I.A. dice: 
     * <<I rifiuti vanno esposti (a bordo strada) la sera antecedente il giorno di raccolta 
     *   dalle ore 19.00 alle ore 21.00>>
     */
    async getPickUpDate() {
      const today = new Date();
      if (today.getHours() >= 12 && today.getHours() < 24) {
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1); //metto il giorno seguente
        tomorrow.setHours(0,0,0,0); //mezzanotte esatta
        this.pickUpDay = tomorrow;
        const calendar = this.$refs.calendar;
        await calendar.focusDate(tomorrow); //il calendario si centra sulla data; utile se oggi è l'ultimo giorno del mese e si vuole visualizzare il ritiro di domani
      } else {
        today.setHours(0,0,0,0);
        this.pickUpDay = today;
      }
    },
    getZone() {
      let zone = JSON.parse(localStorage.getItem("Zone"));
      if (zone) {
        this.isZoneSettled = true;
        this.zone = zone;
        this.calendar();
      }
    },
    showMaterial(materialUpper) {
      let material = materialUpper.toLowerCase();
      this.$router.push({
        name: "material-description",
        params: { material }
      });
    },
    calendar() {
      this.zone.calendars.forEach(calendar => {
        this.attributes.push({
          customData: {
            material: calendar.material,
            class: calendar.class,
            isOnlySummer: calendar.isOnlySummer,
          },
          dates: { monthlyInterval: 1, weekdays: calendar.nDay } //'monthlyInterval: 1' significa 'ogni mese'
        });
      });
    },
    /**
     * Determina se la finestra di dialogo è aperta e va chiusa o viceversa. Alla chiusura esegue altre operazioni.
     * @param needReset {boolean} Se vero perché cambia la zona (di solito alla chiusura della finestra modale), resetta gli attributi e li ricalcola.
     */
    switchModal(needReset) {
      this.showModal = !this.showModal;
      if (needReset == true) {
        this.attributes = [];
        this.getZone();
      }
    },
    switchColorLegend() {
      this.showColorLegend = !this.showColorLegend;
    },
    catchErr(e) {
      this.$emit('catch-error', e);
      this.switchModal(true);
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
