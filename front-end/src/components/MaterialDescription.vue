<template>
  <div
    class="bg-white xs:shadow-orangexl overflow-hidden sm:rounded-lg max-w-xl mx-auto flex flex-col xs:mb-2"
    :class="{
      'h-full mb-16': filteredDescriptions.length || !isMobile,
      'h-screen': !filteredDescriptions.length && isMobile
    }"
  >
    <button
      @click="$router.go(-1)" :disabled="!isMobile"
      class="disabled:cursor-auto w-full px-4 py-3 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white"
    >
      <div class="block xs:hidden">
        <svg
          class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </div>
      <h3 :class="`text-xl leading-6 font-medium text-${material}`">
        Cosa getto?
        <span
          :style="`background-color: ${item.color}`"
          class="inline-block py-1 px-2 font-semibold text-white rounded"
        >
          {{ item.name }}
        </span>
      </h3>
    </button>
    <div class="flex px-4 py-3 justify-center items-center relative">
      <input
        placeholder="Cerca un tipo di rifiuto..."
        type="text"
        v-model="query"
        class="flex-grow px-3 py-2 border-2 rounded outline-none focus:bg-blueGray-50"
        :class="`text-${material} border-${material} placeholder-${material} placeholder-opacity-70 font-medium`"
      />
      <svg v-if="query != ''" @click="query = ''" class="h-8 w-8 absolute right-0 mr-6 cursor-pointer" :style="`color: ${item.color}`" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
    <div v-for="(line, index) in filteredDescriptions" :key="index">
      <div 
        class="p-1 flex items-center border-blue-100 border-t" 
        :class="{'border-b': filteredDescriptions.length == index + 1}"
      >
        <div
          class="font-semibold"
          :class="line.isYes ? 'text-green-600 px-2' : 'text-red-600 px-1'"
        >
          {{ line.isYes ? "SÌ" : "NO" }}
        </div>
        <div class="flex-grow"> <!-- TAG A e href="https://www.google.com/search?q=amia+dizionario+rifiuti+pdf" target="_blank" OPPURE :href="`https://www.google.com/search?q=dove+buttare+${line.descr}`" -->
          <button @click="openLink(line.descr, requireConfirm = true)" class="text-left w-full h-full px-3 py-1">{{ line.descr }}</button>
        </div>
      </div>
    </div>
    <div
        v-if="!filteredDescriptions.length"
        class="flex flex-col flex-grow mx-auto"
      >
        <div class="px-4 pt-0 pb-3 font-medium text-gray-700"> Nessun tipo di rifiuto trovato in base ai criteri di ricerca 😟 </div>
        <div class="flex flex-col justify-center">
          <a class="block px-4 sm:my-2 sm:rounded bg-blueGray-50 border border-blueGray-200" href="https://www.amiavr.it/Raccolta-differenziata/Il-nuovo-dizionario-dei-rifiuti" target="_blank"> 
            <div class="py-3"> Clicca qui per consultare il dizionario rifiuti </div>
            <div class="mx-auto w-56 sm:w-64 h-auto mb-3">
              <img class="block w-full h-full" src="@/assets/dizionario_rifiuti_amia.jpg" alt="dizionario rifiuti A.M.I.A.">
            </div>
          </a> 
          <div @click="openLink(query, requireConfirm = false)" class="px-4 py-3 cursor-pointer sm:rounded"> 
            Vuoi cercare più informazioni su '<span class="italic font-medium">{{truncatedQuery(query)}}</span>'?
          </div>
        </div>
      </div>
    <GoBack :isMobile="isMobile"></GoBack>
  </div>
</template>

<script>
import GoBack from "@/components/GoBack";
export default {
  components: {
    GoBack,
  },
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      items: [],
      item: {},
      descriptions: [],
      query: "",
      material: ""
    };
  },
  mounted() {
    this.material = this.$route.params.material;
    this.items = JSON.parse(localStorage.getItem("MaterialDescriptions"));
    this.item = this.items.find(obj => {
      return obj.name.includes(this.material.toUpperCase())
    });  
    this.descriptions = this.item.descriptions.sort((x, y) => y.isYes - x.isYes); //Ordino la lista in modo che ci siano sempre prima i "Sì"
  },
  computed: {
    filteredDescriptions() {
      return this.descriptions.filter((obj) => {
        let descr = obj.descr.toLowerCase();
        let query = this.query.toLowerCase();
        return (
          descr.includes(query.trim()) ||
          query.length > 3 ? descr.includes(query.trim().slice(0, -1)) : null 
          // ↑ rimuove l'ultimo carattere dalla ricerca, così se uno cerca un nome singolare e nella descrizione c'è al plurale, lo trova
        );
      });
    },
    truncatedQuery() {
      return (query) => {
        return query.length <= 20 ? query : query.substr(0, 20) + '...'
        }
      }
  },
  methods: {
    openLink(descr, requireConfirm) {
      if (requireConfirm) {
        this.$fire({
          html: `Vuoi cercare più informazioni su '<span class="italic font-medium">${descr}</span>'?`,
          type: "question",
          confirmButtonText: 'Sì',
          showCancelButton: true,
          cancelButtonText: 'Annulla',
          reverseButtons: true,
          timer: 4000,
        }).then(r => {
          r.value == true ? window.open(`https://www.google.com/search?q=dove+buttare+${descr}`, '_blank') : null;
        });
      } else {
        window.open(`https://www.google.com/search?q=dove+buttare+${descr}`, '_blank')
      }
    }
  }
};
</script>
