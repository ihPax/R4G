<template>
  <div
    class="
      bg-white
      xs:shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      max-w-xl
      mx-auto
      h-full
      flex flex-col
    "
  >
    <div v-if="isLoading"
      class="fixed text-red-400 font-bold text-2xl z-10"
      style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
    >
      <Loading></Loading>
    </div>
    <button @click="$router.go(-1)" :disabled="!isMobile" class="w-full p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white disabled:cursor-auto">
      <div class="block xs:hidden">
        <svg class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
        >
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </div>
      <h3 class="text-xl leading-6 font-medium text-gray-900">
        Informazioni sul tuo Account
      </h3>
    </button>
    <div v-if="comuni != ''">
      <form
        v-for="(field, index) in fields" :key="index"
        class="px-4 py-1 sm:py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 border-b border-yellow-100"
        :class="index % 2 == 0 ? 'bg-white' : 'bg-yellow-50'"
      >
        <dt class="text-sm font-medium text-gray-500"> {{field.label}} </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-1 xs:py-2 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <span v-if="!isEdit || field.type =='email' " class="ml-2 flex-1 w-0 truncate mb-1"> {{field.isPasswordHidden != undefined ? "********" : field.code }}</span>
              <div v-else class="w-full">
                <input v-if="field.type == 'text' || field.type == 'password' || field.type == 'date' || field.type == 'email'"
                  :type="field.type"
                  :placeholder="field.label"
                  :name="field.autocomplete"
                  :autocomplete="field.autocomplete"
                  v-model="field.code"
                  class="border-2 border-yellow-500 px-2 rounded-lg w-full bg-white"
                  :class="field.type == 'password' ? 'relative' : null"
                />
                <span v-if="field.isPasswordHidden == true" @click="toggleVisibility(field, 'text')" class="material-icons absolute -ml-8 cursor-pointer">
                  visibility_off
                </span>
                <span v-if="field.isPasswordHidden == false" @click="toggleVisibility(field, 'password')" class="material-icons absolute -ml-8 cursor-pointer">
                  visibility 
                </span>
                <select
                  v-if="field.type == 'select'"
                  class="border-2 border-yellow-500 px-2 rounded-lg w-full bg-white"
                  :name="field.autocomplete"
                  :id="field.type"
                  v-model="field.code"
                >
                  <option hidden disabled value="">{{field.optionPlaceholder}}</option>
                  <option
                    v-for="option in field.options"
                    :key="option.id"
                    :value="option.name"
                  >
                    {{ option.name }}
                  </option>
                </select>
              </div>
            </div>
          </li>
        </dd>
      </form>
      <div class="bg-white p-4 sm:gap-4 sm:px-6">
        <dd class="text-sm text-gray-900 sm:mt-0">
          <li class="py-2 flex items-center justify-center text-sm">
            <div
              class="w-0 flex-1 flex justify-center text-center items-center mt-4"
            >
              <t-button @click="$router.go(-1)" class="hidden xs:block mx-2">
                Annulla
              </t-button>
              <t-button2 @click="saveForm(); switchEditMode();" type="submit" :disabled="isLoading" class="xs:mx-2">
                {{ isEdit ? "Salva" : "Modifica" }}
              </t-button2>
            </div>
          </li>
        </dd>
      </div>
    </div>
  </div>
</template>

<script>
import Loading from "@/components/Loading";
export default {
  name: "Account",
  components: {
    Loading
  },
  props: {
    isMobile: {
      type: Boolean,
      default: true
    },
  },
  data() {
    return {
      user: {},
      zone: {},
      fields: [],
      isEdit: false,
      comuni: [],
      isLoading: false,
      form: {
        name: "",
        surname: "",
        email: "",
        password: "",
        birthday: "",
        zone_id: null,
      },
    }
  },
  mounted() {
    this.isLoading = true;
    this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    this.comuni = JSON.parse(localStorage.getItem("Zones"));
    let zone = JSON.parse(localStorage.getItem("Zone"));
    this.zone.name = zone ? zone.name : '';
    this.fields = [
      {
        label: "Nome",
        autocomplete: "name",
        code: this.user.name,
        type: "text",
      },
      {
        label: "Cognome",
        autocomplete: "surname",
        code: this.user.surname,
        type: "text",
      },
      {
        label: "Email",
        autocomplete: "email",
        code: this.user.email,
        type: "email",
      },
      {
        label: "Password",
        autocomplete: "password",
        code: this.form.password,
        type: "password",
        isPasswordHidden: true
      },
      {
        label: "Data di nascita",
        autocomplete: "birthday",
        code: this.user.birthday,
        type: "date",
      },
      {
        label: "Quartiere",
        autocomplete: "zone",
        code: this.zone.name,
        type: "select",
        options: this.comuni,
        optionPlaceholder: "Seleziona la tua zona"
      },
    ];
    this.isLoading = false;
  },
  methods: {
    /** The function, applied to a button, toggle password visibility from true to false and viceversa.
     * @param {object} field The Object passed to the function.
     * @param {string} newInputType The new input type (from 'password' to 'text' and viceversa).*/
    toggleVisibility(field, newInputType) {
      field.isPasswordHidden =! field.isPasswordHidden; 
      field.type = newInputType;
    },
    switchEditMode() {
      this.isEdit = !this.isEdit;
    },
    async saveForm() {
      if (this.isEdit == true) {
        this.isLoading = true;
        let i = 0;
        for (let property in this.form) {
          this.form[property] = this.fields[i].code;
          i++;
        }
        for (let i = 0; i < this.comuni.length; i++) {
          if (this.comuni[i].name == this.form.zone_id) {
            this.form.zone_id = this.comuni[i].id;
          }
        }
        if (this.form.password != "" && this.form.password.length < 6) {
          this.$fire({
            text: "La password dev'essere lunga almeno 6 caratteri!",
            type: "warning",
            timer: 3000,
            }) 
        } else {
          try {
            let response = await this.$axios.put(
              "/r4g/update-user/" + this.user.id,
              this.form
            )
            localStorage.setItem("AccessEmail", JSON.stringify(response.data));
            let zone_id = this.form.zone_id;
            if (zone_id) {
              let zone = ( await this.$axios.get("/r4g/zone-calendar/" + zone_id) ).data;
              let calendar = JSON.stringify(zone);
              localStorage.setItem("Zone", calendar);
            }
          } catch(e) {
            this.$emit('catch-error', e);
          }
        }
        this.isLoading = false;
        this.form.password = "";
      }
    },
  },
};
</script>