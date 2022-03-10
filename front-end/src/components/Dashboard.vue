<template>
  <div>
    <div v-if="isLoading"
      class="fixed text-red-400 font-bold text-2xl z-10"
      style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
    >
      <Loading></Loading>
    </div>
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
import Loading from '@/components/Loading';

export default {
  name: "App",
  components: {
    Navigation,
    UpperBar,
    NotLogged,
    ButtonToTop,
    Loading,
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
      err: {},
      isLoading: false,
    }
  },
  async mounted() {
    this.isLoading = true;
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    try {
      this.comuni = (await this.$axios.get("/r4g/zones")).data;
      localStorage.setItem("Zones", JSON.stringify(this.comuni));
    } catch(e) {
      this.catchErr(e);
    } finally {
      this.isLoading = false;
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
      // let dataErr = this.err.data; //oggetto che contiene una coppia chiave valore con valore un array contentente una stringa
      // let customErr = dataErr[Object.keys(dataErr)[0]];
      // console.log(customErr);
      
      if (this.err.status == 401) {
        this.err.statusText = "Non sei autorizzato a svolgere questa operazione";
      }

      console.log(this.err);
      if (this.err) {
        let message = (e == "Error: Network Error") ? "Impossibile raggiungere il server!" : this.err.statusText;
        this.$fire({
          text: message,
          type: "warning",
          timer: 3000,
        });
      }
    },
  }
}
</script>
