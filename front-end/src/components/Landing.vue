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
              bg-transparent
              hover:bg-yellow-600
              text-yellow-600
              font-semibold
              hover:text-white
              py-2
              mx-8
              px-4
              border border-black
              hover:border-transparent
              rounded-xl
            "
          >
            Registrati
          </button>
          <button
            class="
              bg-transparent
              hover:bg-yellow-600
              text-yellow-600
              font-semibold
              hover:text-white
              py-2
              px-4
              mx-8
              border border-black
              hover:border-transparent
              rounded-xl
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
                  Collega il tuo cestino e scopri come la tecnologia può aiutarti a fare del bene per te e per il pianeta.
                </p>
              </div>
              <div class="text-center lg:text-left">
                <button
                  class="
                    bg-transparent
                    hover:bg-yellow-600
                    text-yellow-600
                    font-semibold
                    hover:text-white
                    py-2
                    mx-8
                    px-4
                    border border-black
                    hover:border-transparent
                    rounded-xl
                  "
                >
                  Sei già un cliente? Accedi!
                </button>
                <button
                  class="
                    bg-transparent
                    hover:bg-yellow-600
                    text-yellow-600
                    font-semibold
                    hover:text-white
                    py-2
                    mx-8
                    px-4
                    border border-black
                    hover:border-transparent
                    rounded-xl
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
              <h3 class="mb-2 font-bold text-yellow-600 font-heading">Compra</h3>
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
              <h3 class="mb-2 font-bold font-heading text-yellow-600">Collega</h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Collega il tuo cestino alla nostra piattaforma online!
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
              <h3 class="text-yellow-600 mb-2 font-bold font-heading">Differenzia   </h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Inizia a differenziare i tuoi rifiuti!
              </p>
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