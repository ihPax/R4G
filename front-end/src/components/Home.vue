<template lang="html">
<div class="h-full w-full font-montserrat">
  <div
    v-if="!isMobile"
    class="h-full w-full flex flex-col lg:flex-row border-l-2 border-t-2 xs:border-black border-white rounded-tl-2xl"
  >
    <div class="h-full flex flex-col flex-grow p-6">
      <div class="text-4xl font-bold mb-3 sm:mb-6 lg:mb-12">Ciao {{ user.name }}!</div>
      <div class="grid grid-cols-2 gap-6">
        <div
          class="flex flex-col-reverse lg:flex-row items-center justify-between shadow-inner rounded-lg border-2 border-gray-300"
        >
          <div v-if="localBin == '' && !isLoading" class="flex flex-col-reverse lg:flex-row items-center">
            <t-button
              @click="changeBinStatus()"
              class="flex flex-col mx-1 my-4"
            >
              Collega il tuo cestino
            </t-button>
          </div>
          <div v-if="isLoading" class="m-4">
            <Loading></Loading>
          </div>
          <div class="flex">
            <t-modal
              v-model="showModalMaterial"
              header="Scegli il materiale"
              close="chiudi"
            >
              <ModalMaterial @exit="closeMaterialModal"></ModalMaterial>
            </t-modal>
            <div class="flex flex-col" v-if="localBin != '' && !isLoading">
              <div class="flex flex-col py-4">
                <div class="font-bold pl-4 text-xl">
                  {{ bin.name }}  
                </div>
                <div class="relative w-160">
                <!-- svg desktop -->
                  <svg id="svg" width="160" height="160" viewPort="0 0 80 80" version="1.1" xmlns="http://www.w3.org/2000/svg" :style="`stroke:${color}`">
                    <circle :r="r" cx="80" cy="80" fill="white" stroke-dasharray="314.15" stroke-dashoffset="0"></circle>
                    <circle id="bar" :r="r" cx="80" cy="80" fill="transparent" stroke-dasharray="314.15" stroke-dashoffset="0" :style="`stroke-dashoffset: ${rct}px;stroke:${color}`"></circle>
                  </svg>
                  <div class="h3 absolute font-bold text-xl" style="left:50%; top:50%; transform: translate(-50%, -50%)">{{value}}%</div>
                </div>
                <div class="font-semibold pl-4 text-xl">Prossimo ritiro:</div>
                <div class="font-normal pl-4 text-xl">
                  {{ bin.day | date }}
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-col mx-1">
            <div class="material-icons text-7xl xs:text-9xl lg:text-11xl">
              <div v-if="localBin == '' && !isLoading">delete_forever</div>
              <div v-if="bin.name == 'CARTA'">
                <img src="../assets/carta.png" class="w-40">
              </div>
              <div v-if="bin.name == 'SECCO'">
                <img src="../assets/secco.png" class="w-40">
              </div>
              <div v-if="bin.name == 'UMIDO'">
                <img src="../assets/umido.png" class="w-40">
              </div>
              <div v-if="bin.name == 'PLASTICA/LATTINE'">
                <img src="../assets/plastica.png" class="w-40">
              </div>
            </div>
          </div>
        </div>

        <div v-for="index in 3" :key="index"
          class="flex flex-col-reverse lg:flex-row items-center justify-between shadow-inner rounded-lg text-center border-2 border-gray-300"
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

    <div class="flex flex-col flex-grow lg:border-l-2 border-black">
      <div class="flex flex-row border-black border-b-2 pb-12 justify-center">
        <div v-if="!user.zone_id">
          <t-modal v-model="showModal" header="Scegli il tuo Comune" close="chiudi">
            <Modal @exit="closeModal"></Modal>
          </t-modal>
          <t-button @click="showModalTrue()" type="button">Scegli il tuo comune</t-button>
        </div>
        <div v-if="user.zone_id">
          <Calendar :is-expanded="false"></Calendar>
        </div>
      </div>
      <div class="flex flex-row">GRAFICO</div>
    </div>
  </div>

  <!-- VERSIONE MOBILE -->
  <div v-else>
    <div class="max-w-full flex flex-col">
      <div class="bg-blue-50 mb-5 flex px-5 py-2 items-center">
        <div class="material-icons text-4xl">
          accessibility_new
        </div>
        <div class="flex flex-col ml-3">
          <div class="text-xs">
            {{ user.name }} {{ user.surname }}
          </div>
          <div class="font-semibold">
            Benvenuto su R4G!
          </div>
        </div>
      </div>

      <div
        class="flex flex-col mx-5"
      >
        <div v-if="localBin == '' && !isLoading" class="w-full flex justify-center items-end h-48 bg-blue-400 rounded-2xl">
          <t-button2
            @click="changeBinStatus()"
            v-if="localBin == ''"
            class="flex flex-col mx-1 my-4"
          >
            Collega il tuo cestino
          </t-button2>
        </div>
        <div v-if="isLoading">
          <Loading></Loading>
        </div>
        <div>
          <t-modal
            v-model="showModalMaterial"
            header="Scegli il materiale"
            close="chiudi"
          >
            <ModalMaterial @exit="closeMaterialModal"></ModalMaterial>
          </t-modal>
          <div class="flex flex-col bg-blue-400 rounded-3xl" v-if="localBin != ''">
            <div class="flex flex-col p-5 justify-center w-full">
              <div class="flex justify-between items-center flex-wrap truncate">
                <div class="font-bold">
                  {{ bin.name }}
                </div>
                <div class="relative">
                <!-- svg mobile -->
                  <svg id="svg" width="80" height="80" viewPort="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" :style="`stroke:${color}`">
                    <circle :r="rMobile" cx="40" cy="40" fill="white" stroke-dasharray="157.08" stroke-dashoffset="0"></circle>
                    <circle id="bar" :r="rMobile" cx="40" cy="40" fill="transparent" stroke-dasharray="157.08" stroke-dashoffset="0" :style="`stroke-dashoffset: ${rctMobile}px; stroke:${color}`"></circle>
                  </svg>
                  <div class="h3 absolute font-bold text-sm" style="left:50%; top:50%; transform: translate(-50%, -50%)">{{value}}%</div>
                </div>
              </div>
              <div class="font-semibold">Prossimo ritiro:</div>
              <div class="font-normal">
                {{ bin.day | date }}
              </div>
            </div>
          </div>
        </div>

        <div class="mt-4">
          <div v-if="!user.zone_id" class="flex flex-col items-center">
            <t-modal v-model="showModal" header="Scegli il tuo Comune" close="chiudi">
              <Modal @exit="closeModal"></Modal>
            </t-modal>
            <t-button @click="showModalTrue()" type="button">Scegli il tuo comune</t-button>
          </div>
          <div v-if="user.zone_id">
            <Calendar :is-expanded="false"></Calendar>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</template>

