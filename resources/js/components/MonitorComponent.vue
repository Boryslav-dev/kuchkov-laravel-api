<template>
    <div>
        <p class="text-white text-xl-center h1 m-5"> Smart-House Panel</p>
        <div class="row row-cols-xs-1 row-cols-md-1 row-cols-sm-1 row-cols-lg-3">
            <router-link class="mb-3" to="/temperature">
                <div class="col">
                    <div class="hovereffect card bg-dark text-white">
                        <img class="img-responsive" src="../../../public/images/images/img.png" alt="">
                        <div class="overlay">
                            <p class="card-title mt-5">Temperature:</p>
                            <p class="card-text">in house:
                                <span class="card-text h4"> {{ temperature }} &#176;C</span>
                            </p>
                            <p class="card-text">outdoor:
                                <span class="card-text h4"> {{ temperatureOutdoorValue }} &#176;C</span>
                            </p>
                            <h1 class="card-text">Temperture</h1>
                        </div>
                    </div>
                </div>
            </router-link>
            <router-link class="mb-3" to="/humidity">
                <div class="col mb-3">
                <div class="hovereffect card bg-dark text-white">
                    <img class="img-responsive" src="../../../public/images/images/img.png" alt="">
                    <div class="overlay">
                        <p class="card-title mt-5">Humidity:</p>
                        <p class="card-text">in house:
                            <span class="card-text h4">{{ humidity }} %</span>
                        </p>
                        <p class="card-text">outdoor:
                            <span class="card-text h4">{{ humidityOutdoorValue }} %</span>
                        </p>
                        <h1 class="card-text">Humidity</h1>
                    </div>
                </div>
            </div>
            </router-link>
            <router-link class="mb-3" to="/security">
                <div class="col mb-3">
                    <div class="hovereffect card bg-dark text-white">
                        <img class="img-responsive" src="../../../public/images/images/img.png" alt="">
                        <div class="overlay">
                            <p class="card-title mt-5">Fire Safety</p>
                            <p class="card-text h4" v-if="smokeDangerStatus === false">Smoke rate: {{ smokeRate }}</p>
                            <p class="card-text h4 text-danger" v-else>Smoke rate: {{ smokeRate }}</p>
                            <p class="card-text h4" v-if="flameDangerStatus === false">Flame rate: {{ flameRate }}</p>
                            <p class="card-text h4 text-danger" v-else>Flame rate: {{ flameRate }}</p>
                            <h1 class="card-text" v-if="dangerZoneStatus === false">Fire Safety</h1>
                            <h1 class="card-text text-danger" v-else>Fire Safety</h1>
                        </div>
                    </div>
                </div>
            </router-link>
            <div class="col mb-3"
                 @click="changeLight">
                <div class="hovereffect hovereffectLight card bg-dark text-white" v-if="lightSwitch === 'on'">
                    <img class="img-responsive" src="../../../public/images/images/img.png" alt="">
                    <div class="overlay">
                        <p class="card-title mt-5">Light</p>
                        <p class="card-text h1">{{ light }}</p>
                        <h1 class="card-text">Light</h1>
                    </div>
                </div>
                <div class="hovereffect hovereffectDark card bg-dark text-white" v-else>
                    <img class="img-responsive" src="../../../public/images/images/img.png" alt="">
                    <div class="overlay">
                        <p class="card-title mt-5">Light</p>
                        <p class="card-text h1">{{ light }}</p>
                        <h1 class="card-text">Light</h1>
                    </div>
                </div>
            </div>
            <router-link class="mb-3" to="/system">
                <div class="col mb-3">
                    <div class="hovereffect card bg-dark text-white">
                        <img class="img-responsive" src="../../../public/images/images/img.png" alt="">
                        <div class="overlay">
                            <p class="card-title mt-5">System:</p>
                            <p class="card-text">in house:
                                <span class="card-text h4"> {{ temperature }} &#176;C</span>
                            </p>
                            <p class="card-text">outdoor:
                                <span class="card-text h4"> {{ temperatureOutdoorValue }} &#176;C</span>
                            </p>
                            <h1 class="card-text">System</h1>
                        </div>
                    </div>
                </div>
            </router-link>
            <router-link class="mb-3" to="/light">
                <div class="col mb-3">
                <div class="hovereffect card bg-dark text-white">
                    <img class="img-responsive" src="../../../public/images/images/img.png" alt="">
                    <div class="overlay">
                        <p class="card-title mt-5">Temperature:</p>
                        <p class="card-text">in house:
                            <span class="card-text h4"> {{ temperature }} &#176;C</span>
                        </p>
                        <p class="card-text">outdoor:
                            <span class="card-text h4"> {{ temperatureOutdoorValue }} &#176;C</span>
                        </p>
                        <h1 class="card-text">Temperture</h1>
                    </div>
                </div>
            </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "MonitorComponent",
    props: {
        temperatureOutdoorValue: String,
        humidityOutdoorValue: String,
    },
    data() {
        return {
            lightSwitch: 'on',
            temperatureValue: '25',
            humidityValue: '70',
            luminosityValue: '60',
            smokeDangerMessage: 'normal',
            flameDangerMessage: 'Gorim!!!!',
            smokeDangerStatus: false,
            flameDangerStatus: true,
            dangerZoneStatus: true,
        };
    },
    computed: {
        light() {
            return this.lightSwitch;
        },
        temperature() {
            return this.temperatureValue;
        },
        humidity() {
            return this.humidityValue;
        },
        luminosity() {
            return this.luminosityValue;
        },
        smokeRate() {
            return this.smokeDangerMessage;
        },
        flameRate() {
            return this.flameDangerMessage;
        },
    },
    methods: {
        changeLight() {
            if (this.lightSwitch === 'on') {
                return this.lightSwitch = 'off';
            } else {
                return this.lightSwitch = 'on';
            }
        },
    },
};
</script>
