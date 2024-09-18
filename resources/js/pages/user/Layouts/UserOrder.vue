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
            <div>
              <v-card class="mx-auto card-package-ea" max-width="250">
                <!-- Image Section -->
                <v-img
                  src="@/assets/icon/image-ea-package.png"
                  height="200px"
                  class="rounded-t-lg"
                  alt="EA Package"
                ></v-img>

                <!-- Title -->
                <v-card-title class="text-xl font-bold">
                  AI Gen XII EA
                </v-card-title>

                <!-- Subtitle -->
                <v-card-subtitle class="text-gray-500">
                  ปลดล็อกศักยภาพการเทรดของคุณด้วย EA Forex โปรแกรมเทรดอัตโนมัติ
                </v-card-subtitle>

                <!-- Pricing & Rating Section -->
                <v-card-text>
                  <v-row align="center" class="justify-between mx-0">
                    <div class="text-2xl font-bold text-black">฿ 3,200</div>
                    <div class="flex items-center">
                      <img
                        src="@/assets/icon/star-rating.png"
                        class="w-4 h-4"
                        alt="Star Rating"
                      />
                      <div class="mx-1 text-sm text-gray-600">4.9</div>
                      <div class="text-sm text-gray-400">(10 sold)</div>
                    </div>
                  </v-row>
                </v-card-text>
              </v-card>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";
import { ref } from "vue";

// Reactive references for state variables
const loading = ref(false);
const selection = ref(1);

// Reserve method with a loading timeout simulation
const reserve = () => {
  loading.value = true;
  setTimeout(() => {
    loading.value = false;
  }, 2000);
};

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
