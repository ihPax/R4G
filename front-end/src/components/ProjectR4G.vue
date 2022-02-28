<template>
    <div class="
      bg-white
      shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      max-w-xl
      mx-auto
      h-screen
      xs:h-full
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
        <div class="p-4">
            <!-- <div class="flex justify-center ">
                <img src="../assets/promor4g.gif" class="h-72 p-2 bg-gray-200 rounded">
            </div> -->
            <h1 class="font-bold text-lg mt-5">Che cos'è?</h1>
            <p>
                R4G ha lo scopo di incentivare la raccolta differenziata, 
                il cestino rileva la capienza mediante un sensore di prossimità 
                collegato ad una scheda Arduino ed è munito di un modulo WiFi per 
                trasmettere i dati all’app. La capienza potrà essere visualizzata 
                nell’applicazione e sarà possibile settare il calendario della raccolta 
                in base alla zona, in modo che tramite una notifica l’utente possa essere 
                avvisato sul tipo di rifiuto che verrà ritirato il giorno dopo e se la capienza supera l’80%. 
                Il tutto anche da remoto.
            </p>
            <h1 class="font-bold text-lg mt-5">Punti di forza</h1>
            <p>
                1.	Incentivare la raccolta differenziata tra i privati cittadini ed imprese;
            </p>
            <p>
                2.	Permette di settare e visualizzare il calendario della propria zona;
            </p>
            <p>
                3.	Mostra il livello di riempimento e avvisa quando supera 80%;
            </p>
            <p>
                4.	Notifica cosa passa il giorno dopo;
            </p>
            <p>
                5.	Permette di controllare il livello dei cestini da remoto.
            </p>
        </div>

        <!--VERSIONE DESKTOP-->
        <div v-if="!isMobile" class="py-5 block bg-yellow-100 font-medium cursor-pointer" @click="$router.go(-1)">
            <div class="flex flex-row justify-center">
                <div class="flex flex-col">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span>Torna indietro</span>
                </div>
            </div>
        </div>
        <ButtonToTop></ButtonToTop>
    </div> 
</template>

<script>
import ButtonToTop from "@/components/ButtonToTop.vue";
export default {
    components: {
        ButtonToTop,
    },
    props: {
        isMobile: {
            type: Boolean,
            default: true
        },
    },
}
</script>