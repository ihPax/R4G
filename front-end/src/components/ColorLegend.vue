<template>
   <div class="flex flex-col overflow-auto">
    <div class="mb-2 font-medium">Clicca per sapere dove gettare un rifiuto</div>
    <button
      v-for="(item, index) in items"
      :key="index"
      class="flex flex-row my-1 rounded font-black text-white"
      :style="`background-color: ${item.color}`"
      @click="showDescription(item)"
    >
      <p class="w-full h-full p-3 font-medium">{{ item.name }}</p>
    </button>
  </div>
</template>

<script>
import materialDescriptions from "../materialDescriptions.json";
export default {
  props: {
    isMobile: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      items: materialDescriptions //tratti da: https://www.amiavr.it/Raccolta-differenziata/Ogni-cosa-al-suo-posto
    }
  },
  mounted() {},
  methods: {
    onClose() {
      this.$emit("exit", true);
    },
    showDescription(item) {
      localStorage.setItem("MaterialDescription", JSON.stringify(item));
      this.$router.push("material-description");
    },
  },
};
</script>
