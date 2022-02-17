<template>
  <div>
    <div class="flex flex-row">
      <div class="flex flex-col">
        <router-link to="/landing" class="flex">
          <img
            src="../assets/logor4gblack.png"
            class="w-3/4 cursor-pointer"
            alt="logo R4G"
          />
        </router-link>
      </div>
      <div
        class="flex flex-grow justify-end items-center" 
      >
        <div class="flex" v-for="link in links" :key="link.code">        
          <button
            @click="goToLink(link)"
            :disabled="link.code == $route.name"
            class="
              button button--moema
              px-3
              py-2
              relative
              mr-4
              xs:mr-8
              focus:outline-none
              border-2 border-solid border-yellow-500
              rounded-lg
              text-sm text-center
              font-semibold
              tracking-widest
            "
            :class="link.classes"
          >
            {{link.label}}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginRegisterBar",
  data() {
    return {
      links: [
        {
          code: "registration",
          label: "Registrati",
          classes: "text-yellow-600 hover:text-white hover:bg-yellow-600"
        },
        {
          code: "login",
          label: "Accedi",
          classes: "text-white bg-yellow-600"
        }
      ]
    }
  },
  methods: {    
    goToLink(link) {
      if (link.code != this.$route.name) {
        this.$router.push({
          name: link.code,
        });
      }
    },
  },
};
</script>