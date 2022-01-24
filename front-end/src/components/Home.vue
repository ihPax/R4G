<template lang="html">
  <div
    class="h-screen w-full flex flex-row border-l-2 border-t-2 border-black rounded-tl-2xl"
  >
    <div class="h-full flex flex-col flex-grow p-8">
      <div class="text-4xl font-bold sm: mb-4 lg:mb-12">Ciao {{ user.name }}!</div>
      <div class="grid grid-cols-2 gap-8">
        <div
          v-for="index in 4"
          :key="index"
          class="flex flex-col lg:flex-row items-center shadow-inner rounded-lg text-center"
        >
          <t-button class="flex flex-col mx-1 order-2 lg:order-1 my-4">
            Collega il tuo cestino
          </t-button>
          <div class="flex flex-col mx-1 order-1 lg:order-2 flex-shrink-0 flex-grow">
            <span class="material-icons text-7xl xs:text-9xl sm:text-11xl"> delete </span>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden lg:flex flex-col flex-grow border-l-2 border-black">
      <div class="flex flex-row border-black border-b-2 pb-12 justify-center">
        <div v-if="!user.zone_id">
          <t-modal v-model="showModal" header="Scegli il tuo Comune" close="chiudi">
            <Modal></Modal>
          </t-modal>
          <t-button @click="showModalTrue()" type="button">Scegli il tuo comune</t-button>
          {{user.zone_id}}
        </div>
        <div v-if="user.zone_id">
          <Calendar></Calendar>
        </div>
      </div>
      <div class="flex flex-row">GRAFICO</div>
    </div>
  </div>
</template>

<script>
import Modal from "@/components/Modal";
import Calendar from "@/components/Calendar";
//import axios from "axios";

export default {
  name: "Home",
  components: {
    Calendar,
    Modal,
  },
  props: [],

  data() {
    return {
      access: "",
      user: {},
      showModal: false,
      
    };
  },
  mounted() {
    //ACCESS: recupera la mail salvata nel local storage
    //this.access = localStorage.getItem("AccessEmail");
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    //await axios.get("http://localhost:8000/r4g/currentUser/"+this.user.email).then(response => {this.user = response.data});
    
    //console.log(this.access)
    //GET: recupera le informazioni relative all'utente con la mail passata
    //THEN: una volta fatto il get, assegna il response.data all'user (risolto cosi per problema di "promise pending")
  },
  methods: {
    showModalTrue() {
      this.showModal = !this.showModal;
    },
  },
  computed: {},
};
</script>

<style scoped lang="css"></style>
