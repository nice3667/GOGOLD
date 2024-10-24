<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main class="w-full main-content-admin-dashboard">
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div
        class="grid h-full grid-cols-1 gap-3 p-10 text-lg main-content-dashboard"
      >
        <v-row>
          <v-col class="grid grid-cols-1 ml-13">
            <div class="text-white">
              <h2>รายการสินค้า</h2>
            </div>
            <div>
              <div class="relative mt-4 w-80">
                <input
                  v-model="searchQuery"
                  type="text"
                  placeholder="ค้นหา"
                  class="w-full py-2 pl-10 pr-4 search-package"
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
            <div class="mt-4 text-white">
              <h3>MetaTrader 5</h3>
            </div>
          </v-col>
        </v-row>
        <v-row>
          <v-col
            class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4"
          >
            <div
              v-for="package_item in filteredPackages"
              :key="package_item.id"
            >
              <!-- Card wrapped in a router-link for navigation -->
              <v-card
                :href="route('market.product.show', package_item.id)"
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
                <v-card-title>
                  <div class="mt-2 text-2xl font-bold">
                    {{ package_item.name }}
                  </div>
                </v-card-title>

                <!-- Subtitle -->
                <template
                  v-for="description in package_item.descriptions"
                  :key="description.id"
                >
                  <v-card-subtitle>
                    <div class="text-lg text-white">
                      {{ description.descriptions }}
                    </div>
                  </v-card-subtitle>
                </template>

                <!-- Pricing & Rating Section -->
                <v-row align="center" class="justify-between mx-0">
                  <div class="mt-5 ml-4 text-2xl font-bold text-white">
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
                    <div class="mx-1 text-sm text-white">4.9</div>
                  </v-col>

                  <v-col class="text-right">
                    <div class="text-sm text-white">(10 sold)</div>
                  </v-col>
                </v-row>
              </v-card>
            </div>
          </v-col>
        </v-row>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";
import { ref, onMounted, reactive, computed } from "vue";
import axios from "axios";

defineOptions({
  layout: LayoutAuthenticate,
});

const package_list = reactive({
  list: [],
});
const searchQuery = ref("");

// Fetch package list on mounted
onMounted(async () => {
  try {
    const response = await axios.get("/api/packages/getlist");
    console.log(response);
    package_list.list = response.data;
    console.log(package_list.list);
  } catch (error) {
    console.error("Error fetching package list:", error);
  }
});

// Computed property for filtered packages
const filteredPackages = computed(() => {
  if (!searchQuery.value) {
    return package_list.list;
  }
  const query = searchQuery.value.toLowerCase();
  return package_list.list.filter((package_item) =>
    package_item.name.toLowerCase().includes(query)
  );
});
</script>

<style scoped>
</style>
