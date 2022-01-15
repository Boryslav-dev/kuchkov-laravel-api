<template>
    <p class="text-xl-center m-4 h2">
         <span>{{hours}}:{{minutes}}:{{seconds}}</span>
    </p>
</template>

<script>
export default {
    name: "TimeSince",
    data() {
        return {
            interval:null,
            hours:0,
            minutes:0,
            seconds:0,
            intervals:{
                second: 1000,
                minute: 1000 * 60,
                hour: 1000 * 60 * 60,
                day: 1000 * 60 * 60 * 24
            }
        }
    },
    props:{
        date:{
            required:true
        }
    },
    mounted() {
        this.interval = setInterval(() => {
            this.updateDiffs();
        },1000);

        this.updateDiffs();
    },
    destroyed() {
        clearInterval(this.interval);
    },
    methods:{
        updateDiffs() {
            let diff = Math.abs(Date.now() - this.date.getTime());
            this.days = Math.floor(diff / this.intervals.day);
            diff -= this.days * this.intervals.day;
            this.hours = Math.floor(diff / this.intervals.hour);
            if(this.hours.length === 1) this.hours = '0' + this.hours;
            diff -= this.hours * this.intervals.hour;
            this.minutes = Math.floor(diff / this.intervals.minute).toString();
            if(this.minutes.length === 1) this.minutes = '0' + this.minutes;
            diff -= this.minutes * this.intervals.minute;
            this.seconds = Math.floor(diff / this.intervals.second).toString();
            if(this.seconds.length === 1) this.seconds = '0' + this.seconds;
        }
    }
}
</script>
