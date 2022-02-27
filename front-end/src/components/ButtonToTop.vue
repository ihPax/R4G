<template>
    <transition name="fade">
      <button id="pagetop" class="animate-bounce xs:animate-none z-50 fixed right-0 bottom-0 w-12 h-12 rounded-full bg-orangelogo opacity-80 hover:opacity-95 flex justify-center items-center mb-4 mr-4 shadow-md transition duration-300 ease-in-out" v-show="scY > 300" @click="toTop">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fff">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="#fff" d="M5 15l7-7 7 7" />
        </svg>
      </button>
    </transition>
</template>

<script>
export default {
  data() {
    return {
      scTimer: 0,
      scY: 0,
    };
  },
  created() {
    window.addEventListener("scroll", this.handleScroll);
  },
  destroyed() {
    window.removeEventListener("scroll", this.handleScroll);
  },
  methods: {
    handleScroll() {
      if (this.scTimer) return;
      this.scTimer = setTimeout(() => {
        this.scY = window.scrollY;
        clearTimeout(this.scTimer);
        this.scTimer = 0;
      }, 100);
    },
    toTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
  },
};
</script>
