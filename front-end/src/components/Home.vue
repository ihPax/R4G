<template lang="html">

  <div class="h-full w-full p-8">
    <div class="h-full flex flex-row border-2 border-white">
      <div class="flex flex-col">
        <div class="flex flex-col h-full">
          <div class="h-16">
            LOGO
          </div>
          <div class="py-4">
            Dashboard
          </div>
          <div class="py-4">
            I miei cestini
          </div>
          <div class="py-4">
            Calendario
          </div>
          <div class="py-4">
            Chi siamo
          </div>
        </div>
        <div class="flex flex-col flex-end">
          <div class="py-4">
            Account
          </div>
          <div class="py-4">
            FAQ
          </div>
        </div>
      </div>
      <div class="flex-grow">
        Riga di destra
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

<style scoped lang="css">

</style>
