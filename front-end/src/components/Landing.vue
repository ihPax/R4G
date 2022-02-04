<template>
  <div class="w-full h-full bg-white text-gray-600">
    <div class="flex-row flex">
      <div class="flex-col flex">
        <router-link to="/landing">
          <img
            src="../assets/logor4gblack.png"
            class="w-3/4 cursor-pointer"
            alt="logo R4G"
          />
        </router-link>
      </div>
      <div
        class="flex-col justify-center items-center text-center flex flex-grow"
      >
        <div class="flex-row flex justify-center align-center">
          <span class="text-gray-600 font-semibold text-lg mx-8"
            >Come funziona?</span
          >
          <span class="text-gray-600 font-semibold text-lg mx-8"
            >I nostri servizi</span
          >
          <span class="text-gray-600 font-semibold text-lg mx-8"
            >Chi siamo?</span
          >
        </div>
      </div>
      <div class="flex-col flex justify-center items-center align-center">
        <div
          class="
            flex-row flex flex-wrap
            justify-center
            py-10
            text-gray-300
            my-5
            mr-10
          "
        >
          <a
            @click="goToRegistration()"
            class="
              button button--moema
              px-3
              py-2
              hover:bg-yellow-600 hover:text-white
              text-yellow-600
              relative
              border-yellow-500
              block
              focus:outline-none
              border-2 border-solid
              rounded-lg
              mr-8
              text-sm text-center
              font-semibold
              tracking-widest
            "
          >
            Registrati
          </a>
          <a
            @click="goToLogin()"
            class="
              button button--moema
              px-3
              py-2
              mr-2
              hover:text-white
              relative
              text-white
              bg-yellow-600
              border-yellow-500
              block
              focus:outline-none
              border-2 border-solid
              rounded-lg
              text-sm text-center
              font-semibold
              tracking-widest
            "
          >
            Accedi
          </a>
        </div>
      </div>
    </div>
    <div
      class="
        relative
        min-h-1/2
        md:h-192
        bg-no-repeat bg-cover
        mx-10
        rounded-xl
        overflow-hidden
      "
      style="
        background-image: url(https://www.dagospia.com/img/foto/05-2021/mascherine-in-mare-6-1459672_tn.jpeg);
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
              <div class="mx-auto lg:mx-0 mb-12 text-center lg:text-center">
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
                    border-2 border-white
                    relative
                    block
                    focus:outline-none
                    rounded-lg
                    text-sm text-center
                    font-semibold
                    tracking-widest
                    align-middle
                    overflow-hidden
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
                    block
                    focus:outline-none
                    border-2 border-white
                    rounded-lg
                    text-sm text-center
                    font-semibold
                    tracking-widest
                    align-middle
                    ml-10
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
          <div class="w-full mb-4 lg:mb-0">
            <h2 class="text-4xl mt-3 font-bold font-heading">
              <span class="text-yellow-600">Come Funziona?</span>
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
    <div class="py-6 bg-white">
      <div class="pt-10 pb-12">
        <div class="container px-4 mx-auto">
          <div class="mb-2 w-full">
            <h2
              class="
                justify-center
                text-center
                flex
                text-greenlanding text-4xl
                font-bold font-heading
                mb-2
              "
            >
              I nostri servizi
            </h2>
            <h3 class="text-blueGray-600 text-center text-md max-w-md mx-auto">
              Un piccolo gesto può fare la
              <b class="text-greenlanding"> differenza </b>, la raccolta
              differenziata è un
              <b class="text-greenlanding"> dovere civico </b> e grazie al
              Cestino Smart sarà molto più semplice adempiere ai propri doveri.
            </h3>
          </div>
          <div
            class="
              grid grid-cols-2
              justify-center
              flex
              items-center
              -mx-3
              text-center
            "
          >
            <div
              class="
                px-3
                mb-8
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
                    my-5
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
                  Un Calendario intelligente, una verà e proprio comodità che ti
                  permette di risparmiare del tempo prezioso.
                </p>
              </div>
            </div>
            <div
              class="
                px-3
                mb-8
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
                class="mt-4 flex-grow justify-center items-center text-center"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="
                    text-center
                    mx-auto
                    my-5
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
                mb-8
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
                class="mt-4 flex-grow items-center justify-center text-center"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="
                    text-center
                    mx-auto
                    my-5
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
                  Una Dashboard con la quale monitorare lo stato dei tuoi
                  cestini.
                </p>
              </div>
            </div>
            <div
              class="
                px-3
                mb-8
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
                    my-5
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
                  Un Calendario intelligente, una verà e proprio comodità che ti
                  permette di risparmiare del tempo prezioso.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="py-20 bg-blueGray-50">
          <div class="container px-4 mx-auto">
            <div class="flex flex-wrap lg:flex-nowrap">
              <div class="w-full lg:w-2/3">
                <h2 class="text-4xl mt-3 font-bold font-heading text-green-700">
                  Chi Siamo
                </h2>
                <div class="py-6 lg:pr-24">
                  <p class="mb-6 leading-loose text-blueGray-600">
                    Un Calendario intelligente, una verà e proprio comodità che
                    ti permette di risparmiare del tempo prezioso. Un Calendario
                    intelligente, una verà e proprio comodità che ti permette di
                    risparmiare del tempo prezioso. Un Calendario intelligente,
                    una verà e proprio comodità che ti permette di risparmiare
                    del tempo prezioso.
                  </p>
                  <p class="mb-6 leading-loose text-blueGray-600 inline">
                    Un Calendario intelligente, una verà e proprio comodità che
                    ti permette di risparmiare del tempo prezioso.
                  </p>
                </div>
              </div>
              <div
                class="
                  relative
                  w-full
                  my-12
                  lg:w-1/2 lg:my-0
                  sm:flex
                  flex-col
                "
              >
                <div
                  class="
                    relative
                    mx-auto
                    rounded-xl
                    w-full
                    z-10
                    my-4
                    h-full
                    bg-cover bg-blue-200 bg-center
                  "
                  style="
                    background-image: url(https://www.dagospia.com/img/foto/05-2021/mascherine-in-mare-6-1459672_tn.jpeg);
                  "
                  alt=""
                ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
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