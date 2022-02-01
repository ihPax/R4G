<template>
  <div>
    <div class="flex flex-row">
      <div class="flex flex-col">
        <router-link to="/landing">
          <img
            src="../assets/logor4gblack.png"
            class="w-3/4 cursor-pointer"
            alt="logo R4G"
          />
        </router-link>
      </div>
      <div class="flex-col flex flex-grow justify-center items-end align-center">
        <div class="flex-row flex">
          <button
            @click="goToRegistration()"
            class="px-4 py-2 rounded-md text-sm font-medium border focus:outline-none focus:ring rounded-xl transition text-yellow-600 border-yellow-600 mx-8 hover:text-white hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300"
            :disabled="$route.name=='registration'"
          >
            Registrati
          </button>
          <button
            @click="goToLogin()"
            class="px-4 py-2 rounded-md text-sm font-medium border focus:outline-none focus:ring rounded-xl transition text-yellow-600 border-yellow-600 mx-8 hover:text-white hover:bg-yellow-600 active:bg-yellow-700 focus:ring-yellow-300"
            :disabled="$route.name=='login'"
          >
            Accedi
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginRegisterBar",
  methods: {
    goToLogin() {
      this.$router.push({
        name: "login",
      });
    },
    goToRegistration() {
      this.$router.push({
        name: "registration",
      });
    },
  },
};
</script>
