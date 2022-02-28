<template lang="html">
<div class="h-full w-full">
  <div
    v-if="!isMobile"
    class="h-full w-full flex flex-col lg:flex-row border-l-2 border-t-2 xs:border-black border-white rounded-tl-2xl"
  >
    <div class="h-full flex flex-col flex-grow p-6">
      <div class="text-4xl font-bold mb-3 sm:mb-6 lg:mb-12">Ciao {{ user.name }}!</div>
      <div class="grid sm:grid-cols-2 gap-6">
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
          <div v-if="isLoading" class="place-self-center">
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
              <div class="flex flex-col py-4 justify-center">
                <div class="font-bold pl-4 text-lg">
                  {{ bin.name }}  
                </div>
                <div class="relative w-120">
                <!-- svg desktop -->
                  <svg id="svg" width="120" height="120" viewPort="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" :style="`stroke:${color}`">
                    <circle :r="r" cx="60" cy="60" fill="white" stroke-dasharray="235.26" stroke-dashoffset="0"></circle>
                    <circle id="bar" :r="r" cx="60" cy="60" fill="transparent" stroke-dasharray="235.26" stroke-dashoffset="0" :style="`stroke-dashoffset: ${rct}px;stroke:${color}`"></circle>
                  </svg>
                  <div class="h3 absolute font-bold text-xl" style="left:50%; top:50%; transform: translate(-50%, -50%)">{{value}}%</div>
                </div>
                <div class="font-semibold pl-4 text-lg">Prossimo ritiro:</div>
                <div class="font-normal pl-4 ">
                  {{ bin.day | date }}
                </div>
              </div>
            </div>
          </div>
          <div class="flex lg:flex-col justify-between">
            <div class="material-icons text-7xl xs:text-9xl lg:text-11xl">
              <div v-if="localBin == '' && !isLoading">delete_forever</div>
              <div v-if="bin.name == 'CARTA'">
                <img src="../assets/carta.png" class="w-24 lg:w-32 xl:w-40">
              </div>
              <div v-if="bin.name == 'SECCO'">
                <img src="../assets/secco.png" class="w-24 lg:w-32 xl:w-40">
              </div>
              <div v-if="bin.name == 'UMIDO'">
                <img src="../assets/umido.png" class="w-24 lg:w-32 xl:w-40">
              </div>
              <div v-if="bin.name == 'PLASTICA/LATTINE'">
                <img src="../assets/plastica.png" class="w-24 lg:w-32 xl:w-40">
              </div>
            </div>
              <button v-if="localBin != '' && !isLoading" class="flex justify-end m-4" @click="deleteBin()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 rounded-full bg-white p-2 border-2 text-orangelogo transition duration-150 ease-out hover:bg-gray-100" fill="none" viewBox="0 0 24 24" :stroke="color" :style="`border-color: ${color};`">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
              </button>
          </div>
        </div>

        <div v-for="index in 3" :key="index"
          class="xs:hidden sm:flex flex-col-reverse lg:flex-row items-center justify-between shadow-inner rounded-lg text-center border-2"
        > <!-- Sopra tolgo momentaneamente la visualizzazione degli altri 3 cestini nel breakpoint sm -->
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
      <div class="p-4 sm:px-6 flex justify-center items-center border-b border-gray-200 bg-blue-50 xs:bg-white mb-4">
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
        class="flex flex-col mx-4"
      >
      <!-- collega il tuo cestino  -->
        <!-- <div v-if="localBin == '' && !isLoading" class="w-full flex justify-center items-end h-72 bg-blue-400 rounded-2xl">
          <t-button2
            @click="changeBinStatus()"
            v-if="localBin == ''"
            class="flex flex-col mx-1 my-4"
          >
            Collega il tuo cestino
          </t-button2>
        </div>
        <div v-if="isLoading" class="flex justify-center items-center h-72 bg-blue-400 rounded-2xl">
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
          <div class="flex flex-col rounded-2xl" v-if="localBin != '' && !isLoading" :style="`background-color:${color}`">
            <div class="flex flex-col px-4 pt-3 justify-center w-full">
              <div class="truncate">
                <div class="font-bold text-white text-2xl">
                  <div>
                    {{ bin.name }}
                  </div>
                  <div class="flex justify-between">
                    <img v-if="bin.name == 'CARTA'" src="../assets/carta.png" class="h-24 flex-shrink-0">
                    <img v-if="bin.name == 'SECCO'" src="../assets/secco.png" class="h-24 flex-shrink-0">
                    <img v-if="bin.name == 'UMIDO'" src="../assets/umido.png" class="h-24 flex-shrink-0">
                    <img v-if="bin.name == 'PLASTICA/LATTINE'" src="../assets/plastica.png" class="h-24 flex-shrink-0">
                    <div class="relative">
                      <svg id="svg" width="120" height="120" viewPort="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" :style="`stroke:${color}`">
                        <circle :r="r" cx="60" cy="60" fill="white" stroke-dasharray="235.26" stroke-dashoffset="0"></circle>
                        <circle id="bar" :r="r" cx="60" cy="60" fill="transparent" stroke-dasharray="235.26" stroke-dashoffset="0" :style="`stroke-dashoffset: ${rct}px;`" stroke='#000000'></circle>
                      </svg>
                      <div class="h3 absolute font-bold text-xl z-10 text-black" style="left:50%; top:50%; transform: translate(-50%, -50%)">{{value}}%</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="font-normal mt-3 text-white">Prossimo ritiro:</div>
              <div class="flex flex-col font-bold text-white text-xl">
                {{ bin.day | date }}
              </div>
            </div>

            <div class="flex justify-end mb-4 mr-4">
              <button @click="deleteBin()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 rounded-full bg-white p-2 border-2 border-black" fill="none" viewBox="0 0 24 24" stroke="#000000">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
              </button>
            </div>
          </div> 
        </div>-->
          <SwichCard></SwichCard>

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
 import SwichCard from "@/components/SwichCard";

