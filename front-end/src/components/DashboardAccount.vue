<template>
<div>
  <div v-if="isMobile">
    <div class="p-4 sm:px-6 justify-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white">
      <h3 class="text-xl leading-6 font-medium text-gray-900">
        Account
      </h3>
    </div>
    <div class="flex flex-col items-center px-4 py-2 border-b border-gray-200">
        <div class="flex justify-center items-center">
            <div class="material-icons text-4xl">
            accessibility_new
            </div>
            <div class="font-medium text-2xl">{{ user.name }}</div>
        </div>
    </div>
    <div class="flex flex-col p-2">
        <div v-for="(field, index) in fields" :key="index">
            <div
                class="flex justify-between items-center"
                :class="{
                    'text-lg font-semibold p-2': field.isHeader,
                    'text-sm cursor-pointer border-b border-black p-1': !field.isHeader
                }"
                @click="!field.isHeader ? goToLink(field) : null"
                :disabled="field.isHeader || !field.isHeader ? field.code == $route.name : null"
            >
                <div class="flex">
                    <div v-if="!field.isHeader" class="material-icons mr-2">
                        <span v-if="field.googleCode !== undefined">{{ field.googleCode }}</span>
                        <div v-else>
                            <img
                                src="../assets/logor4gmin.png"
                                class="w-6 h-6 cursor-pointer"
                                alt="logo R4G"
                            />
                        </div>
                    </div>
                    <div>{{ field.label }}</div>
                </div>
                <div v-if="!field.isHeader">
                     <svg 
                        class="block xs:hidden transform -rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center py-4">
        <button 
            class="font-bold px-4 py-2 mx-5 rounded text-white bg-gray-800 hover:bg-gray-900 active:bg-gray-900 focus:ring-gray-900"
            @click="logout()"
        >
            <div class="flex items-center">
                <div class="mr-2">Esci</div>
                <div class="material-icons">logout</div>
            </div>
        </button>
    </div>
  </div>

  <div v-else             
    class="fixed text-red-400 font-bold text-2xl z-10"
    style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
  > 
    Non esiste la versione desktop di questo componente!
  </div>
</div>
</template>

<script>
export default {
    props: {
        isMobile: {
            type: Boolean,
            default: false,
        }
    },
    data() {
        return {
            user: {},
            fields: [
                {
                    label: 'Impostazioni account',
                    isHeader: true
                },
                {
                    label: 'Informazioni personali',
                    code: 'account',
                    isHeader: false,
                    googleCode: 'perm_identity'
                },
                {
                    label: 'Notifiche',
                    code: 'notifications',
                    isHeader: false,
                    googleCode: 'notifications'
                },
                {
                    label: 'Assistenza',
                    isHeader: true
                },
                {
                    label: 'Come funziona R4G',
                    code: 'r4g-project',
                    isHeader: false
                },
                {
                    label: 'Domande frequenti',
                    code: 'faqs',
                    isHeader: false,
                    googleCode: 'help_outline'
                },
                {
                    label: 'Area legale',
                    isHeader: true
                },
                {
                    label: 'Termini di servizio',
                    code: 'ToS',
                    isHeader: false,
                    googleCode: 'menu_book'
                },
                {
                    label: 'Impostazioni della privacy',
                    code: 'privacy-policy',
                    isHeader: false,
                    googleCode: 'lock'
                },
            ]
        }
    },
    mounted() {
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    },
    methods: {    
        goToLink(link) {
        if (link.code != this.$route.name) {
                this.$router.push({
                    name: link.code,
                });
            }
        },
        async logout(){
            await this.$axios.get("/r4g/logout");
            localStorage.removeItem("AccessEmail");
            localStorage.removeItem("Zone");
            this.$router.push({
                name: "login",
            });
        }
    },
}
</script>