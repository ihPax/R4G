<template lang="html">
  <div class="h-full w-full p-8">
    <div class="h-full flex flex-row">
      <div class="flex flex-col">
   <!--grendene-->
      </div>
      <div class="flex-grow flex-col">
        <div class="flex-row justify-end flex p-5" >
          Logout
        </div>

         <div class="flex-row flex" >
          <div class="flex-col flex-grow-2 border-2 border-white">
          <div class="p-5 flex flex-col">
            <div class="pb-8">
              Stato dei miei Cestini
            </div>
            <div class="flex flex-row flex-wrap">
              <div><img src="https://it.seaicons.com/wp-content/uploads/2015/08/Empty-Trash-icon.png"></div>
              <div><img src="https://it.seaicons.com/wp-content/uploads/2015/08/Empty-Trash-icon.png"></div>
              <div><img src="https://it.seaicons.com/wp-content/uploads/2015/08/Empty-Trash-icon.png"></div>
              <div><img src="https://it.seaicons.com/wp-content/uploads/2015/08/Empty-Trash-icon.png"></div>
            </div>
          </div>
          </div>
 
          <div class="flex-col flex-grow border-2 border-white">
           <div class="p-5">Raccolta differenziata a Verona</div>
          </div>

        </div>
      
      </div>
    </div>
  </div>
</template>

<script lang="js">

export default  {
  name: 'Home',
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
