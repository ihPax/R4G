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

          <t-button  v-if="binLinked[index] !== true"
            class="flex flex-col mx-1 order-2 lg:order-1 my-4."
            @click="changeBinStatus(index)"
            :disabled="binLinked[index] === true"
          >
            Collega il tuo cestino
          </t-button>

          <div> 
          
          </div>
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
        <div v-if="!user.zone_id">
          <t-modal v-model="showModal" header="Scegli il tuo Comune" close="chiudi">
            <Modal @exit="closeModal"></Modal>
          </t-modal>
          <t-button @click="showModalTrue()" type="button">Scegli il tuo comune</t-button>
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
      bins: 4,
      binLinked: []
    };
  },
  async mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
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
    },
    closeModal(){
      this.showModal = !this.showModal;
    }
  },
  computed: {},
};
</script>
