<template>
  <div>
    <div class="bg-white text-xs">
      <div class="container mx-auto">
        <div class="grid grid-cols-3">
          <!-- <div class="flex">
            <img
              src="../assets/logor4gblack.png"
              class="w-auto h-8"
              alt="logo R4G"
            />
          </div> -->
          <a
            class="flex items-center xs:justify-center rounded italic p-2 hover:underline"
            href="mailto:r4g.recycleteam@gmail.com?subject=Informazioni%20su%20R4G"
          > 
            <div>Invia una email</div> 
          </a>
          <router-link to="/tos" class="flex items-center xs:justify-center rounded italic p-2 hover:underline">
            <div class="cursor-pointer"> Termini di Servizio </div>
          </router-link>
          <router-link to="/privacy-policy" class="flex items-center xs:justify-center rounded italic p-2 hover:underline">
            <div class="cursor-pointer"> Politica sulla privacy </div>
          </router-link>
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
