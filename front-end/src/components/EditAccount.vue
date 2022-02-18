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
    <div class="border-t border-gray-200">

      <div 
        v-for="(field, index) in fields" :key="index"
        class="px-4 py-1 sm:py-3 grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        :class="index % 2 == 0 ? 'bg-white' : 'bg-gray-50'"
      >
        <dt class="text-sm font-medium text-gray-500"> {{field.label}} </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-1 xs:py-2 flex items-center text-sm">
            <div class="w-0 flex-1 flex">
              <input
                :type="field.type"
                :onfocus="field.onfocus ? field.onfocusType : null"
                :placeholder="field.label"
                :name="field.type"
                :autocomplete="field.type"
                v-model="field.code"
                class="border-2 border-yellow-500 px-2 rounded-lg w-full"
              />
            </div>
          </li>
        </dd>
      </div> 
      <!-- <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Nome</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <input
                type="text"
                placeholder="Name"
                name="name"
                autocomplete="name"
                v-model="users.name"
                class="border-2 border-yellow-500 px-2 rounded-lg w-1/2"
              />
            </div>
          </li>
        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Cognome</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <input
                type="text"
                placeholder="Cognome"
                name="Cognome"
                autocomplete="Cognome"
                v-model="users.surname"
                class="border-2 border-yellow-500 px-2 rounded-lg w-1/2"
              />
            </div>
          </li>
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Email address</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <input
              type="text"
              placeholder="Email"
              name="email"
              autocomplete="email"
              v-model="users.email"
              class="border-2 border-yellow-500 px-2 rounded-lg w-1/2"
            />
            <div class="ml-4 flex-shrink-0"></div>
          </li>
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Password</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <input
              type="password"
              placeholder="Password"
              name="password"
              autocomplete="password"
              v-model="users.password"
              class="border-2 border-yellow-500 px-2 rounded-lg w-1/2"
            />
          </li>
        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Data di nascità</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <input
                type="text"
                onfocus="(this.type='date')"
                placeholder="Birthday"
                name="Birthday"
                autocomplete="Birthday"
                v-model="users.birthday"
                class="border-2 border-yellow-500 px-2 rounded-lg w-1/2"
              />
            </div>
          </li>
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Quartiere</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
            <input
              type="text"
              placeholder="Zone"
              name="zone"
              autocomplete="Zone"
              v-model="zone.name"
              class="border-2 border-yellow-500 px-2 rounded-lg w-1/2"
            />
            </div>
          </li>
        </dd>
      </div> -->
      <div class="bg-white px-4 py-5 sm:gap-4 sm:px-6">
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
          <li class="pl-3 pr-4 py-2 sm:py-3 flex items-center justify-between text-sm">
            <div
              class="w-0 flex-1 flex justify-center text-center items-center"
            >
              <button
                @click="goToAccount()"
                class="
                  button button--moema
                  px-5
                  py-2
                  hover:bg-yellow-600 hover:text-white
                  text-yellow-600
                  border-yellow-500
                  cursor-pointer
                  border-2 border-solid
                  rounded-lg
                  mr-10
                  text-sm text-center
                  font-semibold
                "
              >
                Indietro
              </button>
              <button
                type="button"
                class="
                  button button--moema
                  px-5
                  ml-10
                  py-2
                  hover:bg-yellow-600 hover:text-white
                  text-yellow-600
                  border-yellow-500
                  cursor-pointer
                  border-2 border-solid
                  rounded-lg
                  text-sm text-center
                  font-semibold
                "
              >
                Salva
              </button>
            </div>
          </li>
        </dd>
      </div>
    </div>
  </div>
</template>
 <!-- <div
    v-if="!isMobile"
    class="h-full w-full flex flex-row border-l-2 border-t-2 xs:border-black border-white rounded-tl-2xl"
  >
  -->
<script>
export default {
  name: "Account",
  data() {
    return {
      users: {},
      zone: {},
      fields: []
    };
  },
  async mounted() {
    this.users = JSON.parse(localStorage.getItem("AccessEmail"));
    this.zone = JSON.parse(localStorage.getItem("Zone"));
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
          code: this.users.password,
          type: "password"
        },
        {
          label: "Data di nascita",
          code: this.users.birthday,
          type: "text",
          onfocus: true,
          onfocusType: "(this.type='date')"
        },
        {
          label: "Quartiere",
          code: this.zone.name
        },
    ]
  },
  methods: {
    goToAccount() {
      this.$router.push({
        name: "account",
      });
    },
  },
};
</script>