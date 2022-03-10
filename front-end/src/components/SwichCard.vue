<template>
  <div>
    <VueSlickCarousel :arrows="false" :dots="false">
      <!--prima card -->
      <div  class="flex flex-col p-4" v-if="viewBinUser.bin_id" > 
      
        <div class="flex flex-col bg-blue-400 rounded-2xl h-72" v-if="localBin != ''" :style="`background-color:${color}`"> 
          <div class="flex flex-col px-4 pt-3 justify-center w-full">
            <div class="truncate">
              <div class="font-bold text-white text-2xl">
                <div>
                  <!-- {{i}}. -->
                  {{ bin.name }}
                </div>
                <div class="flex justify-between">
                  <img
                    v-if="bin.name == 'CARTA'"
                    src="../assets/carta.png"
                    class="h-24 flex-shrink-0"
                  />
                  <img
                    v-if="bin.name == 'SECCO'"
                    src="../assets/secco.png"
                    class="h-24 flex-shrink-0"
                  />
                  <img
                    v-if="bin.name == 'UMIDO'"
                    src="../assets/umido.png"
                    class="h-24 flex-shrink-0"
                  />
                  <img
                    v-if="bin.name == 'PLASTICA/LATTINE'"
                    src="../assets/plastica.png"
                    class="h-24 flex-shrink-0"
                  />
                  <div class="relative">
                    <svg
                      id="svg"
                      width="120"
                      height="120"
                      viewPort="0 0 60 60"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      stroke='#000'
                      :style="`stroke:${color}`"
                    >
                      <circle
                        :r="r"
                        cx="60"
                        cy="60"
                        fill="white"
                        stroke-dasharray="235.26"
                        stroke-dashoffset="0"
                      ></circle>
                      <circle
                        id="bar"
                        :r="r"
                        cx="60"
                        cy="60"
                        fill="transparent"
                        stroke-dasharray="235.26"
                        stroke-dashoffset="0"
                        :style="`stroke-dashoffset: ${rct}px;stroke:#000`"
                      ></circle>
                    </svg>
                    <div
                      class="h3 absolute font-bold text-xl z-10 text-black percentCenter "
                      
                    >
                    {{ value }}%
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="font-normal mt-3 text-white">Prossimo ritiro:</div>
            <div class="flex flex-col font-bold text-white text-xl">
              {{ bin.day | date }}
              
            </div>
          </div>
          <button class="flex justify-end mb-4 mr-4" @click="deleteBin()">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-12 w-12 rounded-full bg-white p-2"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
              />
            </svg>
          </button>
        </div>
      </div>

      <!--seconda card prova, non funziona-->
      <div class="flex flex-col p-4">
        <div>
          <div class="flex flex-col bg-blue-400 rounded-2xl h-72" :style="`background-color:#166534`">
            <div class="flex flex-col px-4 pt-3 justify-center w-full">
              <div class="truncate">
                <div class="font-bold text-white text-2xl">
                  <div>CARTA - CARD PROVA</div>
                  <div class="flex justify-between">
                    <img src="../assets/carta.png" class="h-24 flex-shrink-0" />

                    <div class="relative">
                      <svg
                        id="svg"
                        width="120"
                        height="120"
                        viewPort="0 0 60 60"
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        :style="`stroke:#000`"
                      >
                        <circle
                          :r="r"
                          cx="60"
                          cy="60"
                          fill="white"
                          stroke-dasharray="235.26"
                          stroke-dashoffset="0"
                        ></circle>
                        <circle
                          id="bar"
                          :r="r"
                          cx="60"
                          cy="60"
                          fill="transparent"
                          stroke-dasharray="235.26"
                          stroke-dashoffset="0"
                          :style="`stroke-dashoffset: ${rctProva}px;stroke:#000`"
                        ></circle>
                      </svg>
                      <div
                        class="h3 absolute font-bold text-xl z-10 text-black percentCenter"
                      >
                        {{valueProva}}%
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="font-normal mt-3 text-white">Prossimo ritiro:</div>
              <div class="flex flex-col font-bold text-white text-xl"> Mercoledì 16 Marzo 2022 </div>
            </div>
            <!--delete bin-->
            <button class="flex justify-end mb-4 mr-4">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-12 w-12 rounded-full bg-white p-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- terza card per delete cestino -->
      <div class="flex flex-col p-4">
        <div class="w-full flex justify-center items-end h-72 bg-blue-400 rounded-2xl">
          <t-button2 @click="changeBinStatus()" class="flex flex-col mx-1 my-4">
            Collega il tuo cestino
          </t-button2>
        </div>

        <div>
          <t-modal
            v-model="showModalMaterial"
            header="Scegli il materiale"
            close="chiudi"
          >
            <ModalMaterial @exit="closeMaterialModal" ></ModalMaterial>
          </t-modal>
        </div>
      </div>
    </VueSlickCarousel>
  </div>
</template>

