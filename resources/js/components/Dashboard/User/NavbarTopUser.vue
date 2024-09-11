<template>
  <v-app-bar color="black" flat class="text-white">
    <v-spacer></v-spacer>

    <!-- โปรไฟล์ผู้ใช้งาน -->

    <v-avatar size="45" class="mr-5">
      <img src="@/assets/icon/test.png" alt="" />
    </v-avatar>
    <div class="flex flex-col justify-center mr-20">
      <span class="flex justify-center mr-4 text-[#FFD700]">Wife Nicezy</span>
      <span class="mr-4 text-[#737373]">Thitikorncs@gmail.com</span>
    </div>
  </v-app-bar>
</template>
<script setup>
import ResponsiveNavLink from "@/components/ResponsiveNavLink.vue";
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
