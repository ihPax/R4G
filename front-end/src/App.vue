<template>
  <div id="app" class="font-montserrat">
    <router-view :isMobile="isMobile"></router-view>
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
      let breakpointXS = 476;
      this.isMobile = currentWidth < breakpointXS ? true : false;
    },
  },
};
</script>
