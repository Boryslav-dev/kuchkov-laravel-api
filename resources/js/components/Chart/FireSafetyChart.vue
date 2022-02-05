<template>
    <canvas class="w-100" height="" ref="canvas"></canvas>
</template>

<script>
import { Line } from 'vue-chartjs'

export default {
    name: "FireSafetyChart",
    extends: Line,
    props: {
        chartdataSmoke: {
            type: Object,
            default: null
        },
        chartdataFlame: {
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
                    label: 'Smoke',
                    data: this.chartdataSmoke,
                },
                {
                    label: 'Fire',
                    backgroundColor: 'rgba(255,0,0,0.7)',
                    data: this.chartdataFlame,
                }
            ]
        }, {responsive: true, maintainAspectRatio: false})
    }
}
</script>
