<template>
    <div class="mx-auto">
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
        this.spinnerColor = randomColor({
            luminosity: 'bright',
            format: 'rgb' 
        });
        console.log(`%c LOADING (SPINNER) `, `background: ${this.spinnerColor}; color: #fff; font-weight: bold`);
    }
}
</script>
