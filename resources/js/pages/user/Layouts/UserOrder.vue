<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main class="main-content-admin-dashboard">
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div
        class="grid grid-cols-1 gap-3 text-lg lg:p-16 main-content-dashboard"
      >
        <v-container>
          <v-row>
            <v-col class="grid grid-rows-3">
              <div>
                <p>รายการสินค้า</p>
              </div>
              <div class="">
                <div class="relative w-80">
                  <input
                    v-model="searchQuery"
                    type="text"
                    placeholder="ค้นหา"
                    class="w-full py-2 pl-10 pr-4 search-package focus:outline-none"
                  />
                  <svg
                    class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-4 top-1/2"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M21 21l-4.35-4.35M10.5 17a6.5 6.5 0 1 1 0-13 6.5 6.5 0 0 1 0 13z"
                    />
                  </svg>
                </div>
              </div>
              <div>
                <p>MetaTrader 5</p>
              </div>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="grid grid-cols-3">
              <div
                class="mt-10"
                v-for="package_item in package_list.list"
                :key="package_item.id"
              >
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
                  <v-card-title class="justify-center pb-0 mb-3">
                    {{ package_item.name }}
                  </v-card-title>

                  <!-- Subtitle -->
                  <v-card-subtitle class="text-gray-500">
                    {{ package_item.descriptions }}
                  </v-card-subtitle>

                  <!-- Pricing & Rating Section -->
                  <v-row align="center" class="justify-between mx-0">
                    <div class="mt-4 ml-4 text-2xl font-bold text-white">
                      ฿ {{ package_item.price }}
                    </div>
                  </v-row>

                  <v-row align="center" class="justify-between mx-0 mb-0">
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
import { ref, onMounted, reactive } from "vue";
import axios from "axios";

defineOptions({
  layout: LayoutAuthenticate,
});
const package_list = reactive({
  list: [],
});
const searchQuery = ref("");

onMounted(async () => {
  const response = await axios.get("/api/packages/getlist");
  console.log(response);
  package_list.list = response.data;
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
