<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="text-lg px-14 lg:px-14 main-content-dashboard">
        <div
          class="grid grid-flow-row-dense grid-cols-2 grid-rows-2 gap-4 xl:grid-cols-5"
        >
          <div class="col-span-3">
            <div>
              <v-col cols="12">
                <v-card class="mt-3 card-package-details">
                  <img
                    src="@/assets/icon/big-image-package.png"
                    alt="AI Gen XII EA"
                    class="img-ea-package-details"
                  />
                  <div class="flex justify-center p-5">
                    <!-- Image Slider -->
                    <swiper
                      ref="swiperRef"
                      :slidesPerView="5"
                      :centeredSlides="true"
                      :spaceBetween="20"
                      :loop="true"
                      :pagination="{
                        type: 'fraction',
                      }"
                      :navigation="true"
                      :modules="modules"
                      class="mySwiper"
                    >
                      <swiper-slide class="flex justify-center img-swiper">
                        <img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                        />
                      </swiper-slide>
                      <swiper-slide class="flex justify-center img-swiper">
                        <img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                        />
                      </swiper-slide>
                      <swiper-slide class="flex justify-center img-swiper">
                        <img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                        />
                      </swiper-slide>
                      <swiper-slide class="flex justify-center img-swiper">
                        <img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                        />
                      </swiper-slide>
                      <swiper-slide class="flex justify-center img-swiper">
                        <img
                          src="@/assets/icon/big-image-package.png"
                          alt="AI Gen XII EA"
                        />
                      </swiper-slide>
                    </swiper>
                  </div>
                </v-card>
              </v-col>
              <v-col cols="12">
                <v-tabs v-model="tab" class="text-white tap-package" grow>
                  <v-tab :key="0">รายละเอียด</v-tab>
                  <v-tab :key="1">เวอร์ชัน</v-tab>
                  <v-tab :key="2">รีวิว</v-tab>
                </v-tabs>
                <v-tabs-items v-model="tab">
                  <v-tab-item :value="0" v-if="tab === 0">
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

                  <v-tab-item :value="1" v-if="tab === 1">
                    <v-card-text class="text-white">
                      <h2 class="mb-4 text-2xl font-bold">ข้อมูลเวอร์ชัน</h2>
                      <p>ข้อมูลเวอร์ชันปัจจุบันของโปรแกรม EA Forex ได้แก่:</p>
                      <ul class="pl-6 mt-4 list-disc">
                        <li>เวอร์ชัน 1.0.0</li>
                        <li>ปรับปรุงประสิทธิภาพ</li>
                        <li>แก้ไขข้อบกพร่องเล็กน้อย</li>
                      </ul>
                    </v-card-text>
                  </v-tab-item>

                  <v-tab-item rounded="" :value="2" v-if="tab === 2">
                    <v-card-text class="text-white">
                      <h2 class="mb-4 text-2xl font-bold">รีวิวจากผู้ใช้</h2>
                      <p>รีวิวจากผู้ใช้งานที่พึงพอใจกับ EA Forex:</p>
                      <ul class="pl-6 mt-4 list-disc">
                        <li>
                          "ทำงานอัตโนมัติได้ดีเยี่ยม ช่วยประหยัดเวลา" - ผู้ใช้ A
                        </li>
                        <li>"โปรแกรมใช้งานง่ายและทำกำไรได้จริง" - ผู้ใช้ B</li>
                      </ul>
                    </v-card-text>
                  </v-tab-item>
                </v-tabs-items>
              </v-col>
            </div>
          </div>
          <div class="col-span-2">
            <div class="grid">
              <v-col cols="12">
                <v-card
                  class="p-4 mt-3 text-white shadow-md main-content-package-product"
                >
                  <!-- Title -->
                  <h1 class="p-3 mt-3 mb-4 text-5xl font-bold">
                    {{ props.package.name }}
                  </h1>

                  <!-- Rating and Sales -->
                  <div
                    class="grid items-center grid-cols-3 mt-0 mb-4 2xl:grid-rows-1"
                  >
                    <div class="ml-1">
                      <v-rating
                        v-model="rating"
                        :length="4"
                        size="30"
                        :model-value="4.9"
                        active-color="yellow"
                        inactive-color="gray"
                      ></v-rating>
                    </div>
                    <div class="">
                      <p class="text-gray-300">4.9 (188รีวิว)</p>
                    </div>
                    <div class="col-span-2 col-end-7">
                      <p class="text-sm text-gray-400">10 sold</p>
                    </div>
                  </div>
                  <!-- Description -->
                  <p class="p-3 mb-4 text-lg text-gray-300">
                    <ul>
                      <li v-for="(description, index) in props.package.descriptions" :key="index">
                        {{ description.descriptions }}
                      </li>
                    </ul>
                  </p>
                  <!-- Price -->
                  <div class="p-3 mb-4 text-3xl font-bold">

                    {{
                      selectedPackage
                        ? `฿ ${selectedPackage.price}`
                        : "เริ่มต้น ฿ 500 - 3,200"
                    }}
                  </div>
                  <!-- Button -->
                  <div class="flex items-center justify-center">
                    <v-btn
                      href="/product/payment"
                      class="w-full btn-shopping"
                      rounded
                      >ไปที่ตะกร้าสินค้า</v-btn
                    >
                  </div>
                </v-card>
              </v-col>
              <v-col cols="12">
                <v-card class="p-4 text-white main-content">
                  <!-- Title -->
                  <h4 class="mb-4 ml-4 text-lg font-bold">
                    เลือกระยะเวลาในการเช่า
                  </h4>

                  <!-- Package Options -->
                  <v-list class="px-4 rounded-lg v-list-package">
                    <v-list-item
                      v-for="(packageItem, index) in packages"
                        :key="index"
                          @click="selectPackage(packageItem)"
                          class="mb-2  w-[100%] h-[106px] rounded-lg "
                          :class="selectedPackage == packageItem ? 'selected-package' : ' border border-white'"
                      >
                        <div class="flex justify-between p-4">
                          <v-list-item-content>
                            <v-list-item-title class="text-white">
                              <h2>{{ packageItem.name }}</h2>
                            </v-list-item-title>
                          </v-list-item-content>
                          <v-list-item-content>
                            <v-list-item-title class="text-white">
                              <h4>฿ {{ packageItem.month * props.package.price}}</h4>
                            </v-list-item-title>
                          </v-list-item-content>
                      </div>
                    </v-list-item>
                  </v-list>
                </v-card>
              </v-col>
            </div>
          </div>
        </div>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import { ref, onMounted, computed } from "vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";