<script>
import Modal from "@/components/Modal";
import Calendar from "@/components/Calendar";
import ModalMaterial from "@/components/ModalMaterial";
import Loading from "@/components/Loading";

export default {
  name: "Home",
  components: {
    Calendar,
    Modal,
    ModalMaterial,
    Loading
  },
  props: {
    isMobile: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      isLoading: false,
      access: "",
      user: {},
      color:'grey',
      showModal: false,
      showModalMaterial: false,
      userBin: {},
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
      rMobile:25,
      rct: 314.15,
      rctMobile:314.15,
      value: 1,

    };
  },
  async mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    this.userBin = JSON.parse(localStorage.getItem("BinUser"));
    this.getBin();
    this.changePercent();
    this.getDistance();
  },
  methods: {
    showModalTrue() {
      this.showModal = !this.showModal;
    },
    getDistance(){
      let lenght = this.userBin.length;
      let distance = this.userBin.distance;
      let valore = Math.floor(((lenght-distance)*100)/lenght);
      this.value = valore;
      this.changePercent();
    },
    changeBinStatus() {
      if (!this.user.zone_id) {
        this.$fire({
          text: "Prima di collegare il cestino ti chiediamo di indicare il tuo quartiere di residenza",
          type: "warning",
          timer: 3000,
        }).then(r => {
          this.showModal = !this.showModal;
          console.log(r);
        });

      } else {
        this.showModalMaterial = !this.showModalMaterial;
      }
     
    },
    closeModal() {
      this.showModal = !this.showModal;
    },
    closeMaterialModal() {
      this.showModalMaterial = !this.showModalMaterial;
      this.getBin();
    },
    async getBin() {
      this.isLoading = true;
      let response = await this.$axios.get("/r4g/view-bin-user/" + this.user.id);
      let viewBinUser = response.data;

      let bin = await this.$axios.get("/r4g/bin/"+this.user.id);
      let userBin = bin.data;

      let BinUser = JSON.stringify(userBin);
      localStorage.setItem("BinUser", BinUser);

      if (viewBinUser.bin_id) {
        let res = await this.$axios.get("/r4g/material-bin/" + viewBinUser.bin_id)
        if (response) {
          let calendaBin = res.data;
          this.localBin = JSON.stringify(calendaBin);
          localStorage.setItem("Bin", this.localBin);
          this.populateBin();
        }
      }
      this.isLoading = false;
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
                      console.log("1",this.localBin[1].nDay)

        }
      }

      if(this.bin.name == 'SECCO'){
        this.color = '#9CA3AF'
      }else if (this.bin.name =='CARTA'){
        this.color = '#166534'
      }else if(this.bin.name =='UMIDO'){
        this.color = '#854D0E'
      }else if(this.bin.name =='PLASTICA/LATTINE'){
        this.color = '#1E3A8A'
      }
    },
    weekDay(day) {
      let days = new Date();
      let nDay = days.getDay() - 1;
      if (Number(nDay) > Number(day)) {
        let ritiro = days.setDate(days.getDate() + (day-nDay) + 7);
        this.bin.day = new Date(ritiro);
        console.log( this.bin.day)
      } else if (Number(nDay) <= Number(day)) {
        let ritiro = days.setDate(days.getDate() +(day - nDay));
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

      let c2 = Math.PI * (this.rMobile * 2);
      this.rctMobile = ((100 - this.value) / 100) * c2;
      console.log(`Il valore del riempimento è ${this.value}`)
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
#svg circle {
  transition: stroke-dashoffset 1.5s cubic-bezier(0.18, 0.89, 0.32, 1.28);
  stroke: #CFCFCF;
  border: 20px solid black;
  stroke-width: 9;
}

.w-160 {
  width: 160px;
  height: 160px;
}

#svg {
  transform: rotate(-90deg);
}
</style>
