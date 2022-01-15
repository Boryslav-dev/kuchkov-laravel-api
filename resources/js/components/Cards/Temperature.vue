<template>
    <div class="row container-fluid">
        <div class="col-3 col-md-3 col-lg-3 sidebar">
            <sidebar-card-component></sidebar-card-component>
        </div>
        <div class="col-9 col-md-9 col-lg-9 col-sm-12">
            <temperature-chart></temperature-chart>
        </div>
    </div>
</template>

<script>
import TemperatureChart from "../Chart/TemperatureChart";
import SidebarCardComponent from "../Sidebar/SidebarCardComponent";
export default {
    name: "Temperature",
    components: {SidebarCardComponent, TemperatureChart},
    methods: {
        goBack() {
            window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/home')
        }
    }
}
</script>
