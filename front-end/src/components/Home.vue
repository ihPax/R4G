<template lang="html">
  <div
    class="h-full w-full flex flex-row border-l-2 border-t-2 border-black rounded-tl-2xl"
  >
    <div class="h-full flex flex-col flex-grow p-8">
      <div class="text-4xl font-bold sm:mb-6 lg:mb-12">Ciao {{ user.name }}!</div>
      <div class="grid grid-cols-2 gap-8">
        <div
          class="flex flex-col-reverse lg:flex-row items-center shadow-inner rounded-lg text-center border-2 border-gray-300"
        >
          <t-button
            v-if="localBin == ''"
            class="flex flex-col mx-1 my-4"
            @click="changeBinStatus(index)"
          >
            Collega il tuo cestino
          </t-button>
          <div>
            <t-modal
              v-model="showModalMaterial"
              header="Scegli il materiale"
              close="chiudi"
            >
              <ModalMaterial @exit="closeMaterialModal"></ModalMaterial>
            </t-modal>
            <div class="flex flex-col" v-if="localBin != ''">
              <div class="flex flex-col">
                <div class="font-bold">
                  {{ bin.name }}
                </div>
                <div class="font-semibold">Prossimo ritiro:</div>
                <div class="font-normal">
                  {{ bin.day }}
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-col mx-1 flex-shrink-0 flex-grow">
            <span class="material-icons text-7xl xs:text-9xl lg:text-11xl">
              <span v-if="localBin == ''">delete_forever</span>
              <span v-if="localBin != ''">delete_outline</span>
            </span>
          </div>
        </div>
        <div
          class="flex flex-col-reverse lg:flex-row items-center shadow-inner rounded-lg text-center border-2 border-gray-300"
        >
          <t-button class="flex flex-col mx-1 my-4"> Collega il tuo cestino </t-button>
          <div>
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
              <span>delete_forever</span>
              <!-- <span>delete_outline</span> -->
            </span>
          </div>
        </div>
        <div
          class="flex flex-col-reverse lg:flex-row items-center shadow-inner rounded-lg text-center border-2 border-gray-300"
        >
          <t-button class="flex flex-col mx-1 my-4"> Collega il tuo cestino </t-button>
          <div>
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
              <span>delete_forever</span>
              <!-- <span>delete_outline</span> -->
            </span>
          </div>
        </div>
        <div
          class="flex flex-col-reverse lg:flex-row items-center shadow-inner rounded-lg text-center border-2 border-gray-300"
        >
          <t-button class="flex flex-col mx-1 my-4"> Collega il tuo cestino </t-button>
          <div>
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
              <span>delete_forever</span>
              <!-- <span>delete_outline</span> -->
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
import axios from "axios";
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
      showModalMaterial: false,
      bin: [
        {
          name: "",
          day: "",
        },
      ],
      binLinked: [],
      localBin: [],
      num: 0,
    };
  },
  async mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    for (let i = 0; i < this.bins; i++) {
      this.binLinked.push(false);
    }
    this.getBin();
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
      this.getBin();
    },
    async getBin() {
      let response = await axios.get(
        "http://localhost:8000/r4g/view-bin-user/" + this.user.id
      );
      if (response) {
        let viewBinUser = response.data;
        let res = await axios.get(
          "http://localhost:8000/r4g/material-bin/" + viewBinUser.bin_id
        );
        let calendaBin = res.data;
        this.localBin = JSON.stringify(calendaBin);
        localStorage.setItem("Bin", this.localBin);
        this.populateBin();
      }
    },
    populateBin() {
      this.localBin = JSON.parse(localStorage.getItem("Bin"));
      let day = new Date();
      let nDay = day.getDay();
      let dist = 100;
      for (let i = 1; i < this.localBin.length; i++) {
        if (this.localBin.length > 2) {
        

          //nDay = day.add(1).day();
          this.num = 0;
          nDay = day.getDay();
          while (this.localBin[i].nDay != nDay) {
            nDay = nDay + 1;
            this.num = this.num + 1;
            if (nDay == 7) {
              nDay = 0;
            }
          }
          if (this.num < dist) {
            dist = this.num;
            this.bin.name = this.localBin[i].material;
            this.weekDay(this.localBin[i].nDay);
           
          }
        } else {
          this.bin.name = this.localBin[1].material;
          this.weekDay(this.localBin[1].nDay);
        }
      }
     
    },
    weekDay(day) {
      if (day == 0) {
        this.bin.day = "Lunedi";
      } else if (day == 1) {
        this.bin.day = "Martedì";
      } else if (day == 2) {
        this.bin.day = "Mercoledì";
      } else if (day == 3) {
        this.bin.day = "Giovedì";
      } else if (day == 4) {
        this.bin.day = "Venerdì";
      } else if (day == 5) {
        this.bin.day = "Sabato";
      } else if (day == 6) {
        this.bin.day = "DOmenica";
      }
    },
  },
  computed: {},
};
</script>
