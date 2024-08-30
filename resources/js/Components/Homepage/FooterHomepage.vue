<template>
  <div class="container">
    <div class="flex justify-center">
      <img class="img-footer" src="@/assets/icon/logo.jpg" alt="" />
    </div>
    <div class="flex justify-center mt-5">
      <a href="/home" class="text-footer">{{ company.home }}</a>
      <a href="/stats" class="ml-4 text-footer">{{ company.stats }}</a>
      <a href="/learn" class="ml-4 text-footer">{{ company.learn }}</a>
      <a href="/about" class="ml-4 text-footer">{{ company.about }}</a>
    </div>
    <div class="flex items-center justify-center mt-5">
      <div class="flex items-center rounded-full input-footer">
        <input type="text" placeholder="ส่งอีเมล" class="text-input-footer" />
        <v-btn flat href="/" class="ml-10 btn-footer">
          <div>
            <v-icon>mdi-paw</v-icon>
          </div>
          ส่ง</v-btn
        >
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
    <div class="flex items-center justify-center mt-5">
      <p class="text-yellow-500">&copy; 2024 EA, All rights reserved</p>
    </div>
  </div>
</template>
<script setup>
import { ref, watch } from "vue";

const company = ref({
  name: "GOGOLD",
  home: "หน้าหลัก",
  stats: "สถิติ",
  learn: "เรียนรู้",
  about: "เกี่ยวกับเรา",
});
</script>
