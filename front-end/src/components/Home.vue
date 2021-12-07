<template lang="html">
  <div class="h-screen w-full  flex flex-row border-l-2	border-t-2	border-black rounded-tl-2xl	">
  <div class="h-full flex-col flex flex-grow p-8">
  <span class="text-4xl	font-bold	"> ciao USER !</span>
  <div class="flex flex-row grid-cols-2 gap-8 grid ">
    <div class="flex flex-row  items-center  shadow-inner rounded-lg 	"> <div class="flex-col m-10"> collega il tuo cestino</div>  <div class="flex-col w-48 h-56 bg-black m-10	"> </div> </div>
        <div class="flex flex-row  items-center shadow-inner rounded-lg	"> <div class="flex-col m-10"> collega il tuo cestino</div>  <div class="flex-col w-48 h-56 bg-black m-10	"> </div> </div>

        <div class="flex flex-row  items-center  shadow-inner rounded-lg "> <div class="flex-col m-10"> collega il tuo cestino</div>  <div class="flex-col w-48 h-56 bg-black m-10	"> </div> </div>
       <div class="flex flex-row  items-center  shadow-inner rounded-lg	"> <div class="flex-col m-10"> collega il tuo cestino</div>  <div class="flex-col w-48 h-56 bg-black m-10	"> </div> </div>
  
  </div>
  
  </div>

    <div class="flex-col flex w-1/4 border-l-2		border-black">
    <div class="flex flex-row h-1/2">
    
    </div>
    

       <div>
            <Calendar></Calendar>
          </div> 

           <div class="flex flex-row h-1/2">
            
    
    </div>
  
  </div>
  
   
      

       

       
      
  
  </div>
</template>

<script>

import Calendar from "@/components/Calendar.vue";

export default  {
  name: 'Home',
  components: {
    Calendar
  },
  props: [],
  mounted () {

  },
  data () {
    return {
      navLinks: [
      {
        label: "",
        code: "",
      },
      {
        label: "",
        code: "",
      },
      {
        label: "",
        code: "",
      },
    ],
    }
  },
  methods: {

  },
  computed: {

  }
}
</script>

<style scoped lang="css"></style>
