<template>
    <div class="h-full w-full rounded-tl-2xl flex">
        <div  class="border-black flex justify-center flex-grow">
            <div class="flex flex-col max-w-screen-lg xs:shadow-orangexl">
                <div class="p-4 sm:px-6 text-2xl leading-6 font-medium text-gray-900 border-b border-gray-200 flex justify-center bg-blue-50 xs:bg-white">
                    <button>
                        <svg 
                        class="block xs:hidden transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                        @click="$router.go(-1)"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div> Ciao! Come possiamo aiutarti? </div>
                </div>
                <div class="p-2 xs:p-4 font-medium text-gray-900 border-b border-gray-200 flex justify-center">
                    <div> Ricevi l’assistenza, gli strumenti e le informazioni di cui hai bisogno per la tua sicurezza. </div>
                </div>
                <div 
                    v-for="(faq, index) in faqs" :key="index" 
                    @click="showAnswer(faq)"
                    class=""
                > <!--  class="flex justify-between content-between flex-grow"  -->
                    <div class="p-2 sm:p-4 cursor-pointer" :class="index % 2 == 0 ? 'bg-white' : 'bg-yellow-50'">
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
                    <t-button2 @click="goToLink()" class="mx-auto mt-8 xs:mb-4">Condividi il tuo feedback</t-button2>
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
        showAnswer(faqParam) {
            faqParam.show = !faqParam.show;
            if (faqParam.show == true) {
                this.faqs.forEach(faq => {
                    faq.show = faq.id == faqParam.id ? true : false;
                })
            }
            // for (let i = 0; i < this.faqs.length; i++) {
            //     if (this.faqs[i].id == faq.id) {
            //         this.faqs[i].show = true;
            //     } else {
            //         this.faqs[i].show = false;
            //     }
            // }
        },
        goToLink() {
            this.$router.push({
                name: "feedback",
            });
        }
    }
}
</script>
