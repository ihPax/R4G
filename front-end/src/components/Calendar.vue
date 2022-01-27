<template>
  <div class="text-center section">
    <h2 class="p-3 font-bold text-lg">Calendario Comune di {{calendars.name}}</h2>
    <v-calendar
      class="custom-calendar max-w-full"
      :masks="masks"
      :attributes="attributes"
      disable-page-swipe
      :min-date="new Date()"
    >
      <template v-slot:day-content="{ day, attributes }">
        <div class="flex flex-col h-full z-10 overflow-hidden">
          <span class="day-label text-sm text-gray-900 my-1">{{ day.day }}</span>
          <div class="flex-grow overflow-y-auto overflow-x-auto">
            <div
              v-for="attr in attributes"
              :key="attr.id"
              class="mt-0 mb-1 font-bold"
              :class="$route.name == 'calendar' ? 
              attr.customData.class + ' text-xxs w-2 h-2 mx-auto rounded-full sm:text-xs sm:leading-tight sm:rounded-none sm:p-2 sm:mx-1 sm:text-white sm:w-full sm:h-full' : 
              attr.customData.class + ' w-2 h-2 mx-auto rounded-full'"
            >
              <div class="hidden sm:block">{{ $route.name == "calendar" ? attr.customData.title : "" }}</div> 
            </div>
          </div>
        </div>
      </template>
    </v-calendar>
  </div>
</template>

<script>
export default {
  name: "Calendar",
  data() {
    // const month = new Date().getMonth();
    // const year = new Date().getFullYear();
    return {
      masks: {
        weekdays: "WWW",
      },
      calendars: [],
      attributes: [],
      // attributes: [
      //   {
      //     id: 1,
      //     customData: {
      //       title: "Carta",
      //       class: "bg-green-600",
      //     },
      //     dates: { months: [1,2,3,4,5,6], weekdays: 2 },
      //   },
    };
  },
  mounted() {
    this.calendars = JSON.parse(localStorage.getItem("Zone"));
    this.calendar();
  },
  methods: {
    calendar() {
      for (let i = 0; i < this.calendars.calendars.length; i++) {
        // console.log(this.attributes[i].customData.title)
        this.attributes.push({
          customData: {
            title: this.calendars.calendars[i].material,
            class: this.calendars.calendars[i].class,
          },
          dates: { months: [1,2,3,4,5,6], weekdays: this.calendars.calendars[i].nDay + 2 },
        });
        // console.log(this.calendars.calendars[i].nDay + 2);
        // this.attributes[i].customData.title = this.calendars.calendars[i].material;
        // this.attributes[i].customData.class = this.calendars.calendars[i].class;
        // this.attributes[i].dates.weekdays = this.calendars.calendars[i].nDay + 2;
      }
    },
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
