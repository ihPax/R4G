<template>
  <div>
    <LoginRegisterBar></LoginRegisterBar>
    <div
      class="fixed text-red-400 font-bold text-2xl z-10 flex flex-col"
      style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
    >
      <div class="my-4 animate-bounce">
        Non hai effettuato l'accesso!
      </div>
      <button
        class="
          px-4
          py-2
          rounded-md
          text-md
          font-medium
          border
          focus:outline-none focus:ring
          rounded-xl
          transition
          text-yellow-600
          border-yellow-600
          mx-8
          hover:text-white hover:bg-yellow-600
          active:bg-yellow-700
          focus:ring-yellow-300
        "
        @click="goToLogin()"
      >
        Accedi
      </button>
    </div>
  </div>
  
</template>

<script>
import LoginRegisterBar from '@/components/LoginRegisterBar.vue';

export default {
    name: "NotLogged",
    components: {
      LoginRegisterBar
    },
    methods: {
        goToLogin() {
          this.$router.push({
            name: "login"
          });
        }
    }
}
</script>