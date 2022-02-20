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
            <button>
                <svg 
                    class="block xs:hidden transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                    @click="$router.go(-1)"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Condividi il tuo feedback
            </h3>
        </div>
        <div class="max-w-lg mx-auto">
            <div class="flex flex-col justify-center py-4 mx-2 max-w-screen-md" v-for="field in fields" :key="field.code">
                <input v-if="field.type == 'text' || field.type == 'password' || field.type == 'date'"
                  :type="field.type"
                  :placeholder="field.label"
                  :name="field.code"
                  :autocomplete="field.code"
                  v-model="newFeedback[field.code]"
                  class="border-2 px-2 rounded-lg w-full bg-white"
                  :class="{
                    'border-red-600': !isFormValid && !newFeedback[field.code],
                    'border-yellow-500': newFeedback[field.code]
                  }"
                />
                <select
                  v-if="field.type == 'select'"
                  class="border-2 px-2 rounded-lg w-full bg-white"
                  :class="{
                    'border-red-600': !isFormValid && !newFeedback[field.code],
                    'border-yellow-500': newFeedback[field.code]
                  }"
                  :placeholder="field.label"
                  :name="field.code"
                  :id="field.code"
                  v-model="newFeedback[field.code]"
                >
                  <option
                    v-for="option in field.options"
                    :key="option.id"
                    :value="option.name"
                  >
                    {{ option.name }}
                  </option>
                </select>
                <textarea v-if="field.type == 'textarea'"
                    v-model="newFeedback[field.code]"
                    :placeholder="field.label"
                    class="border-2 px-2 rounded-lg w-full bg-white"
                    :class="{
                        'border-red-600': !isFormValid && !newFeedback[field.code],
                        'border-yellow-500': newFeedback[field.code]
                    }"
                    :id="field.code"
                    cols="30"
                    rows="10"
                >
                </textarea>
            </div>
        </div>
        <div class="flex justify-center my-8">
            <t-button2 
                @click="saveFeedback()"
                :disabled="!isFormValid"
                :class="{ 'cursor-not-allowed': !isFormValid }"
            > Invia Feedback </t-button2>
        </div>
        <div v-if="!isFormValid" class="flex justify-center items-center text-center">
            <div class="border border-red-600 rounded px-2 py-1">* Campo obbligatorio</div>
        </div>
    </div> 
</template>

<script>
export default {
    data() {
        return {
            comuni: [],
            fields: [],
            newFeedback: {
                name: "",
                zone: "",
                userFeedback: ""
            }
        }
    },
    mounted() {
        this.comuni = JSON.parse(localStorage.getItem("Zones"));
        this.fields = [
            {        
                label: "Nome",
                code: "name",
                type: "text"
            },
            {        
                label: "Zona",
                code: "zone",
                type: "select",
                options: this.comuni,
            },
            {        
                label: "Dicci la tua",
                code: "userFeedback",
                type: "textarea"
            },
        ]
    },
    methods: {
        saveFeedback() {
            //mostro in console una proprietà per riga dell'oggetto che invierò al backend
            for (let property in this.newFeedback) {
                console.log(`${property}: ${this.newFeedback[property]}`);
            }
            // if(!this.isFormValid) {
            //     this.$fire({
            //         text: "Per favore compila tutti i campi!",
            //         type: "warning",
            //         timer: 3000,
            //     })
            // }
        }
    },
    computed: {
        isFormValid() {
            return (
                this.newFeedback.name != "" &&
                this.newFeedback.zone != "" &&
                this.newFeedback.userFeedback != ""
            );
        },
    },
}
</script>