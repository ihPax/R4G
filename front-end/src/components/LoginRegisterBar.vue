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
      <div
        class="flex flex-grow justify-end items-center" 
      >
        <div class="flex" v-for="link in links" :key="link.code">        
          <button
            @click="goToLink(link)"
            :disabled="link.code == $route.name"
            class="
              button button--moema
              px-3
              py-2
              relative
              mr-8
              focus:outline-none
              border-2 border-solid border-yellow-500
              rounded-lg
              text-sm text-center
              font-semibold
              tracking-widest
            "
            :class="link.classes"
          >
            {{link.label}}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LoginRegisterBar",
  data() {
    return {
      links: [
        {
          code: "registration",
          label: "Registrati",
          classes: "text-yellow-600 hover:text-white hover:bg-yellow-600"
        },
        {
          code: "login",
          label: "Accedi",
          classes: "text-white bg-yellow-600"
        }
      ]
    }
  },
  methods: {    
    goToLink(link) {
      if (link.code != this.$route.name) {
        this.$router.push({
          name: link.code,
        });
      }
    },
  },
};
</script>
<style>
/* Moema */
.button--moema {
  -webkit-transition: background-color 0.3s, color 0.3s;
  transition: background-color 0.3s, color 0.3s;
}

.button--moema::before {
  content: "";
  position: absolute;
  top: -20px;
  left: -20px;
  bottom: -20px;
  right: -20px;
  background: inherit;
  border-radius: 50px;
  z-index: -1;
  opacity: 0.4;
  -webkit-transform: scale3d(0.8, 0.5, 1);
  transform: scale3d(0.8, 0.5, 1);
}

.button--moema:hover {
  -webkit-transition: background-color 0.1s 0.3s, color 0.1s 0.3s;
  transition: background-color 0.1s 0.3s, color 0.1s 0.3s;
  -webkit-animation: anim-moema-1 0.3s forwards;
  animation: anim-moema-1 0.3s forwards;
}

.button--moema:hover::before {
  -webkit-animation: anim-moema-2 0.3s 0.3s forwards;
  animation: anim-moema-2 0.3s 0.3s forwards;
}
@-webkit-keyframes anim-moema-1 {
  60% {
    -webkit-transform: scale3d(0.8, 0.8, 1);
    transform: scale3d(0.8, 0.8, 1);
  }
  85% {
    -webkit-transform: scale3d(1.1, 1.1, 1);
    transform: scale3d(1.1, 1.1, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes anim-moema-1 {
  60% {
    -webkit-transform: scale3d(0.8, 0.8, 1);
    transform: scale3d(0.8, 0.8, 1);
  }
  85% {
    -webkit-transform: scale3d(1.1, 1.1, 1);
    transform: scale3d(1.1, 1.1, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@-webkit-keyframes anim-moema-2 {
  to {
    opacity: 0;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes anim-moema-2 {
  to {
    opacity: 0;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
</style>