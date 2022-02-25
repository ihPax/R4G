<template>
  <div class="text-center section">
    <h2 class="flex justify-center font-bold text-lg">
      <div v-if="isExpanded" class="py-3 bg-blue-50 xs:bg-white font-medium xs:font-bold"> Calendario zona di {{calendars.name}} </div>
    </h2>
    <v-calendar
      class="custom-calendar max-w-full"
      :masks="masks"
      :attributes="attributes"
      disable-page-swipe
      :min-date="new Date()"
    >
    <template v-slot:day-content="{ day, attributes }">
        <div class="flex flex-col h-full z-10 overflow-hidden">
          <span 
            class="day-label text-gray-900 sm:my-1"
            :class="isExpanded ? 'text-base' : 'text-sm'"
          >{{ day.day }}</span>
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

      <!-- <template v-slot:day-content="{ day, attributes }">
        <div v-for="attr in attributes" :key="attr.id"
         class="flex flex-col h-full z-10 overflow-hidden ">
          <span :class="!isExpanded ? attr.customData.class + ' flex content-center items-center justify-center text-white w-6 h-6 rounded-full text-sm'  :'day-label text-sm text-gray-900 my-1'">{{ day.day }}</span>
          <div class="flex-grow overflow-y-auto overflow-x-auto">
            <div
              class="mt-0 mb-1 font-bold"
              :class="isExpanded ? 
              attr.customData.class + ' text-xxs w-2 h-2 mx-auto rounded-full sm:text-xs sm:leading-tight sm:rounded sm:p-2 sm:mx-1 sm:text-white sm:w-auto sm:h-auto' : 
              ''"
            >
              <div class="hidden sm:block">{{ isExpanded ? attr.customData.title : "" }}</div> 
            </div>
          </div>
        </div>
      </template> -->
    </v-calendar>
    <div v-if="isExpanded" class="flex flex-col items-center mt-10">
      <t-modal v-model="showModal" header="Scegli il tuo Comune" close="chiudi">
        <Modal @exit="closeModal"></Modal>
      </t-modal>
      <t-button v-if="!isMobile" @click="showModalTrue()" type="button">Cambia la zona</t-button>
      <button v-else 
        class="font-bold text-base px-4 py-2 mx-5 rounded border-2 border-orangelogo text-orangelogo bg-white"
        @click="showModalTrue()"
      >
        <div class="">Cambia la zona</div>
      </button>
    </div>
  </div>
</template>

<script>
import Modal from "@/components/Modal";
export default {
  name: "Calendar",
  components: {
    Modal
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
      calendars: [],
      attributes: [],
      showModal: false
    };
  },
  mounted() {
    this.calendars = JSON.parse(localStorage.getItem("Zone")) || "";
    if (this.calendars != "") {
      this.calendar();
    }
    console.log("dopo chiusura")
  },
  methods: {
    calendar() {
      console.log("inzio")
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
    closeModal() {
      this.showModal = !this.showModal;
      this.attributes = [];
      this.calendars = JSON.parse(localStorage.getItem("Zone")) || "";
      if (this.calendars != "") {
        this.calendar();
      }
      console.log(this.calendars.calendars.length)
    },
    showModalTrue() {
      this.showModal = !this.showModal;
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
/deep/ .custom-calendar.vc-container {
  --day-border: 1px solid #b8c2cc;
  --day-border-highlight: 1px solid #b8c2cc;
  --day-width: 90px;
  --day-height: 90px;
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
  }
  & .vc-weekday {
    background-color: var(--weekday-bg);
    border-bottom: var(--weekday-border);
    border-top: var(--weekday-border);
    padding: 5px 0;
  }
  & .vc-day {
    padding: 0 5px 3px 5px;
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
