<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main class="main-content-admin-dashboard">
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <v-container class="text-lg main-content-admin-dashboard pa-5" fluid>
        <v-row>
          <v-col cols="12" md="6">
            <div class="text-2xl text-white">Coming Soon !!!</div>
          </v-col>
          <v-col cols="12" md="6">test</v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

defineOptions({
  layout: LayoutAuthenticate,
});
</script>

244,244,244,244

<style scoped>
hr {
  border-top: 2px;
  color: #ffffff;
}

.content-admin-dashboard {
  @apply bg-[#1D1D1D] p-6 flex items-center justify-center w-64 h-24;
  border-radius: 24px;
}

.content-group-admin-dashboard {
  border-radius: 24px;
}

.icon {
  @apply w-12 h-12;
}

.text-left {
  @apply flex flex-col;
}

body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.main-content-admin-dashboard {
  background-color: #252525;
}

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
</style>
