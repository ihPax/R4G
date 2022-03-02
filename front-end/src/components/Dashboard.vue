<template>
  <div>
    <div v-if="user" class="h-full xs:h-screen flex flex-col">
      <UpperBar :isMobile="isMobile" @catch-error="catchErr"></UpperBar>
      <div
        class="bg-white dark:bg-black text-black dark:text-white flex-grow flex flex-col xs:flex-row"
      >
        <Navigation v-if="!isMobile"></Navigation>
        <div class="flex-grow">
          <router-view :isMobile="isMobile" @catch-error="catchErr"></router-view>
        </div>
      </div>
      <ButtonToTop></ButtonToTop>
    </div>
    <div v-else>
      <NotLogged></NotLogged>
    </div>
  </div>
</template>

<script>
import Navigation from "@/components/Navigation.vue";
import UpperBar from "@/components/UpperBar.vue";
import NotLogged from "@/components/NotLogged.vue";
import ButtonToTop from "@/components/ButtonToTop.vue";

export default {
  name: "App",
  components: {
    Navigation,
    UpperBar,
    NotLogged,
    ButtonToTop,
  },
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      user: {},
      comuni: [],
      err: {}
    }
  },
  async mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    try {
      this.comuni = (await this.$axios.get("/r4g/zones")).data;
      localStorage.setItem("Zones", JSON.stringify(this.comuni));
    } catch(e) {
      this.catchErr(e);
    }
  },
  methods: {
    /** Method to catch Axios exceptions.
     * @param e {object} Error
     */
    catchErr(e) {
      if (e.response) {
        this.err = e.response;
      } else if (e.request) {
        this.err = e.request;
      } else {
        console.log('Error', e.message);
      }
      console.log(this.err);
      if (this.err) {
        let message = this.err.statusText;
        message == "" ? message = "Impossibile raggiungere il server!" : null;
        this.$fire({
          text: message,
          type: "warning",
          timer: 3000,
        }).then(() => {
          this.isLoading = false
        });
      }
    },
  }
}
</script>
