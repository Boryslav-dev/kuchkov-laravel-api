<template>
    <div class="row container-fluid">
        <div class="col-3 col-md-3 col-lg-3 sidebar">
            <sidebar-card-component></sidebar-card-component>
        </div>
        <div class="col-9 col-md-9 col-lg-9 col-sm-12">
            <temperature-chart
                v-if="loaded"
                :chartdata="chartdata">
            </temperature-chart>
        </div>
    </div>
</template>

<script>
import TemperatureChart from "../Chart/TemperatureChart";
import SidebarCardComponent from "../Sidebar/SidebarCardComponent";
import {BASE_API_URL} from "../Constants/serverValues";
export default {
    name: "Temperature",
    components: {SidebarCardComponent, TemperatureChart},
    data() {
        return {
            loaded: false,
            chartdata: [],
        };
    },
    created() {
        this.fetchTemperature();
    },
    methods: {
        async fetchTemperature() {
            try {
                const response = await fetch(`${BASE_API_URL}/api/getSensorsValueForDay/temperature`);
                const temperatureApiResponseObject = await response.json();
                let params;
                for (params of temperatureApiResponseObject) {
                    this.chartdata.push(params.value);
                }
                this.loaded = true;
            } catch (e) {
                console.error("Fetching error");
            }
        },
        goBack() {
            window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/home')
        }
    }
}
</script>
