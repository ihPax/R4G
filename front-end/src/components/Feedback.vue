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
        <button @click="$router.go(-1)" :disabled="!isMobile" class="w-full p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white disabled:cursor-auto">
            <div class="block xs:hidden">
                <svg class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Condividi il tuo feedback
            </h3>
        </button>
        <div v-if="!isFeedbackSent" class="max-w-lg mx-auto space-y-4 mt-4 sm:space-y-6 sm:mt-6">
            <div class="flex flex-col justify-center items-center mx-2 max-w-screen-md" v-for="field in fields" :key="field.code">
                <input v-if="field.type == 'text' || field.type == 'password' || field.type == 'date'"
                  :type="field.type"
                  :placeholder="field.label"
                  :name="field.code"
                  :autocomplete="field.code"
                  v-model="newFeedback[field.code]"
                  class="border-2 px-2 py-1 rounded-lg w-full bg-white outline-none"
                  :class="{
                    'border-red-600': !isFormValid && !newFeedback[field.code],
                    'border-yellow-500': newFeedback[field.code]
                  }"
                />
                <select
                  v-if="field.type == 'select'"
                  class="border-2 px-2 py-1 rounded-lg w-full bg-white outline-none"
                  :class="{
                    'border-red-600': !isFormValid && !newFeedback[field.code],
                    'border-yellow-500': newFeedback[field.code]
                  }"
                  :placeholder="field.label"
                  :name="field.code"
                  :id="field.code"
                  v-model="newFeedback[field.code]"
                >
                  <option hidden disabled value="">{{field.optionPlaceholder}}</option>
                  <option
                    v-for="(option, index) in field.options"
                    :key="index"
                    :value="option.name"
                  >
                    {{ option.name }}
                  </option>
                </select>
                <textarea v-if="field.type == 'textarea'"
                    v-model="newFeedback[field.code]"
                    :placeholder="field.label"
                    class="border-2 px-2 py-1 rounded-lg w-full bg-white outline-none"
                    :class="{
                        'border-red-600': !isFormValid && !newFeedback[field.code],
                        'border-yellow-500': newFeedback[field.code]
                    }"
                    :id="field.code"
                    cols="30"
                    :rows="isMobile? '8' : '10'"
                    :keydown="liveCountDown(newFeedback[field.code])"
                    :maxlength="textAreaFeedback.maxCharacters"
                >
                </textarea>
                <div v-if="field.type == 'textarea'" 
                    class="text-xxs px-2 py-1" 
                    :class="textAreaFeedback.maxCharacters == textAreaFeedback.messageLength ? 'text-red-400 font-medium' : 'text-gray-500'"
                >
                    Caratteri rimasti: {{textAreaFeedback.maxCharacters - textAreaFeedback.messageLength}}
                </div>
            </div>
            <div class="flex justify-center pb-4">
                <t-button2
                    @click="sendEmail()"
                    :disabled="!isFormValid"
                > 
                    Invia Feedback 
                </t-button2>
            </div>
            <div v-if="!isFormValid" class="flex justify-center items-center text-center xs:pb-4">
                <div class="border border-red-600 rounded px-2 py-1">* Campo obbligatorio</div>
            </div>
        </div>
        <div v-else class="flex flex-col justify-end items-center mt-24">
            <div @click="goToLink()" class="flex justify-center items-center cursor-pointer mb-8">
                <img
                    src="../assets/Logo_R4G_Black.svg"
                    class="h-16"
                    alt="logo R4G"
                />
            </div>
            <div class="font-medium text-xl pt-4 px-2 text-center">Grazie per il tuo feedback!</div>
        </div>
    </div>  
</template>

<script>
import emailjs from 'emailjs-com';
export default {
    name: 'Feedback',
    props: {
        isMobile: {
            type: Boolean,
            default: true
        },
    },
    data() {
        return {
            feedbackType: [
                {
                    id: 0,
                    name: "Assistenza"
                },
                {
                    id: 1,
                    name: "Feedback"
                },
                {
                    id: 2,
                    name: "Informazioni generali"
                },
                {
                    id: 3,
                    name: "Altro"
                }
            ],
            newFeedback: {
                to_name: "",
                zone: "",
                message: "",
                email:"",
                type:""
            },
            comuni: [],
            fields: [],
            isFeedbackSent: false,
            error: {},
            textAreaFeedback: {
                messageLength: 0,
                maxCharacters: 500,
                isFirstAlert: true
            }
        }
    },
    mounted() {
        this.comuni = JSON.parse(localStorage.getItem("Zones"));
        let zone = JSON.parse(localStorage.getItem("Zone"));
        zone ? this.newFeedback.zone = zone.name : null;
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));
        this.newFeedback.to_name = this.user.name;
        this.fields = [
            {        
                label: "Nome",
                code: "to_name",
                type: "text"
            },
            {        
                label: "Zona",
                code: "zone",
                type: "select",
                options: this.comuni,
                optionPlaceholder: "Seleziona la tua zona"
            },
            {        
                label: "Tipologia",
                code: "type",
                type: "select",
                options: this.feedbackType,
                optionPlaceholder: "Seleziona il tipo di richiesta",
            },
            {        
                label: "Spiega il tuo problema o facci conoscere la tua opinione!",
                code: "message",
                type: "textarea"
            },   
        ]
    },
    methods: {
        sendEmail() {
            try {
                this.newFeedback.email = this.user.email;
                emailjs.send('service_ycoky5a', 'template_rdp3vls', this.newFeedback, 'user_fLpGOT5sbHA3nWKUqwHXr')
                .then(response => {
                    console.log('SUCCESS!', response.status, response.text);
                    this.isFeedbackSent = true;
                    //Reset form fields
                    for (let property in this.newFeedback) {
                        this.newFeedback[property] = "";
                    }
                }, error => {
                    this.$fire({
                        text: "Si è verificato un errore. Controlla la connessione e riprova!",
                        type: "warning",
                        timer: 3000,
                        }).then(() => {
                        console.log("Error",error);
                    }); 
                });
            } catch(error) {
                console.log({error})
            }
        },
        goToLink() {
            this.$router.push({
                name: "dashboard-account",
            });
        },
        liveCountDown(text) {
            this.textAreaFeedback.messageLength = text.length;
            if (
                this.textAreaFeedback.messageLength == this.textAreaFeedback.maxCharacters &&
                this.textAreaFeedback.isFirstAlert == true         
            ) {
                this.$fire({
                text: "Hai raggiunto il limite massimo di caratteri!",
                type: "warning",
                timer: 5000,
                }).then(() => {
                    this.textAreaFeedback.isFirstAlert = false;
                });
            }
        }
    },
    computed: {
        isFormValid() {
            return (
                this.newFeedback.to_name != "" &&
                this.newFeedback.zone != "" &&
                this.newFeedback.message != "" &&
                this.newFeedback.type != ""
            );
        },
    },
}
</script>