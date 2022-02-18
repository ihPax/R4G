<template>
    <div class="h-full w-full font-montserrat rounded-tl-2xl shadow-xl">
        <div  class="border-black  flex justify-center px-2">
            <div class="flex flex-col max-w-screen-lg">
                <div class="mx-auto py-1 xs:py-3">
                    <div class="font-bold text-2xl"> Ciao! Come possiamo aiutarti? </div>
                </div>
                <div class="font-semibold mx-auto xs:my-4">
                    <div class="px-2"> Ricevi l’assistenza, gli strumenti e le informazioni di cui hai bisogno per la tua sicurezza. </div>
                </div>
                <div 
                    v-for="(faq, index) in faqs" :key="index" 
                    @click="showAnswer(faq, index)"
                > <!--  class="flex justify-between content-between flex-grow"  -->
                    <div class="xs:p-2 rounded-lg my-2" :class="index % 2 == 0 ? 'bg-white border border-gray-100' : 'bg-gray-50'">
                        <div class="flex cursor-pointer">
                            <div class="flex">
                                <div class="font-semibold">{{index + 1}}. &nbsp;</div>
                                <div>{{ faq.question }}</div>
                            </div>
                            <div class="ml-auto mr-2"  :class="{'transform -rotate-90': faq.show !== true}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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
                    <t-button2 class="mx-auto my-4">Condividi il tuo feedback</t-button2>
                    <!-- class="border-2 border-orangelogo p-2 rounded-lg bg-orangelogo text-white mt-10" -->
                </div>
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
                    question: "Come posso modificare il mio quartiere di residenza?",
                    answer: "Dalla sezione account > informazioni personali > modifica i tuoi dati",
                    show: false
                },
                {
                    id: 2,
                    question: "A che ora viene effettuato il servizio di raccolta?",
                    answer: "Dalle ore 9:00 del giorno stesso fino alla mattina seguente",
                    show: false
                },
                {
                    id: 3,
                    question: "Come posso cambiare la mia password?",
                    answer: "R",
                    show: false
                },
                {
                    id: 4,
                    question: "Come posso fare per collegare un nuovo cestino al mio account?",
                    answer: "R",
                    show: false
                },
                {
                    id: 5,
                    question: "Come recupero il mio account?",
                    answer: "R",
                    show: false
                },
                {
                    id: 6,
                    question: "Domanda 6",
                    answer: "R",
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
        showAnswer(faq, index) {
            console.log(faq, index);
            faq.show = !faq.show;
            // for (let i = 0; i < this.questions.length; i++) {
            //     if (this.questions[i].id == question.id) {
            //         this.questions[i].show = true;
            //     } else {
            //         this.questions[i].show = false;
            //     }
            // }
        }
    }
}
</script>
