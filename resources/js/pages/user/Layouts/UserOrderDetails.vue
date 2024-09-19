<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="p-4 text-lg lg:p-12 main-content-dashboard">
        <div class="grid grid-flow-row-dense grid-cols-5 grid-rows-2">
          <div class="col-span-3">
            <div>
              <v-col cols="12">
                <v-card class="card-package-details">
                  <img
                    src="@/assets/icon/big-image-package.png"
                    alt="AI Gen XII EA"
                    width="1000"
                  />
                  <div class="flex justify-center p-5 space-x-4">
                    <!-- Image Slider -->
                    <swiper
                      ref="{swiperRef}"
                      :slidesPerView="3"
                      :centeredSlides="true"
                      :spaceBetween="30"
                      :pagination="{
                        type: 'fraction',
                      }"
                      :navigation="true"
                      :modules="modules"
                      class="mySwiper"
                    >
                      <swiper-slide
                        ><img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                          class="img-swiper"
                          height="10"
                      /></swiper-slide>
                      <swiper-slide
                        ><img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                      /></swiper-slide>
                      <swiper-slide
                        ><img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                      /></swiper-slide>
                      <swiper-slide
                        ><img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                      /></swiper-slide>
                    </swiper>
                  </div>
                </v-card>
              </v-col>
              <v-col cols="12">
                <v-tabs v-model="tab" class="text-white" grow>
                  <v-tab>รายละเอียด</v-tab>
                  <v-tab>เวอร์ชัน</v-tab>
                  <v-tab>รีวิว</v-tab>
                </v-tabs>

                <v-tabs-items v-model="tab">
                  <!-- Details Tab -->
                  <v-tab-item>
                    <v-card-text class="text-white">
                      <h2 class="mb-4 text-2xl font-bold">รายละเอียดสินค้า</h2>
                      <p>
                        ปลดล็อคศักยภาพการเทรดของคุณด้วย EA Forex
                        โปรแกรมเทรดอัตโนมัติที่ออกแบบมาเพื่อช่วยให้คุณทำกำไรในตลาด
                        Forex โดยไม่ต้องให้คุณทำงานหรือจัดการใดๆ...
                      </p>
                      <ul class="pl-6 mt-4 list-disc">
                        <li>ทำงานอัตโนมัติ 24 ชั่วโมง</li>
                        <li>ใช้งานง่าย</li>
                        <li>มีการทดสอบย้อนหลัง</li>
                        <li>เพิ่มประสิทธิภาพการลงทุน</li>
                      </ul>
                    </v-card-text>
                  </v-tab-item>

                  <!-- Version Tab -->
                  <v-tab-item>
                    <v-card-text>ข้อมูลเวอร์ชัน</v-card-text>
                  </v-tab-item>

                  <!-- Reviews Tab -->
                  <v-tab-item>
                    <v-card-text>รีวิวจากผู้ใช้</v-card-text>
                  </v-tab-item>
                </v-tabs-items>
              </v-col>
            </div>
          </div>
          <div class="col-span-2">
            <v-row>
              <div class="grid">
                <v-col cols="12">
                  <v-card class="p-4 text-white shadow-md main-content">
                    <!-- Title -->
                    <h1 class="p-3 mt-5 mb-4 text-3xl font-bold">
                      AI Gen XII EA
                    </h1>

                    <!-- Rating and Sales -->
                    <div class="flex items-center mt-8 mb-4">
                      <v-rating
                        v-model="rating"
                        :length="5"
                        size="small"
                        :model-value="4.9"
                        active-color="yellow"
                        inactive-color="gray"
                      ></v-rating>
                      <span class="ml-2 text-gray-300">4.9 (188รีวิว)</span>
                      <span class="ml-auto text-sm text-gray-400">10 sold</span>
                    </div>
                    <!-- Description -->
                    <p class="p-3 mb-4 text-gray-300">
                      ปลดล็อกศักยภาพการเทรดของคุณด้วย EA Forex
                      โปรแกรมเทรดอัตโนมัติที่ออกแบบมาเพื่อช่วยให้คุณทำกำไรในตลาด
                      Forex โดยไม่ต้องเฝ้ากราฟหรือคอยตัดสินใจด้วยตัวเอง EA
                      จะทำงาน...
                    </p>

                    <!-- Price -->
                    <div class="p-3 mb-4 text-3xl font-bold">
                      เริ่มต้น ฿1,900 – 3,200
                    </div>

                    <!-- Button -->
                    <div class="flex items-center justify-center">
                      <v-btn class="w-full btn-shopping" rounded
                        >ไปที่ตะกร้าสินค้า</v-btn
                      >
                    </div>
                  </v-card>
                </v-col>
                <v-col cols="12">
                  <v-card class="p-4 text-white shadow-md main-content">
                    <!-- Title -->
                    <h2 class="mb-4 text-lg font-bold">
                      เลือกระยะเวลาในการเช่า
                    </h2>

                    <!-- Package Options -->
                    <v-list class="px-4 rounded-lg v-list-package">
                      <v-list-item
                        v-for="(packages, index) in packages"
                        :key="index"
                        class="mb-2 border border-white rounded-lg v-list-package"
                      >
                        <v-list-item-content>
                          <v-list-item-title class="text-white">{{
                            packages.name
                          }}</v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-content class="text-right">
                          <v-list-item-title class="text-gray-300">{{
                            packages.price
                          }}</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                    </v-list>
                  </v-card>
                </v-col>
              </div>
            </v-row>
          </div>
        </div>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import { ref, useAttrs, onMounted } from "vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";

// Import required modules
import { Pagination, Navigation } from "swiper/modules";

const modules = [Pagination, Navigation];

const rating = ref(4.9);
const tab = ref(0);

const packages = [
  { name: "แพ็กเกจ 3 เดือน", price: "฿1,990" },
  { name: "แพ็กเกจ 6 เดือน", price: "฿2,800" },
  { name: "แพ็กเกจ 1 ปี", price: "฿3,200" },
];

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

.main-content-dashboard {
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

/* Custom styles with Tailwind for additional design tweaks */
</style>
