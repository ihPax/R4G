<template lang="html">
  <div
    class="h-full w-full flex flex-row border-l-2 border-t-2 border-black rounded-tl-2xl"
  >
    <div class="h-full flex flex-col flex-grow p-8">
      <div class="text-4xl font-bold sm:mb-6 lg:mb-12">Ciao {{ user.name }}!</div>
      <div class="grid grid-cols-2 gap-8">
        <div
          v-for="index in bins"
          :key="index"
          class="flex flex-col lg:flex-row items-center shadow-inner rounded-lg text-center border-2 border-gray-300"
        >
          <t-button 
            class="flex flex-col mx-1 order-2 lg:order-1 my-4"
            @click="changeBinStatus(index)"
            :disabled="binLinked[index] === true"
          >
            Collega il tuo cestino
          </t-button>
          <div class="flex flex-col mx-1 order-1 lg:order-2 flex-shrink-0 flex-grow">
            <span class="material-icons text-7xl xs:text-9xl lg:text-11xl"> 
              <span v-if="!binLinked[index]">delete_forever</span>
              <span v-else>delete_outline</span>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="hidden lg:flex flex-col flex-grow border-l-2 border-black">
      <div class="flex flex-row border-black border-b-2 pb-12 justify-center">
        <div>
          <t-modal v-model="showModal" header="Scegli il tuo Comune" close="chiudi">
            <Modal></Modal>
          </t-modal>
          <t-button @click="showModalTrue()" type="button">Scegli il tuo comune</t-button>
        </div>
        <!-- <Calendar></Calendar> -->
      </div>
      <div class="flex flex-row">GRAFICO</div>
    </div>
  </div>
</template>

<script>
import Modal from "@/components/Modal";
import axios from "axios";

export default {
  name: "Home",
  components: {
    Modal,
  },
  props: [],

  data() {
    return {
      access: "",
      user: {},
      showModal: false,
      bins: 4,
      binLinked: []
    };
  },
  async mounted() {
    //ACCESS: recupera la mail salvata nel local storage
    this.access = localStorage.getItem("AccessEmail");
    //GET: recupera le informazioni relative all'utente con la mail passata
    //THEN: una volta fatto il get, assegna il response.data all'user (risolto cosi per problema di "promise pending")
    await axios
      .get("http://localhost:8000/r4g/currentUser/" + this.access)
      .then((response) => {
        this.user = response.data;
      });
    for (let i = 0; i < this.bins; i++) {
      this.binLinked.push(false);
    }
  },
  methods: {
    showModalTrue() {
      this.showModal = !this.showModal;
    },
    changeBinStatus(index) {
      this.binLinked.splice(index, 1, true);
    }
  },
  computed: {},
};
</script>

<style scoped lang="css"></style>
