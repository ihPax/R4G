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
            class="flex flex-col-reverse lg:flex-row items-center justify-between shadow-inner rounded-lg border-2" :style="`border-color: ${color}; background-color: ${color}`"
          >
            <div
              v-if="localBin == '' && !isLoading"
              class="flex flex-col-reverse lg:flex-row items-center"
            >
              <t-button @click="changeBinStatus()" class="flex flex-col mx-1 my-4">
                Collega il tuo cestino
              </t-button>
            </div>
            <div v-if="isLoading" class="flex flex-col justify-center items-center">
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
                <div class="flex flex-col py-4 justify-center text-white">
                  <div class="font-bold pl-4 text-lg">
                    {{ bin.name }}
                  </div>
                  <div class="relative w-30">
                    <!-- svg desktop -->
                    <svg
                      class="transform -rotate-90 h-30 w-30 svgBin"
                      viewPort="0 0 60 60"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      stroke="black"
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
                        :style="`stroke-dashoffset: ${rct}px; stroke:#000`"
                      ></circle>
                    </svg>
                    <div
                      class="h3 absolute font-bold text-xl text-black bottom-1/2 right-1/2 transform translate-x-1/2 translate-y-1/2"
                    >
                      {{ value }}%
                    </div>
                  </div>
                  <div class="font-semibold pl-4 text-lg">Prossimo ritiro:</div>
                  <div class="font-normal pl-4 capitalize">
                    {{ withdrawalDate }}
                  </div>
                </div>
              </div>
            </div>
            <div class="flex lg:flex-col justify-between">
              <div>
                <div v-if="localBin == '' && !isLoading">
                  <svg class="w-32 h-32 lg:w-48 lg:h-48" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                    <path d="M0 0h24v24H0V0z" fill="none"/>
                    <path d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"/>
                  </svg>
                </div>
                <div v-if="bin.name == 'CARTA'">
                  <img src="../assets/carta.png" class="w-24 lg:w-32 xl:w-40" />
                </div>
                <div v-if="bin.name == 'SECCO'">
                  <img src="../assets/secco.png" class="w-24 lg:w-32 xl:w-40" />
                </div>
                <div v-if="bin.name == 'UMIDO'">
                  <img src="../assets/umido.png" class="w-24 lg:w-32 xl:w-40" />
                </div>
                <div v-if="bin.name == 'PLASTICA/LATTINE'">
                  <img src="../assets/plastica.png" class="w-24 lg:w-32 xl:w-40" />
                </div>
              </div>
              <div class="flex justify-end m-2">
                <button v-if="localBin != '' && !isLoading" @click="deleteBin()">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-12 w-12 rounded-full bg-white p-2 border-2 border-black text-orangelogo transition duration-150 ease-out hover:bg-gray-100"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="black"
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

          <div
            v-for="index in 3"
            :key="index"
            @click="changeBinStatus()"
            class="xs:hidden sm:flex flex-col-reverse lg:flex-row items-center justify-between shadow-inner rounded-lg text-center border-2"
          >
            <!-- Sopra tolgo momentaneamente la visualizzazione degli altri 3 cestini nel breakpoint sm -->
            <t-button class="flex flex-col mx-1 my-4"> Collega il tuo cestino </t-button>
            <div></div>
            <div class="flex flex-col mx-1 flex-shrink-0 flex-grow">
              <svg class="w-32 h-32 lg:w-48 lg:h-48" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M14.12 10.47L12 12.59l-2.13-2.12-1.41 1.41L10.59 14l-2.12 2.12 1.41 1.41L12 15.41l2.12 2.12 1.41-1.41L13.41 14l2.12-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"/>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col flex-grow lg:border-l-2 border-black">
        <div class="flex flex-row border-black border-b-2 pb-12 justify-center">
          <div v-if="!user.zone_id" class="pt-12 px-4">
            <t-modal v-model="showModal" header="Scegli la tua zona" close="chiudi">
              <Modal @exit="closeModal"></Modal>
            </t-modal>
            <t-button @click="showModalTrue()" type="button">Scegli la tua zona</t-button>
          </div>
          <div v-if="user.zone_id" class="max-w-xs">
            <Calendar :isExpanded="false" :isMobile="isMobile"></Calendar>
          </div>
        </div>
      </div>
      {{ changeBin }}
    </div>

    <!-- VERSIONE MOBILE -->
    <div v-else>
      <div class="max-w-full flex flex-col">
        <div
          class="p-4 sm:px-6 flex justify-center items-center border-b border-gray-200 bg-blue-50 xs:bg-white"
        >
          <div>
            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
              <path d="M0 0h24v24H0V0z" fill="none"/>
              <path d="M20.5 6c-2.61.7-5.67 1-8.5 1s-5.89-.3-8.5-1L3 8c1.86.5 4 .83 6 1v13h2v-6h2v6h2V9c2-.17 4.14-.5 6-1l-.5-2zM12 6c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
            </svg>
          </div>
          <div class="flex flex-col ml-3">
            <div class="text-xs">{{ user.name }} {{ user.surname }}</div>
            <div class="font-semibold">Benvenuto su R4G!</div>
          </div>
        </div>

        <div class="flex flex-col mx-4">
          <div v-if="isLoading" class="flex flex-col justify-center items-center h-72 my-2">
            <Loading></Loading>
          </div>
          <VueSlickCarousel :arrows="false" :dots="false" v-else>
            <!-- prima card -->
            <div class="p-2" v-if="viewBinUser.bin_id">
              <div
                class="w-full rounded-2xl h-72"
                v-if="localBin != ''"
                :style="`background-color:${color}`"
              >
                <div class="flex flex-col px-4 pt-3 justify-center w-full">
                  <div class="truncate">
                    <div class="font-bold text-white text-2xl">
                      <div>
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
                        <div class="relative -mt-2">
                          <svg
                            class="transform -rotate-90 h-30 w-30 svgBin"
                            viewPort="0 0 60 60"
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            stroke="#000"
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
                              :style="`stroke-dashoffset: ${rct}px; stroke:#000`"
                            ></circle>
                          </svg>
                          <div
                            class="h3 absolute font-bold text-xl z-10 text-black bottom-1/2 right-1/2 transform translate-x-1/2 translate-y-1/2"
                          >
                            {{ value }}%
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="font-normal text-white">Prossimo ritiro:</div>
                  <div class="flex flex-col font-bold text-white text-xl truncate capitalize">
                    {{ withdrawalDate }}
                  </div>
                  <div class="flex justify-end m-2">
                    <button @click="deleteBin()" class="border border-black rounded-full z-10">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-12 w-12 rounded-full bg-white p-2 hover:bg-gray-100"
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
              <div>
                <t-modal v-model="showModal" header="Scegli la tua zona" close="chiudi">
                  <Modal @exit="closeModal"></Modal>
                </t-modal>
              </div>
            </div>

            <!-- seconda card esempio -->
            <div class="flex flex-col p-2">
              <div>
                <div
                  class="w-full rounded-2xl h-72"
                  :style="'background-color: #166534'"
                >
                  <div class="flex flex-col px-4 pt-3 justify-center w-full">
                    <div class="truncate">
                      <div class="font-bold text-white text-2xl">
                        <div>CARTA - CARD PROVA</div>
                        <div class="flex justify-between">
                          <img src="../assets/carta.png" class="h-24 flex-shrink-0" />

                          <div class="relative -mt-2 w-30">
                            <svg
                              class="transform -rotate-90 h-30 w-30 svgBin"
                              viewPort="0 0 60 60"
                              version="1.1"
                              xmlns="http://www.w3.org/2000/svg"
                              stroke="#000"
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
                                :style="`stroke-dashoffset: ${rctProva}px; stroke:#000`"
                              ></circle>
                            </svg>
                            <div
                              class="h3 absolute font-bold text-xl z-10 text-black bottom-1/2 right-1/2 transform translate-x-1/2 translate-y-1/2"
                            >
                              {{ valueProva }}%
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="font-normal text-white">Prossimo ritiro:</div>
                    <div class="flex flex-col font-bold text-white text-xl truncate">
                      Lunedì 21 Marzo 2022
                    </div>
                    <div class="flex justify-end m-2">
                      <div class="border border-black rounded-full z-10">
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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- terza card per aggiunta cestino -->
            <div class="flex flex-col p-2">
              <div class="w-full flex justify-center items-center bg-blue-400 rounded-2xl h-72">
                <button @click="changeBinStatus()" class="h-24 w-24">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full mx-auto rounded-full bg-gray-200 p-2 animate-pulse-short" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                  </svg>
                </button>
              </div>

              <div>
                <t-modal
                  v-model="showModalMaterial"
                  header="Scegli il materiale"
                  close="chiudi"
                  variant="card"
                >
                  <ModalMaterial @exit="closeMaterialModal"></ModalMaterial>
                </t-modal>
              </div>
            </div>
          </VueSlickCarousel>
          <div class="mb-6">
            <div v-if="!user.zone_id" class="flex flex-col items-center">
              <t-modal v-model="showModal" header="Scegli la tua zona" close="chiudi">
                <Modal @exit="closeModal"></Modal>
              </t-modal>
              <t-button @click="showModalTrue()" type="button" class="mt-6">
                Scegli la tua zona
              </t-button>
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
import VueSlickCarousel from "slick-vuejs";
import "slick-vuejs/dist/slick-vuejs.css";
//import SwichCard from "@/components/SwichCard";

