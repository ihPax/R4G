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
        <div class="p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white">
            <button class="block xs:hidden">
                <svg class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                    @click="$router.go(-1)"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Come funziona R4G
            </h3>
        </div>

        <!--CONTENUTO-->
        <div class="p-4">
            <h1 class="font-bold text-lg">Che cos'è?</h1>
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
    </div> 
</template>

<script>
export default {

}
</script>