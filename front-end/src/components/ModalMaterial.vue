<template>
 <div class="flex flex-col h-64 overflow-auto">
    <div
      v-for="(materiale,index) in materiali"
      :key="index"
      class="flex flex-row cursor-pointer hover:bg-gray-200 p-3 rounded"
    >
      <p class="" @click="chooseMaterial(materiale)">{{ materiale.name }}</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import materiali from "../../materiali.json"
export default {
data(){
    return {
        materiali:materiali,
        user:[],
        bin:[]
    }
},
mounted() {
    console.log(materiali)
},
methods:{
   async chooseMaterial(materiale){
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));
        let  id = this.user.id;
        let response = await axios.post("http://localhost:8000/r4g/new-bin/"+id,{name:materiale.name});

        //let res = await axios.get("http://localhost:8000/r4g/material-bin/"+id)
        this.bin = response.data;
        console.log(this.bin)

        // let localBin = JSON.stringify(this.bin);
        //localStorage.setItem("Bin", localBin);
        // localStorage.setItem("Materiale", materiale.name);
        this.$emit("exit", true);
    }
}
}
</script>