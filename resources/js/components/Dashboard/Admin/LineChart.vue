<template>
  <div class="">
    <div class="mt-5">
      <v-card class="line-chart">
        <div class="flex justify-between">
          <div class="flex items-center justify-start mb-2">
            <h2 class="text-3xl font-bold text-[#FFD700]">฿ 256,565.83</h2>
            <p class="ml-1 text-white">BTC/USDC</p>
            <v-chip color="green" class="ml-1">4.25%</v-chip>
            <p class="ml-1 text-white">+0.0954 วันนี้</p>
          </div>
          <div class="flex justify-end">
            <v-btn-toggle
              v-model="selected"
              class="bg-gray-800 rounded-lg"
              mandatory
            >
              <v-btn
                v-for="(label, index) in buttons"
                :key="index"
                :value="label"
                height=""
                class="px-4 py-2"
                :class="
                  selected != label
                    ? '!bg-[#27272A] text-white'
                    : '!bg-[#FFD700] text-black'
                "
              >
                {{ label }}
              </v-btn>
            </v-btn-toggle>
          </div>
        </div>
        <div class="text-[#737373]">
          <p>Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="relative w-full h-80">
          <Line :data="data" :options="options" />
        </div>
        <div class="flex justify-between">
          <div class="flex justify-start">
            <p class="mt-2 text-sm text-[#FFD700]">
              อัพเดตล่าสุด 2024-03-01 04:39 (UTC+0)
            </p>
          </div>
          <div class="flex items-center justify-end mr-2">
            <a href="#" class="text-[#FFD700]">ดูรายละเอียด</a>
            <img src="@/assets/icon/ssr.png" alt="" class="w-4 h-4 ml-2" />
          </div>
        </div>
      </v-card>
    </div>
  </div>
</template>

<script >
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";
// import DonutChart from "./DonutChart.vue";
import * as chartDoughnut from "./chartDoughnut.ts";
import { Doughnut } from "vue-chartjs";
import { Line } from "vue-chartjs";
import * as chartConfig from "./chartConfig.ts";

ChartJS.register(
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
);

export default {
  name: "App",
  components: {
    Line,
    Doughnut,
  },
  data() {
    return {
      ...chartConfig,
      chartDoughnut,
      selected: "1Y", // Default selected button
      buttons: ["1D", "1W", "1M", "1Y"], // Button labels
    };
  },
};
</script>

<style scoped>
.line-chart {
  padding: 15px;
  background-color: #1d1d1d;
  border-radius: 24px;
}
</style>