export default {
  name: "Home",
  components: {
    Calendar,
    Modal,
    ModalMaterial,
    Loading,
    VueSlickCarousel
   // SwichCard,
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
      changeBin: "",
      access: "",
      user: {},
      rctProva: 564,
      color: "#fff",
      showModal: false,
      valueProva: 60,
      showModalMaterial: false,
      idInterval: 0,
      userBin: [],
      bin: [
        {
          name: "",
          day: "",
        },
      ],
      binLinked: [],
      localBin: [],
      r: 37.5,
      rMobile: 25,
      rct: 235.26,
      rctMobile: 235.26,
      value: 0,
      binExist: false,
      viewBinUser: [],
      isEmailSettled: false, //indica se l'impostazione di invio dell'email relativa al riempimento del cestino è stata salvata nel DB
      firstExecute: true,
      refreshTime: 1800, //La funzione si ripete ogni mezzora, ma per le dimostrazioni si impostino 15 secondi
      dateToShow: new Date()
    };
  },
  async mounted() {
    let user = JSON.parse(localStorage.getItem("AccessEmail"));
    if (user) {
      this.user = user;
      this.getBin()
    }
  },

  methods: {
    //apre la modale delle zone
    showModalTrue() {
      this.showModal = !this.showModal;
    },
    async getValue() {
      try {
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));
        this.userBin = JSON.parse(localStorage.getItem("BinUser"));
        let length = this.userBin[0].length;
        let arrayFeeds = await this.$axios.get(
          "https://api.thingspeak.com/channels/1662872/feeds.json?api_key=HIH5TLATNEAHP71F&results=2"
        );
        let lastElement = arrayFeeds.data.feeds.pop();
        let distance = lastElement.field1;
        this.value = Math.round(((length - distance) * 100) / length);

        if (this.value < 0 || isNaN(this.value)) {
          this.value = 0;
        } else if (this.value > 100) {
          this.value = 100;
        }

        //PROBLEMI CON ONLINE
        // if (this.value <= 80 && this.isEmailSettled == false) {
        //   await this.$axios.put("/r4g/not-send-email-percent/" + this.userBin[0].id);
        //   this.isEmailSettled = true;
        // } else if (this.value > 80 && (this.isEmailSettled == true || this.firstExecute == true)) {
        //   await this.$axios.get("/r4g/send-email-percent/" + this.userBin[0].id); //invio email
        //   this.isEmailSettled = false;
        // }

        this.changePercent();
      } catch(e) {
        if (e != "Error: Network Error") {
          this.$emit("catch-error", e);
        } else {
          this.clearSetInterval();
        }
      }
    },
    
    //calcola la distanza rilevata dal sensore
    getDistance() {
      if (this.firstExecute == true) {
        this.getValue();
        this.firstExecute = false;
      }
      
      this.idInterval = setInterval(async () => {
        this.getValue();
      }, [this.refreshTime*1000]);
    },

    //alert che ti avvisa di scegliere prima la zona e poi il cestino
    changeBinStatus() {
      if (!this.user.zone_id) {
        this.$fire({
          text:
            "Prima di collegare il cestino ti chiediamo di indicare il tuo quartiere di residenza",
          type: "warning",
          timer: 3000,
        }).then(() => {
          this.showModal = !this.showModal;
        });
      } 
      else if (this.viewBinUser.bin_id && this.user.zone_id) {
        this.$fire({
          text: "Attualmente possediamo un solo cestino e non puoi aggiungerne altri! 🙂",
          type: "warning",
          timer: 3000,
        });
      }
      else {
        this.showModalMaterial = !this.showModalMaterial;
      }
    },

    //chiude la modale al click della scelta della zona
    closeModal() {
      this.user = JSON.parse(localStorage.getItem("AccessEmail"));
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
      try {
        this.viewBinUser = (await this.$axios.get("/r4g/view-bin-user/" + this.user.id)).data; //bin con userId e binId

        if (this.viewBinUser != []) {
          this.binExist = true;
          this.userBin = (await this.$axios.get("/r4g/bin/" + this.user.id)).data; //statistiche bin
          localStorage.setItem("BinUser", JSON.stringify(this.userBin));

          if (this.viewBinUser.bin_id) {
            this.changePercent();
            this.getDistance();
            let res = await this.$axios.get("/r4g/material-bin/" + this.viewBinUser.bin_id);
            if (res) {
              this.localBin = res.data;
              localStorage.setItem("Bin", JSON.stringify(this.localBin));
              this.populateBin();
            }
          }
        }
      } catch(e) {
        this.$emit("catch-error", e);
      } finally {
        this.isLoading = false;
      }
    },

    /** Metodo che scorre localBin e prende giorno e materiale e prossimo ritiro */
    populateBin() {
      this.localBin = JSON.parse(localStorage.getItem("Bin"));
      const today = new Date();
      if (today.getHours() >= 12 && today.getHours() < 24) {
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1); //metto il giorno seguente
        tomorrow.setHours(0,0,0,0); //mezzanotte esatta
        this.dateToShow = tomorrow;
      } else {
        today.setHours(0,0,0,0);
        this.dateToShow = today;
      }
      let max = 6; //di seguito ripeterò il ciclo "while" al massimo 7 volte (come i giorni della settimana), da 0 (del contatore) a 6 
      let numDay = Number(this.dateToShow.getDay()) + 1; //oggi (o domani se fra le 12 e le 23) in versione inglese con inizio settimana a domenica, quindi nDay di domenica è 1
      console.log(`%c Giorno iniziale (oggi o domani): ${numDay} `,`background-color: #259400`);
      let nMonth = Number(this.dateToShow.getMonth()) + 1; //Gennaio sarebbe 0, quindi aggiungo 1
      if (this.localBin.length == 2) {
        let bin = this.localBin[1];
        this.bin.name = bin.material;
        this.weekDay(bin.nDay);
      } else {
      let binToWithdraw = {
        material: "",
        nDay: "",
      }
      for (let i = 1; i < this.localBin.length; i++) {
        //Si entra nel ciclo sotto solo per l'UMIDO, in quanto viene ritirato più d'una volta a settimana
        if (this.localBin.length > 2) {
          let nDay = numDay;
          let counter = 0;
          let bin = this.localBin[i];
          //↓ Fa in modo che il ritiro non sia preso in considerazione se è solo estivo ed il mese corrente non è uno di quelli estivi
          bin.isOnlySummer == true && (nMonth != 6 && nMonth != 7 && nMonth != 8 && nMonth != 9) ? bin = {} : null; 

          let isBinEmpty = Object.keys(bin).length === 0;
          while (bin.nDay != nDay && counter < max) {
            if (isBinEmpty) { //se l'oggetto è vuoto, esci dal ciclo
              counter = max;
            } else {
              nDay = nDay % 7 + 1; //all'ultimo giorno della settimana, riparte da 1, ovvero dal primo giorno della settimana
              counter = counter + 1;
              console.log(` Contatore: ${counter} ••• Giorno ritiro: ${bin.nDay} ••• Giorno: ${nDay} `);
              if (counter > 10) {break;} //per evitare freeze nel caso il ciclo, per un errore, fosse infinito
            }
          }

          !isBinEmpty ? console.log(`%c Max: ${max}` + ` %c ` + `%c Cont: ${counter} `, `background-color: #d12e2e`,``, `background-color: #b57226`) : null;
          if (counter < max) {
            max = counter;
            binToWithdraw.material = bin.material;
            binToWithdraw.nDay = bin.nDay;
          }
          if (max == 0) {break;}
        }
      }
      this.bin.name = binToWithdraw.material;
      this.weekDay(binToWithdraw.nDay);
      }

      if (this.bin.name == "SECCO") {
        this.color = "rgba(75, 85, 99, 1)";
      } else if (this.bin.name == "CARTA") {
        this.color = "rgba(22, 101, 52, 1)";
      } else if (this.bin.name == "UMIDO") {
        this.color = "rgba(133, 77, 14, 1)";
      } else if (this.bin.name == "PLASTICA/LATTINE") {
        this.color = "rgba(30, 58, 138, 1)";
      }
    },

    /** Stabilisce la data del prossimo ritiro
     * @param {number} day Giorno della settimana in numero da 1 a 7 (1 domenica, 7 sabato)
    */
    weekDay(day) {
      console.log(`%c Giorno finale (di ritiro): ${day} `,`background-color: #259400`);
      let nDay = this.dateToShow.getDay() + 1; //1 lunedì, 7 domenica perché in tempo locale in Italia il lunedì è il giorno 1
      let add7Or0 = Number(day) < Number(nDay) ? 7 : 0; //se il giorno di ritiro calcolato (day) è prima nella settimana del giorno di ritiro di quel tipo di rifiuto (ovvero è già passato), aggiunge 7 giorni
      let ritiro = this.dateToShow.setDate(this.dateToShow.getDate() + (day - nDay + add7Or0) % 7);
      this.bin.day = new Date(ritiro);
    },

    /** Calcolo percentuale del cestino */
    changePercent() {
      let c = Math.PI * (this.r * 2);
      this.rct = ((100 - this.value) / 100) * c;

      let c2 = Math.PI * (this.rMobile * 2);
      this.rctMobile = ((100 - this.value) / 100) * c2;
    },

    /** Metodo per eliminare il cestino */
    async deleteBin() {
      this.isLoading = true;
      try {
        this.color = "#fff";
        this.bin = [];
        this.viewBinUser = [];
        this.userBin = JSON.parse(localStorage.getItem("BinUser"));
        let binId = this.userBin[0].id;
        await this.$axios.delete("/r4g/delete-bin/" + binId);
        let keysToRemove = ["BinUser", "Bin", "WithdrawalDate"];
        keysToRemove.forEach(key => localStorage.removeItem(key));
        this.localBin = [];
        this.userBin = [];
        this.getBin();
        this.clearSetInterval();
        this.isEmailSettled = false;
      } catch(e) {
        this.$emit("catch-error", e);
      } finally {
        this.isLoading = false;
      }
    },
    /** Metodo per interrompere la ripetizione della funzione che recupera modifica il valore di riempimento del cestino se il cestino viene cancellato */
    clearSetInterval() {
      clearInterval(this.idInterval);
    }
  },
  computed: {
    /** Ritorna il prossimo ritiro con la data nel formato appropriato */
    withdrawalDate() {
      const wDate = new Date(this.bin.day);
      wDate.setDate(wDate.getDate()+1); //+1 del giorno per poi formattare la data correttamente, ma la data in entrata (value) è uguale a quella in uscita (formattedDate)
      const options = { 
        weekday: 'long',
        day: '2-digit',
        month: 'long',
        year: 'numeric',
        timeZone: 'GMT' 
      };
      let formattedDate = wDate.toLocaleString("it-IT", options);
      localStorage.getItem("WithdrawalDate") != formattedDate ? localStorage.setItem("WithdrawalDate", formattedDate) : null;
      return formattedDate;
    },
  },
  beforeUnmount() {
    this.clearSetInterval();
  }
};
</script>

<style>
.svgBin circle {
  transition: stroke-dashoffset 1.5s cubic-bezier(0.18, 0.89, 0.32, 1.28);
  stroke: #cfcfcf;
  border: 20px solid black;
  stroke-width: 8;
}
</style>
