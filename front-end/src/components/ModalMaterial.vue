<template>
 <div class="flex flex-col h-64 overflow-auto">
    <div
      v-for="(materiale,index) in materiali"
      :key="index"
      class="flex flex-row cursor-pointer hover:bg-gray-200 p-3 rounded"
    >
      <p class="" @click="saveZone(comune)">{{ materiale.name }}</p>
    </div>
  </div>
</template>

<script>
import materiali from "../../materiali.json"
export default {
data(){
    return {
        materiali:materiali
    }
},
mounted() {
    console.log(materiali)
},
}
</script>