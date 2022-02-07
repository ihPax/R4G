<template lang="html">
  <div>
    <div
      v-if="!isMobile"
      class="h-full w-full flex flex-row border-l-2 border-t-2 xs:border-black border-white rounded-tl-2xl"
    >
      <div class="h-full flex flex-col flex-grow p-8">
        <div class="text-4xl font-bold mb-3 sm:mb-6 lg:mb-12">Ciao {{ user.name }}!</div>
        <div class="grid xs:grid-cols-2 gap-2 xs:gap-8">
          <div
            class="flex flex-col-reverse lg:flex-row items-center shadow-inner rounded-lg text-center border-2 border-gray-300"
          >
            <t-button
              @click="changeBinStatus()"
              v-if="localBin == ''"
              class="flex flex-col mx-1 my-4"
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
                <div class="flex flex-col p-5">
                  <div class="font-bold">
                    {{ bin.name }}
                  </div>
                  <div class="">
                        <div class="">{{ value }}</div>

                        <svg
                        class=""
                          id="svg"
                          width="200"
                          height="200"
                          viewPort="0 0 100 100"
                          version="1.1"
                          xmlns="http://www.w3.org/2000/svg"
                        >

                          <circle
                            :r="r"
                            cx="100"
                            cy="100"
                            fill="white"
                            stroke-dasharray="314.15"
                            stroke-dashoffset="0"
                          ></circle>
                          <circle
                            id="bar"
                            :r="r"
                            cx="100"
                            cy="100"
                            fill="transparent"
                            stroke-dasharray="314.15"
                            stroke-dashoffset="0"
                            :style="`stroke-dashoffset: ${rct}px;`"
                          ></circle>
                        </svg>

                        

                     
                  </div>
                  <div class="font-semibold">Prossimo ritiro:</div>
                  <div class="font-normal">
                    {{ bin.day | date }}
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col mx-1 flex-shrink-0 flex-grow">
              <span class="material-icons text-7xl xs:text-9xl lg:text-11xl">
                <span v-if="localBin == ''">delete_forever</span>
                <span v-else>delete_outline</span>
              </span>
            </div>
          </div>

          <div
            v-for="index in 3"
            :key="index"
            class="flex flex-col-reverse lg:flex-row items-center shadow-inner rounded-lg text-center border-2 border-gray-300"
          >
            <t-button class="flex flex-col mx-1 my-4"> Collega il tuo cestino </t-button>
            <div></div>
            <div class="flex flex-col mx-1 flex-shrink-0 flex-grow">
              <span class="material-icons text-7xl xs:text-9xl lg:text-11xl">
                <span>delete_forever</span>
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
            <t-button @click="showModalTrue()" type="button"
              >Scegli il tuo comune</t-button
            >
          </div>
          <div v-if="user.zone_id">
            <Calendar :is-expanded="false"></Calendar>
          </div>
        </div>
        <div class="flex flex-row">GRAFICO</div>
      </div>
    </div>

    <div v-else>
      <div class="max-w-full flex flex-col">
        <div class="bg-blue-50 mb-5 flex px-5 py-2 items-center">
          <div class="material-icons text-4xl">accessibility_new</div>
          <div class="flex flex-col ml-3">
            <div class="text-xs">{{ user.name }} {{ user.surname }}</div>
            <div class="font-semibold">Benvenuto su R4G!</div>
          </div>
        </div>

        <div
          class="bg-blue-400 flex justify-center items-center shadow-inner rounded-lg text-center border-2 border-gray-300 mx-5"
        >
          <div v-if="localBin == ''" class="h-80 w-full flex justify-center items-end">
            <t-button2
              @click="changeBinStatus()"
              v-if="localBin == ''"
              class="flex flex-col mx-1 my-4"
            >
              Collega il tuo cestino
            </t-button2>
          </div>
          <div>
            <t-modal
              v-model="showModalMaterial"
              header="Scegli il materiale"
              close="chiudi"
            >
              <ModalMaterial @exit="closeMaterialModal"></ModalMaterial>
            </t-modal>
            <div class="flex flex-col" v-if="localBin != ''">
              <div class="flex flex-col p-5">
                <div class="font-bold">
                  {{ bin.name }}
                </div>
                <div class="uk-card-body uk-flex uk-flex-center uk-flex-middle">
                  <div class="uk-inline-clip">
                    <svg
                      id="svg"
                      width="200"
                      height="200"
                      viewPort="0 0 100 100"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <circle
                        :r="r"
                        cx="100"
                        cy="100"
                        fill="white"
                        stroke-dasharray="314.15"
                        stroke-dashoffset="0"
                      ></circle>
                      <circle
                        id="bar"
                        :r="r"
                        cx="100"
                        cy="100"
                        fill="transparent"
                        stroke-dasharray="314.15"
                        stroke-dashoffset="0"
                        :style="`stroke-dashoffset: ${rct}px;`"
                      ></circle>
                    </svg>
                    <div class="h3 uk-position-center">{{ value }}</div>
                  </div>
                </div>
                <div class="font-semibold">Prossimo ritiro:</div>
                <div class="font-normal">
                  {{ bin.day | date }}
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="bg-blue-400 rounded mx-4">
        <div>
          <t-modal
            v-model="showModalMaterial"
            header="Scegli il materiale"
            close="chiudi"
          >
            <ModalMaterial @exit="closeMaterialModal"></ModalMaterial>
          </t-modal>
          <div class="flex flex-col" v-if="localBin != ''">
            <div class="flex flex-col p-5">
              <div class="font-bold overflow-x-hidden">
                {{ bin.name }}
              </div>
              <div class="font-semibold">Prossimo ritiro:</div>
              <div class="font-normal">
                {{ bin.day | date }}
              </div>
            </div>
          </div>
        </div>
      </div> -->

        <div></div>
      </div>
    </div>
  </div>
