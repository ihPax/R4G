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
      style="background-image: url(landing/background-landing.jpeg)"
    >
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
                    text-2xl
                    md:text-5xl
                    mb-4
                    font-bold font-heading
                    text-white
                  "
                >
                  Titolo
                </h2>
                <p
                  class="text-blueGray-200 leading-relaxed text-lg md:text-2xl"
                >
                  Descrizione
                </p>
              </div>
              <div class="text-center lg:text-left">
                <a
                  class="
                    block
                    sm:inline-block
                    py-5
                    px-8
                    mb-4
                    sm:mb-0 sm:mr-3
                    text-normal text-white text-center
                    font-semibold
                    leading-none
                    bg-green-600
                    hover:bg-green-700
                    rounded
                    cursor-pointer
                    transition
                    duration-400
                  "
                >
                  Primo Bottone
                </a>
                <a
                  class="
                    block
                    sm:inline-block
                    py-5
                    px-8
                    text-normal text-blueGray-500
                    hover:text-blueGray-600
                    text-center
                    font-semibold
                    leading-none
                    bg-white
                    border border-blueGray-200
                    hover:border-blueGray-300
                    rounded
                    cursor-pointer
                  "
                >
                  Secondo bottone
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="py-20 bg-blueGray-50" id="how-it-works">
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
              <span>Come Funziona?</span>
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
            <div class="p-12 bg-white shadow rounded h-full">
              <img
                class="h-48 mb-12 mx-auto w-auto"
                src="../assets/deal.svg"
                alt=""
              />
              <img class="h-48 mb-12 mx-auto w-auto" alt="" />
              <h3 class="mb-2 font-bold font-heading">Titolo</h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Descrizione
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6 last:px-0">
            <div class="p-12 bg-white shadow rounded h-full">
                              <img
                class="h-48 mb-12 mx-auto w-auto"
                src="../assets/deal.svg"
                alt=""
              />
              <img class="h-48 mb-12 mx-auto w-auto" alt="" />
              <h3 class="mb-2 font-bold font-heading">Titolo</h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Descrizione
              </p>
            </div>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/3 px-3 mb-6 last:px-0">
            <div class="p-12 bg-white shadow rounded h-full">
                              <img
                class="h-48 mb-12 mx-auto w-auto"
                src="../assets/deal.svg"
                alt=""
              />
              <img class="h-48 mb-12 mx-auto w-auto" alt="" />
              <h3 class="mb-2 font-bold font-heading">Titolo</h3>
              <p class="text-sm text-blueGray-600 leading-relaxed">
                Descrizione
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