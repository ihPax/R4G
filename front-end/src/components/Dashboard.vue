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
      <ButtonToTop :isDashboard="true"></ButtonToTop>
    </div>
  </div>
</template>

<script>
import Navigation from "@/components/Navigation";
import UpperBar from "@/components/UpperBar";
import ButtonToTop from "@/components/ButtonToTop";
import Loading from '@/components/Loading';
import materialDescriptions from "../materialDescriptions.json";

export default {
  components: {
    Navigation,
    UpperBar,
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
      materialDescriptions //tratti da: https://www.amiavr.it/Raccolta-differenziata/Ogni-cosa-al-suo-posto
    }
  },
  async mounted() {
    this.isLoading = true;
    try {
      let exist = localStorage.getItem("MaterialDescriptions");
      !exist ? localStorage.setItem("MaterialDescriptions", JSON.stringify(materialDescriptions)) : null;
      let user = JSON.parse(localStorage.getItem("AccessEmail"));
      if (user) {
        this.user = user;
      } else {
        this.backToLogin(false);
      }
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
        this.err = {statusText: e.message};   
      }
      if (this.err.status >= 400 && this.err.status < 500) {
        let dataErr = this.err.data; //oggetto che contiene una coppia chiave valore con valore un array contentente una stringa
        let customErr = (dataErr[Object.keys(dataErr)[0]])[0]; //prendo il valore della prima chiave
        this.err.statusText = customErr;
        if (this.err.status == 401) {
          this.backToLogin(true);
        }
      }
      if (this.err) {
        let message = (e == "Error: Network Error") ? "Impossibile raggiungere il server!" : this.err.statusText;
        this.$fire({
          text: message,
          type: "warning",
          timer: 3000,
        });
      }
      console.log(e, e.response);
    },
    backToLogin(serverResponse) {
      let keysToRemove = ["AccessEmail", "Zone", "Zones", "Bin", "BinUser", "WithdrawalDate", "MaterialDescriptions"];
      keysToRemove.forEach(key => localStorage.removeItem(key));
      this.$router.push({name: "login"});
      if (!serverResponse) {throw new Error("Per favore effettua l'accesso!")}
    }
  }
}
</script>
