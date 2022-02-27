<template>
    <div class="flex-grow flex">
        <div class="flex flex-col justify-end w-full">
            <div v-if="!isMobile" class="py-5 block bg-yellow-100 font-medium cursor-pointer" @click="$router.go(-1)">
                <div class="flex flex-row justify-center">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span>Torna indietro</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        isMobile: {
            type: Boolean,
            default: true
        },
    },
}
</script>