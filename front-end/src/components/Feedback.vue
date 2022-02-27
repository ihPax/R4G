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
                Condividi il tuo feedback
            </h3>
        </button>
        <div v-if="!isFeedbackSent" class="max-w-lg mx-auto">
            <div class="flex flex-col justify-center py-4 mx-2 max-w-screen-md" v-for="field in fields" :key="field.code">
                <input v-if="field.type == 'text' || field.type == 'password' || field.type == 'date'"
                  :type="field.type"
                  :placeholder="field.label"
                  :name="field.code"
                  :autocomplete="field.code"
                  v-model="newFeedback[field.code]"
                  class="border-2 px-2 rounded-lg w-full bg-white outline-none"
                  :class="{
                    'border-red-600': !isFormValid && !newFeedback[field.code],
                    'border-yellow-500': newFeedback[field.code]
                  }"
                />
                <select
                  v-if="field.type == 'select'"
                  class="border-2 px-2 rounded-lg w-full bg-white outline-none"
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
                    class="border-2 px-2 rounded-lg w-full bg-white outline-none"
                    :class="{
                        'border-red-600': !isFormValid && !newFeedback[field.code],
                        'border-yellow-500': newFeedback[field.code]
                    }"
                    :id="field.code"
                    cols="30"
                    rows="8"
                >
                </textarea>
            </div>
            <div class="flex justify-center my-8">
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
        <div v-else class="flex flex-col justify-end items-center pt-24">
            <div @click="goToLink()" class="flex justify-center items-center">
                <img
                    src="../assets/logor4gblack.png"
                    class="cursor-pointer"
                    alt="logo R4G"
                />
            </div>
            <div class="font-medium text-xl pt-4 px-2 text-center">Grazie per il tuo feedback!</div>
        </div>
    </div>  
</template>

<script>
// import{ init } from '@emailjs/browser';
// init("user_fLpGOT5sbHA3nWKUqwHXr");
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
            error: {}
        }
    },
    mounted() {
        this.comuni = JSON.parse(localStorage.getItem("Zones"));
        this.zone = JSON.parse(localStorage.getItem("Zone"));
        this.newFeedback.zone = this.zone.name;
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
            },
            {        
                label: "Tipologia",
                code: "type",
                type: "select",
                options: this.feedbackType,
                optionPlaceholder: "Seleziona il tipo di richiesta",
            },
            {        
                label: "Dicci la tua",
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
                        //console.log(`${property}: ${this.newFeedback[property]}`);
                    }
                }, error => {
                    console.log('FAILED...', error);
                    this.$fire({
                        text: "Si è verificato un errore. Controlla la connessione e riprova!",
                        type: "warning",
                        timer: 3000,
                        }).then(() => {
                        console.log(error);
                    }); 
                });
            } catch(error) {
                //console.log({error})
            }
        },
        goToLink() {
            this.$router.push({
                name: "dashboard-account",
            });
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