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
    "
  >
    <div class="px-4 py-5 sm:px-6 justify-center text-center">
      <h3 class="text-xl leading-6 font-medium text-gray-900">
        Informazioni sul tuo Account
      </h3>
    </div>
    <div class="border-t border-gray-200">
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Nome</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <span class="ml-2 flex-1 w-0 truncate"> {{ users.name }} </span>
            </div>
          </li>
        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Cognome</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <span class="ml-2 flex-1 w-0 truncate">
                {{ users.surname }}
              </span>
            </div>
          </li>
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Email address</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <span class="ml-2 flex-1 w-0 truncate"> {{ users.email }} </span>
            </div>
            <div class="ml-4 flex-shrink-0"></div>
          </li>
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Password</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <span class="ml-2 flex-1 w-0 truncate"> ********* </span>
            </div>
          </li>
        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Data di nascità</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <span class="ml-2 flex-1 w-0 truncate">
                {{ users.birthday }}
              </span>
            </div>
          </li>
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Quartiere</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div class="w-0 flex-1 flex items-center">
              <span class="ml-2 flex-1 w-0 truncate"> {{ zone.name }} </span>
            </div>
          </li>
        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:gap-4 sm:px-6">
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
          <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
            <div
              class="w-0 flex-1 flex justify-center text-center items-center"
            >
              <button
              @click="goToEdit"
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
                  text-sm text-center
                  font-semibold
                "
              >
                Modifica
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
    };
  },
  async mounted() {
    this.users = JSON.parse(localStorage.getItem("AccessEmail"));
    this.zone = JSON.parse(localStorage.getItem("Zone"));
  },
    methods: {
    goToEdit() {
      this.$router.push({
        name: "editaccount",
      });
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