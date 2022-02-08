<template>
    <div class="row container-fluid">
        <div class="col-3 col-md-3 col-lg-3 sidebar">
            <sidebar-card-component-sys></sidebar-card-component-sys>
        </div>
        <div class="col-9 col-md-9 col-lg-9 col-sm-12">
            <div class="my-3 p-3 bg-body rounded shadow-sm mt-5">
                <h6 class="border-bottom pb-2 mb-0">System</h6>
                <div class="d-flex text-muted pt-3">
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark h4">CPU</strong>
                            <p class="h4">{{cpu}}1</p>
                        </div>
                        <span class="d-block h5">%</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark h4">Memory ROM</strong>
                            <p class="h4">{{mem}}1</p>
                        </div>
                        <span class="d-block h5">kb</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark h4">RAM Tota</strong>
                            <p class="h4">{{memTotal}}1</p>
                        </div>
                        <span class="d-block h5">kb</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark h4">RAM Availiable</strong>
                            <p class="h4">{{memAvailiable}}1</p>
                        </div>
                        <span class="d-block h5">kb</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark h4">RAM Free</strong>
                            <p class="h4">{{memFree}}1</p>
                        </div>
                        <span class="d-block h5">kb</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark h4">Cached</strong>
                            <p class="h4">{{cached}}1</p>
                        </div>
                        <span class="d-block h5">kb</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import SidebarCardComponentSys from "../Sidebar/SidebarCardComponentSys";
import {BASE_API_URL} from "../Constants/serverValues";
export default {
    name: "System",
    components: {SidebarCardComponentSys},
    data() {
        return {
            cpuServer: '',
            memServer: '',
            ramServer: {},
        };
    },
    computed: {
      cpu() {
          return this.cpuServer;
      },
      mem() {
        return this.memServer;
      },
      memTotal() {
        return this.ramServer['MemTotal'];
      },
      memAvailiable() {
        return this.ramServer['MemAvailable'];
      },
      memFree() {
        return this.ramServer['MemFree'];
      },
      cached() {
        return this.ramServer['Cached'];
      },
    },
    mounted() {
        setInterval(() => this.fetchCpu(), 1000);
        setInterval(() =>  this.fetchMem(), 1000);
        this.fetchRam();
    },
    methods: {
        async fetchCpu() {
            try {
                let response = await fetch(`${BASE_API_URL}/api/getServerCpu`);
                this.cpuServer = await response.json();
            } catch (e) {
                console.error("Fetching error");
            }
        },
        async fetchRam() {
            try {
                const response = await fetch(`${BASE_API_URL}/api/getServerRam`);
                const ramServerApiRequest = await response.json();
                this.ramServer = ramServerApiRequest;
            } catch (e) {
                console.error("Fetching error");
            }
        },
        async fetchMem() {
            try {
                let response = await fetch(`${BASE_API_URL}/api/getServerMem`);
                this.memServer = await response.json();
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
