<template>
    <div class="row container-fluid">
        <div class="col-3 col-md-3 col-lg-3 sidebar">
            <sidebar-component
                :weatherApiResponseObject="weatherApiResponseObject">
            </sidebar-component>
        </div>
        <div class="col-9 col-md-9 col-lg-9 col-sm-12">
            <monitor-component
                :temperatureOutdoorValue="temperatureOutdoorValue"
                :humidityOutdoorValue="humidityOutdoorValue">
            </monitor-component>
        </div>
    </div>
</template>

<script>
import SidebarComponent from "./Sidebar/SidebarComponent";
import MonitorComponent from "./MonitorComponent";
import {BASE_API_URL} from "./Constants/serverValues";

export default {
    name: "MainComponent",
    components: {MonitorComponent, SidebarComponent},
    props: {
        weatherApiResponseObject: Object,
    },
    created() {
        this.fetchWeather();
    },
    computed: {
        username() {
            return this.$route.params.username
        },
        temperatureOutdoorValue() {
            return parseInt(this.weatherApiResponseObject.main.temp)-273;
        },
        humidityOutdoorValue() {
            return this.weatherApiResponseObject.main.humidity;
        },
    },
    methods: {
        goBack() {
            window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/home')
        },
        async fetchWeather() {
            try {
                const response = await fetch(`${BASE_API_URL}/api/getWeatherParams`);
                this.weatherApiResponseObject = await response.json();
            } catch (e) {
                console.error("Fetching error");
            }
        },
    }
}
</script>
