<template>
    <canvas class="w-100" height="" ref="canvas"></canvas>
</template>

<script>
import { Line } from 'vue-chartjs'

export default {
    name: "TemperatureChart",
    extends: Line,
    data() {
        return {
            dataParams: [],
            valueTemperatureParams: [],
        };
    },
    created() {
        for (let i=0; i <= 24; i++) {
            if (i < 10) {this.dataParams.push('0'+i+':00');}
            else {this.dataParams.push(i+':00');}
        }
        for (let i=0; i <= 24; i++) {
            let j = i;
            this.valueTemperatureParams.push(i^2*j^2*12-(j^j+i));
        }
    },
    mounted () {
        this.renderChart({
            labels: this.dataParams,
            datasets: [
                {
                    label: 'Temperature',
                    backgroundColor: 'rgba(178, 34, 34, 0.7)',
                    data: this.valueTemperatureParams,
                }
            ]
        }, {responsive: true, maintainAspectRatio: false})
    }
}
</script>
