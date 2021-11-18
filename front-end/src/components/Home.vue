<template>

  <div>
    <v-calendar></v-calendar>
  </div>

</template>

<script>
  import Calendar from "@/components/Calendar.vue";

  export default  {
    name: 'Home',
    component: {
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

<style scoped lang="css">

</style>
