<template>
    <div class="row container-fluid">
        <div class="col-3 col-md-3 col-lg-3 sidebar">
            <sidebar-card-component></sidebar-card-component>
        </div>
        <div class="col-9 col-md-9 col-lg-9 col-sm-12">
            <humidity-chart
                v-if="loaded"
                :chartdata="chartdata">
            </humidity-chart>
        </div>
    </div>
</template>

<script>
import HumidityChart from "../Chart/HumidityChart";
import SidebarCardComponent from "../Sidebar/SidebarCardComponent";
import {BASE_API_URL} from "../Constants/serverValues";
export default {
    name: "Humidity",
    components: {SidebarCardComponent, HumidityChart},
    data() {
        return {
            loaded: false,
            chartdata: [],
        };
    },
    created() {
        this.fetchHumidity();
    },
    methods: {
        async fetchHumidity() {
            try {
                const response = await fetch(`${BASE_API_URL}/api/getSensorsValueForDay/humidity`);
                const humidityApiResponseObject = await response.json();
                let params;
                for (params of humidityApiResponseObject) {
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

