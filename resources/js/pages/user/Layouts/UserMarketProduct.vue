<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="p-5 text-lg lg:px-14 lg:p-14 main-content-dashboard">
        <div
          class="grid grid-flow-row-dense grid-cols-2 grid-rows-2 gap-4 xl:grid-cols-5"
        >
          <div class="col-span-3">
            <div>
              <v-col cols="12">
                <v-card class="card-package-details">
                  <img
                    src="@/assets/icon/big-image-package.png"
                    alt="AI Gen XII EA"
                    width="1000"
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
            <v-row>
              <div class="grid">
                <v-col cols="12">
                  <v-card class="p-4 mt-3 text-white shadow-md main-content">
                    <!-- Title -->
                    <h1 class="p-3 mt-3 mb-4 text-5xl font-bold">
                      AI Gen XII EA
                    </h1>

                    <!-- Rating and Sales -->
                    <div
                      class="grid items-center grid-cols-3 mt-4 mb-4 2xl:grid-rows-1"
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
                      ปลดล็อกศักยภาพการเทรดของคุณด้วย EA Forex
                      โปรแกรมเทรดอัตโนมัติที่ออกแบบมาเพื่อช่วยให้คุณทำกำไรในตลาด
                      Forex โดยไม่ต้องเฝ้ากราฟหรือคอยตัดสินใจด้วยตัวเอง EA
                      จะทำงาน...
                    </p>

                    <!-- Price -->
                    <div class="p-3 mb-4 text-3xl font-bold">
                      {{
                        selectedPackage
                          ? selectedPackage.price
                          : "เริ่มต้น ฿1,900 - 3,200"
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
                        :class="[
                          'mb-2 border border-white w-[100%] h-[106px] rounded-lg v-list-package',
                          {
                            'selected-package': selectedPackage == packageItem,
                          },
                        ]"
                      >
                        <div class="flex justify-between p-4">
                          <v-list-item-content>
                            <v-list-item-title class="text-white">
                              <h2>
                                {{ packageItem.name }}
                              </h2>
                            </v-list-item-title>
                          </v-list-item-content>
                          <v-list-item-content>
                            <v-list-item-title class="text-white">
                              <h4>
                                {{ packageItem.price }}
                              </h4>
                            </v-list-item-title>
                          </v-list-item-content>
                        </div>
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
import { usePaymentStore } from "@/stores/usePaymentStore";
import { Swiper, SwiperSlide } from "swiper/vue";
import { useRouter } from "vue-router";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import { FwbTab, FwbTabs } from "flowbite-vue";

// Import required modules
import { Pagination, Navigation } from "swiper/modules";

const modules = [Pagination, Navigation];

const store_payment = usePaymentStore();

const packages = ref([
  { name: "3 เดือน", price: "฿1,200" },
  { name: "6 เดือน", price: "฿2,000" },
  { name: "12 เดือน", price: "฿3,500" },
]);
const activeTab = ref("first");

const selectedPackage = ref(null);
const selectPackage = (packageItem) => {
  // บันทึกข้อมูลใน Store
  store_payment.form.data.package_name = packageItem.name;
  store_payment.form.data.package_price = packageItem.price;
  localStorage.setItem("package_name", packageItem.name);
  localStorage.setItem("package_price", packageItem.price);
  console.log("PackageName:", store_payment.form.data.package_name);
  console.log("PackagePrice:", store_payment.form.data.package_price);

  const router = useRouter();
  // ส่งไปยังหน้าถัดไป
  router.push({
    name: "UserProductPayment",
  });
};

const rating = ref(4.9);
const tab = ref(0);

defineOptions({
  layout: LayoutAuthenticate,
});

const test = async (test) => {
  console.log(test);
};
</script>


<style scoped>
@media (min-width: 1100px) {
  .lg\:grid-cols-5 {
    grid-template-columns: repeat(5, minmax(0, 1fr));
  }
}
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
