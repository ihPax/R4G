<template>
    <div class="
      bg-white
      xs:shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      max-w-xl
      mx-auto
      h-full
      flex flex-col
    ">
        <button @click="$router.go(-1)" :disabled="!isMobile" :class="{'cursor-auto': !isMobile}" class="w-full p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white">
            <div class="block xs:hidden">
                <svg class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Come funziona R4G
            </h3>
        </button>

        <!--CONTENUTO-->
        <div class="px-4">
            <div class="py-4">
                <h1 class="font-medium text-lg">Che cos'è?</h1>
                <p>
                    R4G ha lo scopo di incentivare i cittadini a fare la raccolta differenziata. 
                    Il cestino rileva la capienza mediante un sensore di prossimità 
                    collegato ad una scheda Arduino che ha un modulo WiFi per 
                    trasmettere i dati all’app. La capienza può essere visualizzata 
                    nell’applicazione ed è possibile settare il calendario della raccolta 
                    in base alla zona, così l’utente tramite una notifica viene 
                    avvisato sul tipo di rifiuto che viene ritirato il giorno dopo e se la capienza supera l’80%. 
                    Il tutto anche da remoto.
                </p>
            </div>
            <div>
                <h1 class="font-medium text-lg">Punti di forza</h1>
                <p v-for="(point, index) in points" :key="index">
                    <span class="font-medium">{{index+1}}.</span> {{point}}<span v-if="index < points.length-1">;</span><span v-else>.</span>
                </p>
            </div>
            <div class="mb-24 xs:mb-4"></div>
        </div>
        <GoBack :isMobile="isMobile"></GoBack>
    </div> 
</template>

<script>
import GoBack from "@/components/GoBack";
export default {
    components: {
        GoBack
    },
    props: {
        isMobile: {
            type: Boolean,
            default: true
        },
    },
    data() {
        return {
            points: [
                "Incentiva la raccolta differenziata tra i privati cittadini ed imprese",
                "Permette di settare e visualizzare il calendario della propria zona",
                "Mostra il livello di riempimento e avvisa quando supera 80%",
                "Notifica cosa passa il giorno dopo",
                "Permette di controllare il livello dei cestini da remoto"
            ]
        }
    }
}
</script>