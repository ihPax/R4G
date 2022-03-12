<template>
    <div class="h-full rounded-tl-2xl flex max-w-screen-md mx-auto">
        <div class="border-black flex justify-center flex-grow">
            <div class="flex flex-col xs:shadow-orangexl">
                <button @click="$router.go(-1)" :disabled="!isMobile" class="w-full p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white text-xl font-medium disabled:cursor-auto">
                    <div>
                        <svg 
                            class="block xs:hidden transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        >
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div> Ciao! Come possiamo aiutarti? </div>
                </button>
                <div class="p-2 xs:p-4 font-medium text-gray-900 border-b border-gray-200 flex justify-center">
                    <div> Ricevi assistenza, strumenti e informazioni di cui hai bisogno per la tua sicurezza. </div>
                </div>
                <div 
                    v-for="(faq, index) in faqs" :key="index" 
                    @click="showAnswer(faq)"
                    class=""
                >
                    <div class="p-2 sm:p-4 cursor-pointer border-b border-yellow-100" :class="index % 2 == 0 ? 'bg-white' : 'bg-yellow-50'">
                        <div class="flex items-center">
                            <div class="flex">
                                <div class="font-medium">{{index + 1}}.&nbsp;</div>
                                <div>{{ faq.question }}</div>
                            </div>
                            <div class="ml-auto">
                                <svg :class="{'transform -rotate-90': faq.show !== true}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-3" v-if="faq.show == true">
                            <span>{{ faq.answer }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <t-button2 @click="goToLink()" class="mx-auto mt-8 xs:mb-4">Contattaci</t-button2>
                </div>
                <div class="mb-24 xs:mb-4"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            faqs: [
                {
                    id: 1,
                    question: "Non riesco a collegare il cestino, come mai?",
                    answer: "Assicurati di aver associato correttamente la zona di residenza, altrimenti contattaci.",
                    show: false
                },
                {
                    id: 2,
                    question: "La mia zona di residenza non è presente in lista, come faccio?",
                    answer: "In lista ci sono tutte le zone in cui passa la raccolta porta a porta nel comune di Verona.",
                    show: false
                },
                {
                    id: 3,
                    question: "La capienza indicata non rispecchia il reale riempimento",
                    answer: "Elimina il cestino e riassocialo, se il problema persiste contattaci.",
                    show: false
                },
                {
                    id: 4,
                    question: "Non mi arrivano le notifiche, ma nella sezione account > notifiche vengono registrate, come mai?",
                    answer: "Assicurati che la mail sia corretta, altrimenti riseleziona la zona desiderata.",
                    show: false
                },
                {
                    id: 5,
                    question: "Il calendario segna la raccolta di un rifuto, ma non sono passati al ritiro?",
                    answer: "Assicurati di aver selezionato correttamente la zona, altrimenti ti suggeriamo di contattare l'ente incaricato alla raccolta.",
                    show: false
                },
                {
                    id: 6,
                    question: "Il dispositivo collegato al cestino non invia i dati. Cosa possa fare?",
                    answer: "Controlla che tutto sia collegato bene. In caso, prova a spegnerlo e riaccenderlo. Se il problema persiste, contattaci.",
                    show: false
                },
            ],
        }
    },
    props: {
        isMobile: {
            type: Boolean,
            default: false,
        }
    },
    methods: {
        showAnswer(faqParam) {
            faqParam.show = !faqParam.show;
            if (faqParam.show == true) {
                this.faqs.forEach(faq => {
                    faq.show = faq.id == faqParam.id ? true : false;
                })
            }
        },
        goToLink() {
            this.$router.push({
                name: "feedback",
            });
        }
    }
}
</script>
