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
          class="flex flex-col-reverse lg:flex-row items-center shadow-inner rounded-lg text-center border-2 border-gray-300"
        >
          <t-button
            v-if="localBin[index] !== true"
            class="flex flex-col mx-1 my-4"
            @click="changeBinStatus(index)"
            :disabled="binLinked[index] === true"
          >
            Collega il tuo cestino
          </t-button>
          <div v-if="localBin">
          <t-modal v-model="showModalMaterial" header="Scegli il materiale" close="chiudi">
          <ModalMaterial  @exit="closeMaterialModal"></ModalMaterial>
          </t-modal>
           {{localBin}}
            <!-- <div class="flex flex-col">
              <div class="font-bold">
                CARTA
              </div>
              <div class="font-semibold">
                Prossimo ritiro:
              </div>
              <div class="font-normal">
                {{new Date()}}
              </div>
            </div> -->
          </div>

          <div class="flex flex-col mx-1 flex-shrink-0 flex-grow">
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
import axios from "axios"
import Modal from "@/components/Modal";
import Calendar from "@/components/Calendar";
import ModalMaterial from "@/components/ModalMaterial";
export default {
  name: "Home",
  components: {
    Calendar,
    Modal,
    ModalMaterial,
  },
  props: [],

  data() {
    return {
      access: "",
      user: {},
      showModal: false,
      showModalMaterial:false,
      bins: 4,
      binLinked: [],
      localBin:[]
    };
  },
  async mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    for (let i = 0; i < this.bins; i++) {
      this.binLinked.push(false);
    }
    let response = await axios.get("http://localhost:8000/r4g/view-bin-user/"+this.user.id);
    let viewBinUser = response.data;
    let res = await axios.get("http://localhost:8000/r4g/material-bin/"+viewBinUser.bin_id);
    let calendaBin = res.data;

    this.localBin = JSON.stringify(calendaBin);
    localStorage.setItem("Bin", this.localBin);
    console.log(this.localBin)
  },
  methods: {
    showModalTrue() {
      this.showModal = !this.showModal;
    },

    changeBinStatus(index) {
       this.showModalMaterial = !this.showModalMaterial;
      this.binLinked.splice(index, 1, true);
      
    },
    closeModal() {
      this.showModal = !this.showModal;
    },
    closeMaterialModal() {
      this.showModalMaterial = !this.showModalMaterial;
    },
  },
  computed: {},
};
</script>
