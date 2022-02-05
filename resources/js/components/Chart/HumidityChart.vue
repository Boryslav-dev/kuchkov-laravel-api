<template>
    <canvas class="w-100" height="" ref="canvas"></canvas>
</template>

<script>
import { Line } from 'vue-chartjs'

export default {
    name: "HumidityChart",
    extends: Line,
    props: {
        chartdata: {
            type: Object,
            default: null
        },
        options: {
            type: Object,
            default: null
        }
    },
    data() {
        return {
            dataParams: [],
        };
    },
    created() {
        for (let i=0; i <= 24; i++) {
            if (i < 10) {this.dataParams.push('0'+i+':00');}
            else {this.dataParams.push(i+':00');}
        }
    },
    mounted() {
        this.renderChart({
            labels: this.dataParams,
            datasets: [
                {
                    label: 'Humidity',
                    backgroundColor: 'rgba(19,12,92,0.7)',
                    data: this.chartdata,
                }
            ]
        }, {responsive: true, maintainAspectRatio: false})
    }
}
</script>
