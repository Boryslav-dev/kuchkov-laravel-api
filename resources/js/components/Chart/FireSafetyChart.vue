<template>
    <canvas class="w-100" height="" ref="canvas"></canvas>
</template>

<script>
import { Line } from 'vue-chartjs'

export default {
    name: "FireSafetyChart",
    extends: Line,
    data() {
        return {
            dataParams: [],
            valueFireParams: [],
            valueSmokeParams: [],
        };
    },
    created() {
        for (let i=0; i <= 24; i++) {
            if (i < 10) {this.dataParams.push('0'+i+':00');}
            else {this.dataParams.push(i+':00');}
        }
        for (let i=0; i <= 24; i++) {
            let j = i;
            this.valueFireParams.push(i^2*j^2*12-(j^j+i));
        }
        for (let i=0; i <= 24; i++) {
            let j = i;
            this.valueSmokeParams.push(i^2*j^2*4-(j^j+i));
        }
    },
    mounted () {
        this.renderChart({
            labels: this.dataParams,
            datasets: [
                {
                    label: 'Smoke',
                    data: this.valueSmokeParams,
                },
                {
                    label: 'Fire',
                    backgroundColor: 'rgba(255,0,0,0.7)',
                    data: this.valueFireParams,
                }
            ]
        }, {responsive: true, maintainAspectRatio: false})
    }
}
</script>

<style scoped>

</style>