</template>

<script>
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
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    },
  },
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
      r: 50,
      rct: 314.15,
      value: 70,
    };
  },
  async mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    this.getBin();
    this.changePercent();
  },
  methods: {
    showModalTrue() {
      this.showModal = !this.showModal;
    },
    changeBinStatus() {
      this.showModalMaterial = !this.showModalMaterial;
    },
    closeModal() {
      this.showModal = !this.showModal;
    },
    closeMaterialModal() {
      this.showModalMaterial = !this.showModalMaterial;
      this.getBin();
    },
    async getBin() {
      let response = await this.$axios.get("/r4g/view-bin-user/" + this.user.id);
      let viewBinUser = response.data;
      let res = await this.$axios.get("/r4g/material-bin/" + viewBinUser.bin_id);
      if (response) {
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

          while (this.localBin[i].nDay + 1 != nDay) {
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
      let days = new Date();
      let nDay = days.getDay();
      if (Number(day) - Number(nDay) >= -1) {
        let ritiro = days.setDate(days.getDay() + (Number(day) - Number(nDay)));
        this.bin.day = new Date(ritiro);
      } else if (Number(day) - Number(nDay) < -1) {
        console.log(day);
        //day = day + 7
        let correctDay = nDay - day;
        let ritiro = days.setDate(days.getDay() + correctDay);
        this.bin.day = new Date(ritiro);
      }

      /*
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
      }*/
    },
    changePercent() {
      //let val = Math.floor(Math.random() * (100 - 1 + 1)) + 1;
      let c = Math.PI * (this.r * 2);
      this.rct = ((100 - this.value) / 100) * c;
    },
  },
  computed: {},
  filters: {
    date: (value) => {
      let day = value.getDay() - 1;
      let nameDay = "";
      if (day == 0) {
        nameDay = "Lunedi";
      } else if (day == 1) {
        nameDay = "Martedì";
      } else if (day == 2) {
        nameDay = "Mercoledì";
      } else if (day == 3) {
        nameDay = "Giovedì";
      } else if (day == 4) {
        nameDay = "Venerdì";
      } else if (day == 5) {
        nameDay = "Sabato";
      } else if (day == 6) {
        nameDay = "Domenica";
      }

      let numDay = value.getDate();
      let month = value.getMonth();
      let nameMonth = "";
      if (month == 0) {
        nameMonth = "Gennaio";
      } else if (month == 1) {
        nameMonth = "Febbraio";
      } else if (month == 2) {
        nameMonth = "Marzo";
      } else if (month == 3) {
        nameMonth = "Aprile";
      } else if (month == 4) {
        nameMonth = "Maggio";
      } else if (month == 5) {
        nameMonth = "Giugno";
      } else if (month == 6) {
        nameMonth = "Luglio";
      } else if (month == 7) {
        nameMonth = "Agosto";
      } else if (month == 8) {
        nameMonth = "Settembre";
      } else if (month == 9) {
        nameMonth = "Ottobre";
      } else if (month == 10) {
        nameMonth = "Novembre";
      } else if (month == 11) {
        nameMonth = "Dicembre";
      }

      let year = value.getFullYear();

      return nameDay + " " + numDay + " " + nameMonth + " " + year;
    },
  },
};
</script>
<style>
/* Moema */
.button--moema {
  -webkit-transition: background-color 0.3s, color 0.3s;
  transition: background-color 0.3s, color 0.3s;
}

.button--moema::before {
  content: "";
  position: absolute;
  top: -20px;
  left: -20px;
  bottom: -20px;
  right: -20px;
  background: inherit;
  border-radius: 50px;
  z-index: -1;
  opacity: 0.4;
  -webkit-transform: scale3d(0.8, 0.5, 1);
  transform: scale3d(0.8, 0.5, 1);
}

.button--moema:hover {
  -webkit-transition: background-color 0.1s 0.3s, color 0.1s 0.3s;
  transition: background-color 0.1s 0.3s, color 0.1s 0.3s;
  -webkit-animation: anim-moema-1 0.3s forwards;
  animation: anim-moema-1 0.3s forwards;
}

.button--moema:hover::before {
  -webkit-animation: anim-moema-2 0.3s 0.3s forwards;
  animation: anim-moema-2 0.3s 0.3s forwards;
}
@-webkit-keyframes anim-moema-1 {
  60% {
    -webkit-transform: scale3d(0.8, 0.8, 1);
    transform: scale3d(0.8, 0.8, 1);
  }
  85% {
    -webkit-transform: scale3d(1.1, 1.1, 1);
    transform: scale3d(1.1, 1.1, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes anim-moema-1 {
  60% {
    -webkit-transform: scale3d(0.8, 0.8, 1);
    transform: scale3d(0.8, 0.8, 1);
  }
  85% {
    -webkit-transform: scale3d(1.1, 1.1, 1);
    transform: scale3d(1.1, 1.1, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@-webkit-keyframes anim-moema-2 {
  to {
    opacity: 0;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes anim-moema-2 {
  to {
    opacity: 0;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
</style>

<style>
#svg circle {
  transition: stroke-dashoffset 1.5s cubic-bezier(0.18, 0.89, 0.32, 1.28);
  stroke: #c0c0c0;
  border: 20px solid black;
  stroke-width: 1em;
}
#svg #bar {
  stroke: blue;
}

</style>
