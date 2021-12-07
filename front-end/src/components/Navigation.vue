<template>
  <div id="navbar" class="h-screen flex ">
    <div class="flex flex-col h-full items-center">
      <div class="-m-7">
        <img src="../assets/logor4gblack.png">
      </div>
      <div class="flex flex-col h-full items-center"> 
        <button 
          v-for="(link, index) in links" :key="link.code" 
          class="p-4 rounded-3xl font-bold text-xl cursor-pointer"
          :class="{
            'bg-green-300 cursor-default': link.code == currentRouteName,
            'mt-8 sm:mt-32': index == 4,
          }"
          @click="goToLink(link)"
        >
          {{link.label}}
        </button>
      </div>
    </div>

    <!-- <div class="flex flex-col h-full items-center">
      <div class="-m-7">
        <img src="../assets/logor4gblack.png">
      </div>
      <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        Dashboard
      </div>
      <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        I miei cestini
      </div>
      <div class="p-4 rounded-lg font-bold text-xl		 bg-green-400 cursor-pointer">
        Calendario
      </div>
      <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        Chi siamo
      </div>
    </div>
    <div class="flex flex-col flex-end items-center">
        <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        Account
        </div>
        <div class="p-4 rounded-lg font-bold text-xl cursor-pointer">
        FAQ
        </div>
    </div> -->
  </div>
</template>

<script>
export default {
  name: 'Navigation',
  data() {
    return {
      links: [
        {
          code: 'dashboard',
          label: 'Dashboard',
        },
        {
          code: 'myBins',
          label: 'I miei cestini',
        },
        {
          code: 'calendar',
          label: 'Calendario',
        },
        {
          code: 'presentation',
          label: 'Chi siamo',
        },
        {
          code: 'account',
          label: 'Account',
        },
        {
          code: 'faq',
          label: 'FAQ',
        },
      ],
    };
  }, 
  computed: {
    currentRouteName() {
      return this.$route.matched[0].name;
    }
  },
  methods: {
    goToLink(link) {
      if (link.code != this.currentRouteName) {
        this.$router.push({
          name: link.code,
        });
      }
    },
  },
}
</script>
<style>

</style>