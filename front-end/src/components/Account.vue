<template>
  <div
    class="
      bg-white
      shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      font-montserrat
      max-w-xl
      mx-auto
      h-screen
      xs:h-full
    "
  >
    <div class="px-4 py-2 sm:py-4 sm:px-6 justify-center text-center">
      <h3 class="text-xl leading-6 font-medium text-gray-900">
        Informazioni sul tuo Account
      </h3>
    </div>
    <div v-if="comuni != ''" class="border-t border-gray-200">
      <div
        v-for="(field, index) in fields" :key="index"
        class="px-4 py-1 sm:py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        :class="index % 2 == 0 ? 'bg-white' : 'bg-gray-50'"
      >
        <dt class="text-sm font-medium text-gray-500"> {{field.label}} </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-1 xs:py-2 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <span v-if="!isEdit" class="ml-2 flex-1 w-0 truncate mb-1"> {{field.type != "password" ? field.code : "********" }} </span>
              <div v-else class="w-full">
                <input v-if="field.type == 'text' || field.type == 'password' || field.type == 'date'"
                  :type="field.type"
                  
                  :placeholder="field.label"
                  :name="field.type"
                  :autocomplete="field.type"
                  v-model="field.code"
                  class="border-2 border-yellow-500 px-2 rounded-lg w-full bg-white"
                />
                <select
                  v-if="field.type == 'select'"
                  class="border-2 border-yellow-500 px-2 rounded-lg w-full bg-white"
                  :name="field.type"
                  :id="field.type"
                  v-model="field.code"
                >
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
      </div>
      <div class="bg-white px-4 py-5 sm:gap-4 sm:px-6">
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div
              class="w-0 flex-1 flex justify-center text-center items-center"
            >
              <t-button @click="switchEditMode(); saveForm()" type="submit">
                {{ isEdit ? "Salva" : "Modifica"}}
              </t-button>
            </div>
          </li>
        </dd>
      </div>
    </div>
    <div v-else class="my-4"><Loading></Loading> </div>
  </div>
</template>

<script>
import Loading from "@/components/Loading";
export default {
  name: "Account",
  components: {
    Loading
  },
  data() {
    return {
      users: {},
      zone: {},
      fields: [],
      isEdit: false,
      comuni: [],
      form: {
        name: "",
        surname: "",
        email: "",
        password: "",
        birthday: "",
        zone: ""
      }
    }
  },
  async mounted() {
    this.users = JSON.parse(localStorage.getItem("AccessEmail"));
    this.zone = JSON.parse(localStorage.getItem("Zone"));
    this.comuni = (await this.$axios.get("/r4g/zones")).data;
    console.log(this.comuni);
    this.fields = [
      {        
        label: "Nome",
        code: this.users.name,
        type: "text"
      },
      {
        label: "Cognome",
        code: this.users.surname,
        type: "text"
      },
      {
        label: "Email",
        code: this.users.email,
        type: "text"
      },
      {
        label: "Password",
        code: this.form.password,
        type: "password"
      },
      {
        label: "Data di nascita",
        code: this.users.birthday,
        type: "date",
      },
      {
        label: "Quartiere",
        code: this.zone.name,
        type: "select",
        options: this.comuni
      },
    ]
  },
  methods: {
    switchEditMode() {
      this.isEdit = !this.isEdit;
    },
    saveForm() {
      // this.form.name = this.fields[0].code;
      // this.form.surname = this.fields[1].code;
      // this.form.email = this.fields[2].code;
      // this.form.password = this.fields[3].code;
      // this.form.birthday = this.fields[4].code;
      // this.form.zone = this.fields[5].code;
      
      let form = this.form;
      let i = 0;
      for (let property in form) {
        form[property] = this.fields[i].code;
        i++;
        console.log(`${property}: ${form[property]}`);
      }
    }
  },
}
</script>