export default {
  name: "Home",
  components: {
    Calendar,
    Modal,
    ModalMaterial,
    Loading,
     SwichCard
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
      r: 37.5,
      rMobile: 25,
      rct: 235.26,
      rctMobile: 235.26,
      value: 1,

    };
  },
  async mounted() {
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    this.userBin = JSON.parse(localStorage.getItem("BinUser"));
    this.getBin();
    this.changePercent();
    this.getDistance();
    console.log(this.userBin);
  },
  methods: {
    //apre la modale delle zone
    showModalTrue() {
      this.showModal = !this.showModal;
    },

    //calcola la distanza rilevata dai sensori
    getDistance(){
      let lenght = this.userBin.length;
      let distance = this.userBin.distance;
      let valore = Math.floor(((lenght-distance)*100)/lenght);
      this.value = isNaN(valore) ? 0 : valore;
      this.changePercent();
    },

    //alert che ti avvisa di scegliere prima la zona e poi il cestino
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

    //chiude la modale al click della scelta della zona
    closeModal() {
      this.showModal = !this.showModal;
    },

    //chiude la modale al click del tipo di cestino
    closeMaterialModal() {
      this.showModalMaterial = !this.showModalMaterial;
      this.getBin();
    },

    //prende il bin dal database e lo setta nel localStorage
    async getBin() {
      this.isLoading = true;
      let response = await this.$axios.get("/r4g/view-bin-user/" + this.user.id);
      let viewBinUser = response.data; //bin con userId e binId

      let bin = await this.$axios.get("/r4g/bin/"+this.user.id);
      let userBin = bin.data; //statistiche bin

      let BinUser = JSON.stringify(userBin);
      localStorage.setItem("BinUser", BinUser); 
      console.log('viewBinUser', viewBinUser, 'userBin', userBin)

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

    //metodo che scorre localBin e prende giorno e materiale e prossimo ritiro
    populateBin() {
      this.localBin = JSON.parse(localStorage.getItem("Bin"));
      let day = new Date();
      let nDay = day.getDay();
      let dist = 100;
      for (let i = 1; i < this.localBin.length; i++) {
        if (this.localBin.length > 2) {
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

    //stabilisce il prossimo ritiro
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
    },

    //calcolo percentuale del cestino
    changePercent() {
      let c = Math.PI * (this.r * 2);
      this.rct = ((100 - this.value) / 100) * c;

      let c2 = Math.PI * (this.rMobile * 2);
      this.rctMobile = ((100 - this.value) / 100) * c2;
    },

    //metodo per eliminare il cestino
    async deleteBin(){
      this.isLoading = true;
      this.bin = [];
      this.userBin = JSON.parse(localStorage.getItem("BinUser"));
      let id = this.userBin.id;
      await this.$axios.delete("/r4g/delete-bin-user/" + id);
      await this.$axios.delete("/r4g/delete-bin/" + id);
      localStorage.removeItem('BinUser');
      localStorage.removeItem('UserBin');
      this.localBin = [];
      this.userBin = [];
      this.isLoading = false;
    }
  },
  computed: {},
  filters: {
    //ritorna il prossimo ritiro in modo corretto
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
  stroke-width: 8;
}

.w-120 {
  width: 120px;
  height: 120px;
}

#svg {
  transform: rotate(-90deg);
}
</style>
