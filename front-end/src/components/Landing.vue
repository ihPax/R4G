<template>
  <div class="w-full h-full bg-white text-gray-600">
    <LoginRegisterBar></LoginRegisterBar>
    <div class="flex flex-wrap py-2 xs:py-4">
      <div
        class="flex-col justify-center items-center flex flex-grow"
      >
        <div class="flex-row flex justify-center align-center">
          <a class="text-gray-600 font-semibold text-lg p-4 xs:px-8 hover:text-yellow-600 tracking-wide cursor-pointer transition duration-300 ease-in-out"
            href="#Works">Come funziona?</a
          >
          <a class="text-gray-600 font-semibold text-lg p-4 xs:px-8 hover:text-green-600 tracking-wide cursor-pointer transition duration-300 ease-in-out"
            href="#Service">I nostri servizi</a
          >
          <a class="text-gray-600 font-semibold text-lg p-4 xs:px-8 hover:text-blue-500 tracking-wide cursor-pointer transition duration-300 ease-in-out"
            href="#Who">Chi siamo?</a
          >
        </div>
      </div>
    </div>
    <div
      class="
        relative
        min-h-1/2
        md:h-192
        bg-no-repeat bg-cover
        mx-4
        lg:mx-10
        rounded
        lg:rounded-xl
        overflow-hidden
      "
      style="
        background-image: url(https://t4.ftcdn.net/jpg/03/11/97/47/360_F_311974779_RwKYnMTawMHG33Dz7NLBFqsToNZRZCdq.jpg);
      "
    >
      <div class="h-full w-full absolute bg-blue-500 opacity-30"></div>
      <!-- <div class="h-full w-full absolute opacity-50">
        <img class="h-full w-full absolute" src="../assets/background-landing.jpeg" alt=""> 
      </div> -->
      <div
        class="
          hidden
          lg:block
          absolute
          inset-0
          w-1/2
          ml-auto
          bg-blueGray-50
          z-0
        "
        style="z-index: -1"
      ></div>
      <div class="container px-4 mx-auto relative h-full">
        <div class="flex flex-wrap items-center -mx-3 h-full">
          <div class="w-full lg:w-2/2 px-3 h-full">
            <div
              class="
                py-20
                md:py-12
                h-full
                flex flex-col
                md:justify-center
                items-center
              "
            >
              <div class="mx-auto lg:mx-0 mb-12 xs:text-center">
                <h2
                  class="
                    text-3xl
                    md:text-5xl
                    mb-4
                    font-bold font-heading
                    text-white
                  "
                >
                  Noi aiutiamo te, tu aiuta il pianeta.
                </h2>
                <p
                  class="text-blueGray-200 leading-relaxed text-lg md:text-2xl"
                >
                  Collega il tuo cestino e scopri come la tecnologia può
                  aiutarti a fare del bene per te e per il pianeta.
                </p>
              </div>
              <div
                class="
                  text-center
                  flex flex-row
                  justify-center
                  items-center
                  lg:text-left
                  flex-wrap
                "
              >
                <a
                  @click="goToLogin()"
                  class="
                    button button--winona
                    p-0
                    bg-yellow-600
                    hover:bg-yellow-600 hover:text-white
                    text-white
                    relative
                    block
                    px-3
                    focus:outline-none
                    rounded-lg
                    text-sm text-center
                    font-semibold
                    cursor-pointer
                    tracking-widest
                    align-middle
                    overflow-hidden
                    xs:mx-4
                  "
                  data-text="Accedi!"
                >
                  <span class="align-middle block"> Sei già un cliente? </span>
                </a>
                <a
                  @click="goToLogin()"
                  class="
                    button button--winona
                    p-0
                    bg-yellow-600
                    hover:bg-yellow-600 hover:text-white
                    text-white
                    relative
                    cursor-pointer
                    px-3
                    block
                    focus:outline-none
                    rounded-lg
                    text-sm text-center
                    font-semibold
                    tracking-widest
                    align-middle
                    m-4
                    overflow-hidden
                  "
                  data-text="Compra ora"
                >
                  <span class="align-middle block"> Compra ora</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="py-20 bg-blueGray-50">
      <div class="container px-4 mx-auto">
        <div
          class="
            flex flex-col
            items-center
            justify-center
            max-w-2xl
            lg:max-w-full
            mb-12
          "
        >
          <div class="w-full mb-4 lg:mb-0" id="Works">
            <h2 class="text-4xl mt-3 font-bold font-heading">
              <span class="text-yellow-600" >Come Funziona?</span>
            </h2>
          </div>
          <div class="w-full">
            <p class="text-blueGray-600 leading-loose text-lg">
              Compra, Collega e Differenzia!
            </p>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 -mb-6 text-center items-stretch">
          <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6 last:px-0">
            <div
              class="
                p-12
                bg-white
                shadow
                rounded-lg
                border-2
                px-4
                py-6
                transform
                transition
                duration-600
                hover:scale-110
              "
            >
              <img
                class="h-48 mb-12 mx-auto w-auto"
                src="../assets/deal.svg"
                alt=""
              />
              <h3 class="mb-2 font-bold text-yellow-600 font-heading">
                Compra
              </h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Compra il cestino per semplificare la tua vita!
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6 last:px-0">
            <div
              class="
                p-12
                bg-white
                shadow
                rounded-lg
                border-2
                px-4
                py-6
                transform
                transition
                duration-600
                hover:scale-110
              "
            >
              <img
                class="h-48 mb-12 mx-auto w-auto"
                src="../assets/upload.svg"
                alt=""
              />
              <h3 class="mb-2 font-bold font-heading text-yellow-600">
                Collega
              </h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Collegalo alla nostra piattaforma online!
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6 last:px-0">
            <div
              class="
                p-12
                bg-white
                shadow
                rounded-lg
                border-2
                px-4
                py-6
                transform
                transition
                duration-600
                hover:scale-110
              "
            >
              <img
                class="h-48 mb-12 mx-auto w-auto"
                src="../assets/throw.svg"
                alt=""
              />
              <h3 class="text-yellow-600 mb-2 font-bold font-heading">
                Differenzia
              </h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Inizia a differenziare i tuoi rifiuti in modo Smart!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="py-6 bg-white" id="Service">
      <div class="pt-10 pb-12">
        <div class="container px-4 mx-auto">
          <div class="mb-2 w-full">
            <h2
              class="
                xs:justify-center
                flex
                text-greenlanding text-4xl
                font-bold font-heading
                mb-6 xs:mb-2
              "
            >
              I nostri servizi
            </h2>
            <h3 class="text-blueGray-600 xs:text-center text-md max-w-md mx-auto">
              Un piccolo gesto può fare la
              <b class="text-greenlanding"> differenza</b>, la raccolta
              differenziata è un
              <b class="text-greenlanding"> diritto e dovere del cittadino </b> e grazie al
              Cestino Smart potrai essere facilitato nel farla.
            </h3>
          </div>
          <div
            class="
              grid xs:grid-cols-2 lg:grid-cols-4
              -mx-3
              xs:text-center
            "
          >
            <div
              class="
                px-3
                mb-4
                xs:mb-8
                md:mb-12
                flex
                items-center
                mt-2
                text-sm
                leading-loose
                max-w-sm
                mx-auto
              "
            >
              <div class="mt-4 flex-grow">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="
                    xs:text-center
                    mx-auto
                    my-2
                    xs:my-5
                    rounded-full
                    h-20
                    w-20
                    text-black
                    border-2 border-greenborder
                  "
                  fill="none"
                  viewBox="4 -2 16 30"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                  />
                </svg>
                <p class="text-blueGray-600 leading-loose">
                  Un Calendario intelligente, una vera e proprio comodità che ti
                  permette di risparmiare del tempo prezioso.
                </p>
              </div>
            </div>
            <div
              class="
                px-3
                mb-4
                xs:mb-8
                md:mb-12
                flex
                items-center
                mt-2
                text-sm
                leading-loose
                max-w-sm
                mx-auto
              "
            >
              <div
                class="mt-4 flex-grow justify-center items-center xs:text-center"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="
                    xs:text-center
                    mx-auto
                    my-2
                    xs:my-5
                    text-black
                    rounded-full
                    h-20
                    w-20
                    border-2 border-greenborder
                  "
                  fill="none"
                  viewBox="4 -2 16 30"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                  />
                </svg>
                <p class="text-blueGray-600 leading-loose">
                  Una volta impostato il quartiere in cui abiti sul calendario,
                  ti avviseremo di preparare la spazzatura corretta.
                </p>
              </div>
            </div>
            <div
              class="
                px-3
                mb-4
                xs:mb-8
                md:mb-12
                flex
                items-center
                mt-2
                text-sm
                leading-loose
                max-w-sm
                mx-auto
              "
            >
              <div
                class="mt-4 flex-grow items-center justify-center xs:text-center"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="
                    text-center
                    mx-auto
                    my-2
                    xs:my-5
                    rounded-full
                    h-20
                    w-20
                    text-black
                    border-2 border-greenborder
                  "
                  fill="none"
                  viewBox="4 -2 16 30"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                  />
                </svg>
                <p class="text-blueGray-600 leading-loose">
                  Una Dashboard nella quale puoi tenere d'occhio facilmente lo stato dei tuoi
                  cestini, sia dal tuo pc che dal tuo smartphone.
                </p>
              </div>
            </div>
            <div
              class="
                px-3
                mb-4
                xs:mb-8
                md:mb-12
                flex
                items-center
                mt-2
                text-sm
                leading-loose
                max-w-sm
                mx-auto
              "
            >
              <div class="mt-4 flex-grow">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="
                    text-center
                    mx-auto
                    my-2
                    xs:my-5
                    text-black
                    rounded-full
                    h-20
                    w-20
                    border-2 border-greenborder
                  "
                  fill="none"
                  viewBox="4 -2 16 30"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                  />
                </svg>
                <p class="text-blueGray-600">
                  Avrai a disposizione i dati delle settimane e mesi precedenti, 
                  per scoprire se i tuoi consumi sono aumentati o diminuiti.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="py-20 bg-blueGray-50" id="Who">
          <div class="container px-4 mx-auto">
            <div class="flex flex-wrap lg:flex-nowrap">
              <div class="w-full lg:w-2/3">
                <h2 class="text-4xl mt-3 font-bold font-heading text-blue-500">
                  Chi Siamo
                </h2>
                <div class="py-6 lg:pr-24">
                  <p class="mb-6 leading-loose text-blueGray-600">
                    Siamo un team di sei ragazzi, studenti della fondazione ITS Academy Last, 
                    indirizzo Digital Transformation Specialist, che ha sviluppato un progetto 
                    per dare il suo contributo nel risolvere un problema che sta coinvolgendo 
                    il mondo intero, ovvero il Cambiamento Climatico.
                  </p>
                  <p
                    class="mb-6 leading-loose text-blueGray-600"
                    v-if="read == true"
                  >
                    Abbiamo scelto di farlo con un innovativo sistema per controllare 
                    i propri cestini, anche a distanza, e semplificarne la gestione 
                    per incentivare le persone a fare la raccolta differenziata 
                    e che avvisa il giorno in cui va portato all'esterno per la raccolta 
                    un determinato tipo di rifiuti.
                  </p>
                  <button
                    @click="KeepReading()"
                    class="text-underline text-yellow-500"
                  >
                    <span v-if="read == true">Leggi meno.</span>

                    <span v-if="read == false"> Continua a leggere...</span>
                  </button>
                </div>
              </div>
              <div
                class="relative w-full my-12 lg:w-1/2 lg:my-0 sm:flex flex-col"
              >
                <div
                  class="
                    relative
                    mx-auto
                    rounded-xl
                    w-full
                    z-10
                    my-4
                    h-48
                    xs:h-80
                    lg:h-full
                    bg-cover bg-blue-200 bg-center
                  "
                  style="
                    background-image: url(https://images.unsplash.com/photo-1604187351574-c75ca79f5807?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cmVjeWNsZXxlbnwwfHwwfHw%3D&w=1000&q=80);
                  "
                  alt=""
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <transition name="fade">
      <button id="pagetop" class="z-50 fixed right-0 bottom-0 w-12 h-12 rounded-full bg-orangelogo opacity-80 hover:opacity-100 flex justify-center items-center mb-4 mr-4 shadow-md transition duration-300 ease-in-out" v-show="scY > 300" @click="toTop">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="#fff" d="M5 15l7-7 7 7" />
        </svg>
      </button>
    </transition>
  </div>
</template>

<script>
import LoginRegisterBar from "@/components/LoginRegisterBar.vue";
export default {
  components: {
    LoginRegisterBar
  },
  props: {},
  data() {
    return {
      read: false,
      scTimer: 0,
      scY: 0,
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
  },
  methods: {
    goToRegistration() {
      this.$router.push({
        name: "registration",
      });
    },
    goToLogin() {
      this.$router.push({
        name: "login",
      });
    },
    KeepReading() {
      this.read = !this.read;
    },
    handleScroll() {
        if (this.scTimer) return;
        this.scTimer = setTimeout(() => {
          this.scY = window.scrollY;
          clearTimeout(this.scTimer);
          this.scTimer = 0;
        }, 100);
      },
      toTop() {
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
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
/* Winona */
.button--winona {
  -webkit-transition: border-color 0.3s, background-color 0.3s;
  transition: border-color 0.3s, background-color 0.3s;
  -webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
  transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}

.button--winona::after {
  content: attr(data-text);
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0;
  -webkit-transform: translate3d(0, 25%, 0);
  transform: translate3d(0, 25%, 0);
}

.button--winona::after,
.button--winona > span {
  padding: 1em 2em;
  -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
  transition: transform 0.3s, opacity 0.3s;
  -webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
  transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
}

.button--winona:hover::after {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.button--winona:hover > span {
  opacity: 0;
  -webkit-transform: translate3d(0, -25%, 0);
  transform: translate3d(0, -25%, 0);
}
</style>