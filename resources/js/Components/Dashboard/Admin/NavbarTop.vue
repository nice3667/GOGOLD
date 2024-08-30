<template>
  <v-app-bar color="black" flat class="text-white">
    <v-toolbar-title class="flex items-center">
      <div class="sm:flex main-text-toolbar">
        <a href="/home" class="text-dashboard">{{ company.home }}</a>
        <a href="/stats" class="ml-4 text-dashboard">{{ company.stats }}</a>
        <a href="/learn" class="ml-4 text-dashboard">{{ company.learn }}</a>
        <a href="/orderhistory" class="ml-4 text-dashboard">{{
          company.orderhistory
        }}</a>
        <a href="/about" class="ml-4 text-dashboard">{{ company.about }}</a>
      </div>
    </v-toolbar-title>

    <v-spacer></v-spacer>

    <!-- โปรไฟล์ผู้ใช้งาน -->
    <v-avatar size="45" class="mr-2">
      <img src="@/assets/icon/test.png" alt="" />
    </v-avatar>
    <div class="flex flex-col justify-center">
      <span class="flex justify-center mr-4 text-[#FFD700]">Wife Nicezy</span>
      <span class="mr-4 text-[#737373]">Thitikorncs@gmail.com</span>
    </div>
    <v-btn text class="btn-signout">
      <img src="@/assets/icon/+.png" alt="" />
      Sign out</v-btn
    >
  </v-app-bar>
</template>
<script setup>
import { ref } from "vue";
const company = ref({
  home: "หน้าหลัก",
  stats: "สถิติ",
  learn: "เรียนรู้",
  about: "เกี่ยวกับเรา",
  orderhistory: "ประวัติการสั่งซื้อ",
});
</script>
<style scoped>
.text-dashboard {
  color: #ffd700;
  font-size: 15px;
}
.text-yellow-500 {
  color: #ffd700;
}
.bg-yellow-500 {
  background-color: #ffd700;
}
.text-white {
  color: #ffffff;
}
.bg-black {
  background-color: #000000;
}
.btn-signout {
  color: #000000;
  background-color: #ffd700;
  border-radius: 30px;
}
</style>
