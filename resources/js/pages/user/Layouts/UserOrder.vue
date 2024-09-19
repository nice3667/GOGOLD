<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main class="main-content-admin-dashboard">
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="p-2 text-lg lg:p-16 main-content-dashboard">
        <v-container>
          <v-row>
            <v-col cols="12" md="4">
              <div>
                <!-- Card wrapped in a router-link for navigation -->
                <v-card
                  :href="route('UserOrderDetails')"
                  exact
                  rounded=""
                  tile
                  class="mx-auto card-package-ea"
                  max-width="250"
                >
                  <!-- Image Section -->
                  <img
                    src="@/assets/icon/image-ea-package.png"
                    class="mx-auto"
                    width="250"
                    alt="EA Package"
                  />

                  <!-- Title -->
                  <v-card-title
                    class="justify-center pb-0 mb-3"
                    style="
                      font-family: 'Google Sans', Roboto, sans-serif;
                      line-height: 1.1;
                    "
                  >
                    AI Gen XII EA
                  </v-card-title>

                  <!-- Subtitle -->
                  <v-card-subtitle class="text-gray-500">
                    ปลดล็อกศักยภาพการเทรดของคุณด้วย EA Forex
                    โปรแกรมเทรดอัตโนมัติ
                  </v-card-subtitle>

                  <!-- Pricing & Rating Section -->
                  <v-row align="center" class="justify-between mx-0">
                    <div class="mt-4 ml-4 text-2xl font-bold text-white">
                      ฿ 3,200
                    </div>
                  </v-row>

                  <v-row align="center" class="justify-between mx-0">
                    <v-col class="d-flex align-center">
                      <img
                        src="@/assets/icon/star-rating.png"
                        class="w-4 h-4"
                        alt="Star Rating"
                      />
                      <div class="mx-1 text-sm text-gray-600">4.9</div>
                    </v-col>

                    <v-col class="text-right">
                      <div class="text-sm text-gray-400">(10 sold)</div>
                    </v-col>
                  </v-row>
                </v-card>
              </div>
            </v-col>
          </v-row>
        </v-container>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";
import { ref } from "vue";

defineOptions({
  layout: LayoutAuthenticate,
});
</script>

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

.no-underline {
  text-decoration: none;
}
</style>
