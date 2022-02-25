<template>
  <div>
    <div class="py-8 bg-white">
      <div class="flex justify-center">
        <img
          src="../assets/logor4gblack.png"
          class="w-auto"
          alt="logo R4G"
        />
      </div>
      <div class="container px-4 mx-auto">
        <div class="xs:flex flex-wrap lg:flex-nowrap justify-between items-center">
          <router-link to="/tos" class="flex justify-center my-2 p-2 hover:bg-yellow-100 rounded">
            <span class="cursor-pointer"> Termini di Servizio </span>
          </router-link>
          <router-link to="/privacy-policy" class="flex justify-center my-2 p-2 hover:bg-yellow-100 rounded">
            <span class="cursor-pointer"> Politica sulla privacy </span>
          </router-link>
          <a
            class="flex justify-center my-2 p-2 hover:bg-yellow-100 rounded"
            href="mailto:r4g.recycleteam@gmail.com?subject=Informazioni%20su%20R4G"
            > Invia una email </a
          >
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Footer",
};
</script>
