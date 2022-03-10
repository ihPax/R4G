<template>
  <div id="app" class="font-montserrat">
    <router-view :isMobile="isMobile" @catch-error="catchErr"></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  created() {
    window.addEventListener("resize", this.currentWidth);
  },
  destroyed() {
    window.removeEventListener("resize", this.currentWidth);
  },
  data() {
    return {
      isMobile: false
    }
  },
  mounted() {
    this.currentWidth();
  },
  methods: {
    currentWidth() {
      let currentWidth = window.innerWidth;
      let breakpointXS = 476;
      this.isMobile = currentWidth < breakpointXS ? true : false;
    },
    /** Method to catch Axios exceptions.
     * @param e {object} Error
     */
    catchErr(e, isLogin = false) {
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
      
      console.log(this.err);
      if (isLogin) {
        if (this.err.status == 401) {
          this.err.statusText = "Email e/o password non corretta";
        } else if (this.err.status == 422) {
          this.err.statusText = "Email non valida e/o password con meno di 6 caratteri";
        }
      } else {
        if (this.err.status == 401) {
          this.err.statusText = "Non sei autorizzato a svolgere questa operazione";
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
    },
  },
};
</script>
