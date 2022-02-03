<template>
  <div id="app">
    <router-view :isMobile = "isMobile"></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  created() {
    window.addEventListener("resize", this.currentWidth);
  },
  destroyed() {
    window.removeEventListener("resize", this.currentWidth);
  },
  data() {
    return {
      isMobile: false
    }
  },
  mounted() {
    this.currentWidth();
  },
  methods: {
    currentWidth() {
      let currentWidth = window.innerWidth;
      let breakpointXS = 475;
      this.isMobile = currentWidth < breakpointXS ? true : false;
    },
  },
};
</script>
