<template>
    <div class="mx-auto">
        <!-- <img class="w-full h-full" src="../assets/r4gif.gif" alt="animazione caricamento"> -->
        <flower-spinner
            :animation-duration="2500"
            :size="100"
            :color="spinnerColor"
        />
    </div>
</template>

<script>
import { FlowerSpinner } from 'epic-spinners';
export default {
    components: {
        FlowerSpinner
    },
    data() {
        return {
            spinnerColor: ""
        }
    },
    mounted() {
        let randomColor = require('randomcolor'); // importa lo script
        let color = randomColor({
            luminosity: 'bright',
            format: 'rgb' 
        });
        this.spinnerColor = color;
        console.log(`%c COLORE SPINNER `, `background: ${this.spinnerColor}; color: #fff; font-weight: bold`);
    }
}
</script>
