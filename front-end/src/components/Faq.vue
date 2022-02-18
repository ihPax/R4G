<template>
    <div class="h-full w-full font-montserrat">
        <div v-if="!isMobile" class="h-full w-full flex flex-row xs:border-black border-white rounded-tl-2xl shadow-xl">
            <div class="flex flex-col items-center w-full">
                <div class="py-3">
                    <div class="font-bold text-2xl mt-10 mb-5">Ciao! Come possiamo aiutarti?</div>
                </div>
                <div>
                    <div>Ricevi l’assistenza, gli strumenti e le informazioni di cui hai bisogno per la tua sicurezza.</div>
                </div>
                <div v-for="question in questions" :key="question.id" class="w-192" @click="showAnswer(question)">
                    <div class="w-192 p-3 rounded-lg my-3 shadow-2xl">
                        <div class="flex cursor-pointer">
                            {{ question.label }}
                            <span class="ml-auto mr-2"  :class="{'transform -rotate-90': question.show !== true}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        <div class="mt-5" v-if="question.show == true">
                            <span>{{ question.answer }}</span>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="border-2 border-orangelogo p-2 rounded-lg bg-orangelogo text-white mt-10">Condividi il tuo feedback</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            questions: [
                {
                    id: 1,
                    label: "Come posso modificare il mio quartiere di residenza?",
                    answer: "Dalla sezione account > informazioni personali > modifica i tuoi dati",
                    show: false
                },
                {
                    id: 2,
                    label: "A che ora viene effettuato il servizio di raccolta?",
                    answer: "R",
                    show: false
                },
                {
                    id: 3,
                    label: "Come posso cambiare la mia password?",
                    answer: "R",
                    show: false
                },
                {
                    id: 4,
                    label: "Come posso fare per collegare un nuovo cestino al mio account?",
                    answer: "R",
                    show: false
                },
                {
                    id: 5,
                    label: "Come recupero il mio account?",
                    answer: "R",
                    show: false
                },
                {
                    id: 6,
                    label: "Domanda 6",
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
        showAnswer(question) {
            for (let i = 0; i < this.questions.length; i++) {
                if (this.questions[i].id == question.id) {
                    this.questions[i].show = true;
                } else {
                    this.questions[i].show = false;
                }
            }
        }
    }
}
</script>
