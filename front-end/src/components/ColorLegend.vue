<template>
  <div class="flex flex-col overflow-auto">
    <div
      v-for="(item, index) in items"
      :key="index"
      class="flex flex-row my-1 rounded font-black text-white"
      :style="`background-color: ${item.color}`"
    >
      <p class="w-full h-full p-3 font-medium">{{ item.name }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          name: "CARTA",
          color: "#166534",
        },
        {
          name: "PLASTICA/LATTINE",
          color: "#1E3A8A",
        },
        {
          name: "UMIDO",
          color: "#854D0E",
        },
        {
          name: "SECCO",
          color: "#9CA3AF",
        }
      ],
    };
  },
  mounted() {},
  methods: {
    onClose() {
      this.$emit("exit", true);
    },
  },
};
</script>
