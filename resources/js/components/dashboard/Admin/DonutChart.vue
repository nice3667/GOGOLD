<template>
  <div class="container">
    <div class="ml-5">
      <v-card class="flex items-center line-chart">
        <span class="text-white">รายงานยอดเงินทั้งหมด</span>
        <div class="flex mt-5 donut-chart">
          <Doughnut :data="data" :options="options" :plugins="plugins" />
        </div>
        <div class="flex mt-9 justify-evenly">
          <div class="grid space-x-4 justify-items-center">
            <img
              src="@/assets/icon/people-icon.png"
              alt=""
              class="flex justify-center icon"
            />

            <div class="flex justify-center text-left">
              <div class="text-sm text-gray-400">สมาชิกทั้งหมด</div>
              <div class="flex justify-center text-xl font-bold text-white">
                350 คน
              </div>
            </div>
          </div>
          <div class="grid space-x-4 justify-items-center">
            <img
              src="@/assets/icon/people-icon.png"
              alt=""
              class="flex justify-center icon"
            />

            <div class="flex justify-center text-left">
              <div class="text-sm text-gray-400">สมาชิกทั้งหมด</div>
              <div class="flex justify-center text-xl font-bold text-white">
                350 คน
              </div>
            </div>
          </div>
        </div>
      </v-card>
    </div>
  </div>
</template>

<script lang="ts">
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";
import { Doughnut } from "vue-chartjs";
import * as chartDoughnut from "./chartDoughnut.js";

ChartJS.register(ArcElement, Tooltip, Legend);

export default {
  name: "App",
  components: {
    Doughnut,
  },
  data() {
    return chartDoughnut;
  },
};
</script>
<style>
.donut-chart {
  /* background-color: #1d1d1d; */
  /* width: 220px; */
  height: 243px;
}
.line-chart {
  padding: 15px;
  background-color: #1d1d1d;
  border-radius: 24px;
}
</style>
