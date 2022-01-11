<template>
    <div class="row">
        <div class="col-3 col-md-3 col-lg-3">
            <left-sidebar-component></left-sidebar-component>
         </div>
        <div class="col-6 col-md-6 col-lg-6 col-sm-12">
            <monitor-component
            :temperatureOutdoorValue="34"
            :humidityOutdoorValue="60">
            </monitor-component>
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <right-sidebar-component
                :weatherApiResponseArray = "weatherApiResponseArray">
            </right-sidebar-component>
        </div>
    </div>
</template>

<script>
import LeftSidebarComponent from "./LeftSidebarComponent";
import RightSidebarComponent from "./RightSidebarComponent";
import MonitorComponent from "./MonitorComponent";
export default {
    name: "MainComponent",
    components: {MonitorComponent, LeftSidebarComponent, RightSidebarComponent},
    props: {
        weatherApiResponseArray: Array,
    }
}
</script>

<style scoped>

</style>