<script>
import VueSlickCarousel from "slick-vuejs";
import "slick-vuejs/dist/slick-vuejs.css";
import ModalMaterial from "@/components/ModalMaterial";
import axios from 'axios';


export default {
  components: {
    VueSlickCarousel,
     ModalMaterial,
  },
  data() {
    return {
      r: 37.5,
      rMobile: 25,
      rct: 235.26,
      rctMobile: 235.26,
      rctProva:235.26,
      valueProva:60,
      isLoading: false,
      viewBinUser:[],
      value: 1,
      localBin: [],
      bin: [
        {
          name: "",
          day: "",
        },
      ],
      showModalMaterial: false,
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
    changeBinStatus() {
      if (!this.user.zone_id) {
        this.$fire({
          text:
            "Prima di collegare il cestino ti chiediamo di indicare il tuo quartiere di residenza",
          type: "warning",
          timer: 3000,
        }).then((r) => {
          this.showModal = !this.showModal;
          console.log(r);
        });
      }
      if(this.viewBinUser.bin_id){
        this.$fire({
          text:
            "Attualmente possediamo un solo cestino e non puoi aggiungerne altri :)",
          type: "warning",
          timer: 3000,
        })
      }
      else {
        this.showModalMaterial = !this.showModalMaterial;
      }
    },
    closeMaterialModal() {
      this.showModalMaterial = !this.showModalMaterial;
      this.getBin();
    },
    async deleteBin() {
      this.isLoading = true;
      this.bin = [];
      this.viewBinUser = [];
      this.userBin = JSON.parse(localStorage.getItem("BinUser"));
      let id = this.userBin[0].id;
      await this.$axios.delete("/r4g/delete-bin-user/" + id);
      await this.$axios.delete("/r4g/delete-bin/" + id);
      localStorage.removeItem('BinUser');
      localStorage.removeItem('UserBin');
      this.localBin = [];
      this.userBin = [];
      this.isLoading = false;
    },
    weekDay(day) {
      let days = new Date();
      let nDay = days.getDay() - 1;
      if (Number(nDay) > Number(day)) {
        let ritiro = days.setDate(days.getDate() + (day - nDay) + 7);
        this.bin.day = new Date(ritiro);
      } else if (Number(nDay) <= Number(day)) {
        let ritiro = days.setDate(days.getDate() + (day - nDay));
        this.bin.day = new Date(ritiro);
      }
    },

    //calcolo percentuale del cestino
    changePercent() {
      let c = Math.PI * (this.r * 2);
      this.rct = ((100 - this.value) / 100) * c;

      let c2 = Math.PI * (this.rMobile * 2);
      this.rctMobile = ((100 - this.value) / 100) * c2;

      let c3 = Math.PI * (this.rctProva * 2);
      this.rctProva = ((100 - this.valueProva) / 100) * c3;

    },
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
        }
      }

      if (this.bin.name == "SECCO") {
        this.color = "#9CA3AF";
      } else if (this.bin.name == "CARTA") {
        this.color = "#166534";
      } else if (this.bin.name == "UMIDO") {
        this.color = "#854D0E";
      } else if (this.bin.name == "PLASTICA/LATTINE") {
        this.color = "#1E3A8A";
      }

    },
    async getBin() {
      this.isLoading = true;
      let response = await this.$axios.get("/r4g/view-bin-user/" + this.user.id);
      this.viewBinUser = response.data;

      let bin = await this.$axios.get("/r4g/bin/" + this.user.id);
      let userBin = bin.data;

      let BinUser = JSON.stringify(userBin);
      localStorage.setItem("BinUser", BinUser);
      if (this.viewBinUser.bin_id) {
        let res = await this.$axios.get("/r4g/material-bin/" + this.viewBinUser.bin_id);
        if (res) {
          let calendaBin = res.data;
          this.localBin = JSON.stringify(calendaBin);
          localStorage.setItem("Bin", this.localBin);
          this.populateBin();
        }
      }
      this.isLoading = false;
    },
    async getDistance() {

       let length = this.userBin.length;
      let arrayFeeds = await axios.get("https://api.thingspeak.com/channels/1662872/feeds.json?api_key=HIH5TLATNEAHP71F&results=2");
      let lastElement = arrayFeeds.data.feeds.pop();
      let distance = lastElement.field1;
      let valore = Math.round(100-(((length-distance)*100)/length));
      this.value = isNaN(valore) ? 0 : valore;

      if(this.value > 100){
        this.value = 100;
      }

      if(this.value > 80){
        this.sendEMail()
      }else if(this.value <= 80){
        await axios.put("/r4g/not-send-email-percent/" + this.userBin[0].id);
      }

      this.changePercent();
      
    },
    async sendEMail(){
      await axios.get("/r4g/send-email-percent/" + this.userBin[0].id)
    },
  },
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
  stroke: #cfcfcf;
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

.percentCenter{
  left: 50%; 
  top: 50%; 
  transform: translate(-50%, -50%)
}

</style>
