<template>
    <div class="row container-fluid">
        <div class="col-3 col-md-3 col-lg-3 sidebar">
            <sidebar-component
                :weatherApiResponseArray = "weatherApiResponseArray">
            </sidebar-component>
        </div>
        <div class="col-9 col-md-9 col-lg-9 col-sm-12">
            <monitor-component
                :temperatureOutdoorValue="34"
                :humidityOutdoorValue="60">
            </monitor-component>
        </div>
    </div>
</template>

<script>
import SidebarComponent from "./Sidebar/SidebarComponent";
import MonitorComponent from "./MonitorComponent";
export default {
    name: "MainComponent",
    components: {MonitorComponent, SidebarComponent},
    props: {
        weatherApiResponseArray: Array,
    },
    computed: {
        username() {
            return this.$route.params.username
        }
    },
    methods: {
        goBack() {
            window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/home')
        }
    }
}
</script>
