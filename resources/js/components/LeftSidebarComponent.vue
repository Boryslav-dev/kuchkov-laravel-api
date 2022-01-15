<template>
    <div class="d-flex flex-column flex-shrink-0 p-5 text-white bg-primary h-100">
        <div>
            <p class="text-xl-center h2 mb-5">
                <span>{{ new Date() | moment("dddd, MMMM Do YYYY") }}</span>
            </p>
        </div>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active h2" aria-current="page">
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white h4">
                    Temperature
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white h4">
                    Humidity
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white h4">
                    System
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white h4">
                    Danger Zone
                </a>
            </li>
        </ul>
        <hr>
    </div>
</template>

<script>
export default {
    name: "LeftSidebarComponent",
    data() {
        return {
            date: new Date(),
        };
    },
    computed: {
        currentTime() {
            return (new Date(this.date)).toLocaleDateString()
        },
    }
}
</script>

<style scoped>

</style>
