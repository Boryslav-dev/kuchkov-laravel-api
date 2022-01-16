<template>
    <div class="row container-fluid">
        <div class="col-3 col-md-3 col-lg-3 sidebar">
            <sidebar-card-component></sidebar-card-component>
        </div>
        <div class="col-9 col-md-9 col-lg-9 col-sm-12">
            <fire-safety-chart
                v-if="loadedFlame && loadedSmoke"
                :chartdataSmoke="chartdataSmoke"
                :chartdataFlame="chartdataFlame">
            </fire-safety-chart>
        </div>
    </div>
</template>

<script>
import SidebarCardComponent from "../Sidebar/SidebarCardComponent";
import FireSafetyChart from "../Chart/FireSafetyChart";
import {BASE_API_URL} from "../Constants/serverValues";
export default {
    name: "FireSafety",
    components: {FireSafetyChart, SidebarCardComponent},
    data() {
        return {
            loadedFlame: false,
            loadedSmoke: false,
            chartdataSmoke: [],
            chartdataFlame: [],
        };
    },
    created() {
        this.fetchSmoke();
        this.fetchFlame();
    },
    methods: {
        async fetchSmoke() {
            try {
                const response = await fetch(`${BASE_API_URL}/api/getSensorsValueForDay/smoke`);
                const smokeApiResponseObject = await response.json();
                let params;
                for (params of smokeApiResponseObject) {
                    this.chartdataSmoke.push(params.value);
                }
                this.loadedSmoke = true;
            } catch (e) {
                console.error("Fetching error");
            }
        },
        async fetchFlame() {
            try {
                const response = await fetch(`${BASE_API_URL}/api/getSensorsValueForDay/flame`);
                const smokeApiResponseObject = await response.json();
                let params;
                for (params of smokeApiResponseObject) {
                    this.chartdataFlame.push(params.value);
                }
                this.loadedFlame = true;
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
