<template>
    <div class="h-full w-full font-montserrat">
        <div v-if="!isMobile" class="h-full w-full flex flex-row border-l-2 border-t-2 xs:border-black border-white rounded-tl-2xl">
            <div class="flex flex-col items-center justify-center w-full">
                <div class="py-3">
                    <div class="font-bold text-2xl">Ciao! Come possiamo aiutarti?</div>
                </div>
                <div>
                    <div>Ricevi l’assistenza, gli strumenti e le informazioni di cui hai bisogno per la tua sicurezza.</div>
                </div>
                <div v-for="question in questions" :key="question.id" class="w-192" @click="question.show = !question.show">
                    <div class="w-192 p-2 rounded-lg my-3 shadow-2xl">
                        <div class="flex">
                            {{ question.label }}
                            <span class="ml-auto mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        <div class="mt-2" v-if="question.show">
                            <span>{{question.answer}}</span>
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
            show: false,
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
                    show: false
                },
                {
                    id: 3,
                    label: "Come posso cambiare la mia password?",
                    show: false
                },
                {
                    id: 4,
                    label: "Come posso fare per collegare un nuovo cestino al mio account?"
                },
                {
                    id: 5,
                    label: "Come recupero il mio account?"
                },
                {
                    id: 6,
                    label: "Domanda 6"
                },
            ],
        }
    },
    props: {
    isMobile: {
      type: Boolean,
      default: false,
    },
    methods: {
        show(question) {
            for (let i = 0; i <= )
        }
    }
  },
}
</script>
