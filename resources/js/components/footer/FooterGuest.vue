<template>
  <div class="color-info">
    <!-- <div class="flex justify-center">
      <img class="img-footer" src="@/assets/icon/logo.jpg" alt="" />
    </div>
    <div class="flex justify-center mt-5">
      <a :href="route(item.route_name)" class="mr-4 text-footer" v-for="(item, index) in menu_items_desktop"
        :key="'desktop' + index">
        {{ item.title }}
      </a>
    </div>
    <div class="flex items-center justify-center mt-5">
      <div class="flex items-center rounded-full input-footer">
        <input type="text" placeholder="ส่งอีเมล" class="text-input-footer" />
        <v-btn flat href="/" class="ml-10 btn-footer">
          <div>
            <v-icon>mdi-paw</v-icon>
          </div>
          ส่ง
        </v-btn>
      </div>
    </div>

    <div class="flex items-center justify-center mt-5 space-x-4">
      <v-btn icon class="text-blue-500">
        <v-icon>mdi-paw</v-icon>
      </v-btn>
      <v-btn icon class="text-red-500">
        <v-icon>mdi-paw</v-icon>
      </v-btn>
      <v-btn icon class="text-red-500">
        <v-icon>mdi-paw</v-icon>
      </v-btn>
    </div>
    <div class="flex items-center justify-center pb-10 mt-5">
      <p class="text-yellow-500">&copy; 2024 EA, All rights reserved</p>
    </div> -->
  </div>
</template>

<script setup>
import { ref } from "vue";

const menu_items_desktop = ref([
  { title: "หน้าหลัก", route_name: "home" },
  { title: "แพ็กเกจ", route_name: "StatsPage" },
  { title: "เครื่องมือช่วยเทรด", route_name: "LearnPage" },
  { title: "บทความ", route_name: "AboutPage" },
  { title: "ติดต่อเรา", route_name: "AboutPage" },
]);
</script>
