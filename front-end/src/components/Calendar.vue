<template>
  <div class="text-center section">
    <h2 class="flex justify-center font-bold text-lg">
      <div v-if="isExpanded" class="flex-grow py-4 border-b border-gray-200 xs:border-b-0 bg-blue-50 xs:bg-white font-medium xs:font-bold text-xl"> Calendario <span v-if="isZoneSettled">zona di {{calendars.name}}</span> </div>
    </h2>
    <div v-if="isMobile && isExpanded" class="text-xxs mt-2">Clicca sul calendario per vedere la legenda colori</div>
    <v-calendar
      class="custom-calendar max-w-full"
      :masks="masks"
      :attributes="attributes"
      disable-page-swipe
      :min-date="new Date()"
    >
      <template v-slot:day-content="{ day, attributes }">
        <div class="flex flex-col h-full z-10 overflow-hidden cursor-pointer" @click="switchColorLegend(true)">
          <span 
            class="day-label text-gray-900 sm:my-1"
            :class="isExpanded ? 'text-base' : 'text-sm'"
          > {{ day.day }} </span>
          <div class="flex-grow overflow-y-auto overflow-x-auto">
            <div
              v-for="attr in attributes"
              :key="attr.id"
              class="sm:mb-1 font-bold"
              :class="isExpanded ? 
              attr.customData.class + ' mt-1 mb-3 w-4 h-4 mx-auto rounded-full sm:text-xs sm:leading-tight sm:rounded sm:p-2 sm:mx-1 sm:text-white sm:w-auto sm:h-auto' : 
              attr.customData.class + ' mt-0 w-2 h-2 mx-auto rounded-full'"
            >
              <div class="hidden sm:block">{{ isExpanded ? attr.customData.title : "" }}</div> 
            </div>
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
      <ColorLegend @exit="switchColorLegend(false)" @catch-error="catchErr" :isMobile="isMobile"></ColorLegend>
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
      showColorLegend: false
    };
  },
  mounted() {
    this.getZone();
  },
  methods: {
    getZone() {
      let zone = JSON.parse(localStorage.getItem("Zone"));
      if (zone) {
        this.isZoneSettled = true;
        this.calendars = zone;
        this.calendar();
      }
    },
    calendar() {
      for (let i = 0; i < this.calendars.calendars.length; i++) {
        this.attributes.push({
          customData: {
            title: this.calendars.calendars[i].material,
            class: this.calendars.calendars[i].class,
          },
          dates: { months: [1,2,3,4,5,6], weekdays: this.calendars.calendars[i].nDay + 2 },
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
    padding: 10px 0;
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