import { usePaymentStore } from "@/stores/usePaymentStore";
import { Swiper, SwiperSlide } from "swiper/vue";

import { Pagination, Navigation } from "swiper/modules";
// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import { FwbTab, FwbTabs } from "flowbite-vue";

const modules = [Pagination, Navigation];

const props = defineProps({
  package: {
    type: Object,
    required: true, // กำหนดให้ prop นี้จำเป็นต้องส่งมา
  },
  descriptions: {
    type: Array,
    required: true, // descriptions จะเป็น Array
  },
});
console.log(props);

const packages = ref([
  { name: "แพ็กเกจ 3 เดือน", month: 3 },
  { name: "แพ็กเกจ 6 เดือน", month: 6 },
  { name: "แพ็กเกจ 12 เดือน", month: 12 },
]);

const store_payment = usePaymentStore();
const selectedPackage = ref(null);
const selectPackage = (packageItem) => {
  packageItem.price = packageItem.month * props.package.price;
  selectedPackage.value = packageItem;
  store_payment.setPackage(
    packageItem.name,
    packageItem.price,
    props.package.name
  );
  let package_data = {
    package_name: props.package.name,
    package_price: packageItem.price,
    package_month: packageItem.name,
  };
  // localStorage.setItem("package", JSON.stringify(packageItem));
  localStorage.setItem("package", JSON.stringify(package_data));

  // localStorage.getItem("package");
};

const tab = ref(0);

defineOptions({
  layout: LayoutAuthenticate,
});

onMounted(() => {
  console.log("Product Package:", props.package);
  console.log("Product Package:", props.package.name);
  console.log("Descriptions:", props.descriptions);
});
</script>


<style scoped>
@media (min-width: 1100px) {
  .lg\:grid-cols-5 {
    grid-template-columns: repeat(5, minmax(0, 1fr));
  }
}
</style>
