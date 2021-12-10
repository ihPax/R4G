<template>
  <div class="w-full h-full bg-white text-gray-600">
    <div class="flex-row flex">
      <div class="flex-col flex">
        <img src="../assets/logor4gblack.png" class="w-3/4" alt="" />
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
        <div class="flex-row flex">
          <button
            class="
              px-4
              py-2
              rounded-md
              text-sm
              font-medium
              border
              focus:outline-none focus:ring
              rounded-xl
              transition
              text-yellow-600
              border-yellow-600
              mx-8
              hover:text-white hover:bg-yellow-600
              active:bg-yellow-700
              focus:ring-yellow-300
            "
          >
            Registrati
          </button>
          <button
            class="
              px-4
              py-2
              rounded-md
              text-sm
              font-medium
              border
              focus:outline-none focus:ring
              rounded-xl
              transition
              text-yellow-600
              border-yellow-600
              mx-8
              hover:text-white hover:bg-yellow-600
              active:bg-yellow-700
              focus:ring-yellow-300
            "
          >
            Accedi
          </button>
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
      style="background-image: url()"
    >
      <div class="h-full w-full absolute bg-blue-500 opacity-60"></div>
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
              <div class="text-center lg:text-left">
                <button
                  class="
                    px-4
                    py-2
                    rounded-md
                    text-sm
                    font-medium
                    border-0
                    focus:outline-none focus:ring
                    transition
                    text-white
                    bg-yellow-500
                    rounded-xl
                    hover:bg-yellow-600
                    mx-4
                    active:bg-yellow-700
                    focus:ring-yellow-300
                  "
                >
                  Sei già un cliente? Accedi!
                </button>
                <button
                  class="
                    px-4
                    py-2
                    rounded-md
                    text-sm
                    mx-8
                    font-medium
                    border-0
                    focus:outline-none focus:ring
                    transition
                    text-white
                    bg-yellow-500
                    rounded-xl
                    hover:bg-yellow-600
                    active:bg-yellow-700
                    focus:ring-yellow-300
                  "
                >
                  Compra ora
                </button>
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
            <div class="p-12 bg-white shadow rounded">
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
            <div class="p-12 bg-white shadow rounded">
              <img
                class="h-48 mb-12 mx-auto w-auto"
                src="../assets/deal.svg"
                alt=""
              />
              <h3 class="mb-2 font-bold font-heading text-yellow-600">
                Collega
              </h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Collegalo alla nostra piattaforma online tramite Cloud!
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6 last:px-0">
            <div class="p-12 bg-white shadow rounded">
              <img
                class="h-48 mb-12 mx-auto w-auto"
                src="../assets/deal.svg"
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
          <div class="mb-6 w-full">
            <h2
              class="
                justify-center
                text-center
                flex
                text-greenlanding text-4xl
                font-bold font-heading
              "
            >
              I nostri servizi
            </h2>
            <h3
              class="
                text-blueGray-600 text-center
                flex
                text-sm
                max-w-lg
                mx-auto
              "
            >
              Un piccolo gesto può fare la differenza, la raccolta differenziata
              è un dovere civico e grazie al Cestino Smart sarà molto più
              semplice adempiere ai propri doveri.
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
              <div class="mr-6"></div>
              <div class="mt-4 flex-grow">
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
              <div class="mr-6"></div>
              <div class="mt-4 flex-grow">
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
              <div class="mr-6"></div>
              <div class="mt-4 flex-grow">
                <p class="text-blueGray-600 leading-loose">Una Dashboard con la quale monitorare lo stato dei tuoi cestini.</p>
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
              <div class="mr-6"></div>
              <div class="mt-4 flex-grow">
                <p class="text-blueGray-600">
                  Un Calendario intelligente, una verà e proprio comodità che ti
                  permette di risparmiare del tempo prezioso.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>
<style>

</style>