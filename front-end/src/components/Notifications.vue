<template>
    <div class="
      bg-white
      xs:shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      max-w-xl
      mx-auto
      h-full
      flex flex-col
    ">
        <button @click="$router.go(-1)" :disabled="!isMobile" :class="{'cursor-auto': !isMobile}" class="w-full p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white">
            <div class="block xs:hidden">
                <svg class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Notifiche
            </h3>
        </button> 
        <div class="px-4">
            <div class="py-4">
                <div v-if="withdrawalDate">
                    <p>Il prossimo ritiro di <span class="font-medium">{{binName}}</span> è il giorno <span class="font-medium capitalize">{{withdrawalDate}}</span>.</p>
                </div>
                <div v-else>Non è collegato alcun cestino oppure non è in programma alcun ritiro.</div>
            </div>
        </div>
        <GoBack :isMobile="isMobile"></GoBack>
    </div> 
</template>

<script>
import GoBack from "@/components/GoBack";
export default {
    components: {
        GoBack
    },
    props: {
        isMobile: {
            type: Boolean,
            default: true
        },
    },
    data() {
        return {
            withdrawalDate: "",
            binName: ""
        }
    },
    mounted() {
        this.withdrawalDate = localStorage.getItem("WithdrawalDate");
        let userBin = JSON.parse(localStorage.getItem("BinUser")) || "";
        userBin != "" ? this.binName = userBin[0].name : null;
    }
}
</script>