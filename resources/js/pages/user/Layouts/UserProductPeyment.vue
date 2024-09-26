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
        <!-- Step Indicator -->
        <section v-if="step == 1">
          <div class="flex items-center justify-center mt-4 text-white">
            <h3>ตะกร้าสินค้า</h3>
          </div>
          <v-row class="mt-1 mb-4 text-center">
            <v-col cols="12">
              <div class="flex items-center justify-center space-x-4">
                <div
                  class="flex items-center justify-center w-8 h-8 unstep-indicator"
                >
                  <b>1</b>
                </div>
                <div class="text-gray-400">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="107"
                    height="1"
                    viewBox="0 0 107 1"
                    fill="none"
                  >
                    <rect x="0.5" width="106" height="1" fill="#D9D9D9" />
                  </svg>
                </div>
                <div
                  class="flex items-center justify-center w-8 h-8 step-indicator"
                >
                  <b>2</b>
                </div>
                <div class="text-gray-400">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="107"
                    height="1"
                    viewBox="0 0 107 1"
                    fill="none"
                  >
                    <rect x="0.5" width="106" height="1" fill="#D9D9D9" />
                  </svg>
                </div>
                <div
                  class="flex items-center justify-center w-8 h-8 step-indicator"
                >
                  <b>3</b>
                </div>
              </div>
            </v-col>
          </v-row>
          <!-- Order Summary -->
          <div class="grid grid-cols-2 gap-0">
            <v-row class="grid items-center justify-center p-4">
              <v-col cols="12">
                <h2 class="text-lg font-bold text-white">สรุปรายการสั่งซื้อ</h2>

                <!-- Card for order summary -->
                <v-card class="mt-4 card-order-summary">
                  <div class="flex justify-start">
                    <div>
                      <img
                        src="@/assets/icon/mini-image-package.png"
                        alt="AI Gen XII EA"
                        class="rounded-lg"
                      />
                    </div>
                    <div class="ml-3">
                      <div class="grid grid-rows-3">
                        <div>
                          <h3 class="text-white">AI Gen XII EA</h3>
                        </div>
                        <div>
                          <p class="mt-1 text-gray-400">
                            แพ็กเกจ Semi-Annual 6เดือน
                          </p>
                        </div>
                        <div class="mt-1">
                          <p class="text-white">฿3,200</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </v-card>

                <!-- Referral Code Section -->
                <v-row class="mt-4">
                  <v-col cols="12">
                    <div class="flex items-center justify-between text-white">
                      <div class="text-lg">
                        <h3>โค้ดแนะนำเพื่อน</h3>
                      </div>
                      <div class="flex items-center">
                        <div>
                          <img
                            src="@/assets/icon/edit-solid.png"
                            alt="Edit Icon"
                            class="icon-edit-order"
                          />
                        </div>
                        <div>
                          <a
                            href=""
                            class="flex items-center text-sm text-yellow-500 underline"
                          >
                            เพิ่มโค้ด
                          </a>
                        </div>
                      </div>
                    </div>
                    <v-card class="mt-6 card-order-summary">
                      <div class="flex items-center justify-between">
                        <span class="text-gray-400">รหัสโค้ดแนะนำเพื่อน:</span>
                        <span class="text-white">{{ referralCode }}</span>
                      </div>
                    </v-card>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
            <v-row class="grid items-center justify-center p-4">
              <v-col cols="12">
                <v-card class="card-order-payment">
                  <h2 class="text-2xl font-bold text-white">สรุปยอดการชำระ</h2>

                  <!-- Package Details -->
                  <div class="flex justify-between mt-4">
                    <span class="text-lg text-white"
                      >AI Gen XII EA แพ็กเกจ 1ปี</span
                    >
                    <span class="text-white">{{ packagePrice }}</span>
                  </div>

                  <!-- Friend Code Discount -->
                  <div class="flex justify-between">
                    <span class="text-lg text-white">โค้ดแนะนำเพื่อน</span>
                    <span class="text-white">{{ discount }}</span>
                  </div>
                  <hr class="my-4 border-gray-600" />
                  <!-- Total Price -->
                  <div class="flex justify-between mt-5">
                    <span class="text-lg text-white">ราคาทั้งหมด</span>
                    <span class="text-white">{{ totalPrice }}</span>
                  </div>

                  <!-- Total Discount -->
                  <div class="flex justify-between">
                    <span class="text-lg text-white">ส่วนลดทั้งหมด</span>
                    <span class="text-white">{{ discount }}</span>
                  </div>

                  <!-- <hr class="my-4 border-gray-600" /> -->

                  <!-- Final Payment -->
                  <div class="flex justify-between mt-5 font-bold">
                    <span class="text-white">ยอดชำระทั้งหมด</span>
                    <span class="text-white">{{ finalPrice }}</span>
                  </div>

                  <!-- Payment Button -->
                  <v-btn class="w-full mt-5 btn-payment" @click="nextStep">
                    เลือกวิธีการชำระเงิน
                  </v-btn>
                </v-card>
              </v-col>
            </v-row>
          </div>
        </section>
        <section v-if="step == 2">
          <div class="flex items-center justify-center mt-4 text-white">
            <h3>ตะกร้าสินค้า</h3>
          </div>
          <v-row class="mt-1 mb-4 text-center">
            <v-col cols="12">
              <div class="flex items-center justify-center space-x-4">
                <div
                  class="flex items-center justify-center w-8 h-8 unstep-indicator"
                >
                  <b>1</b>
                </div>
                <div class="text-gray-400">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="107"
                    height="1"
                    viewBox="0 0 107 1"
                    fill="none"
                    class="bg-yellow"
                  >
                    <rect x="0.5" width="106" height="1" class="rect-step" />
                  </svg>
                </div>
                <div
                  class="flex items-center justify-center w-8 h-8 unstep-indicator"
                >
                  <b>2</b>
                </div>
                <div class="text-gray-400">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="107"
                    height="1"
                    viewBox="0 0 107 1"
                    fill="none"
                  >
                    <rect x="0.5" width="106" height="1" fill="#D9D9D9" />
                  </svg>
                </div>
                <div
                  class="flex items-center justify-center w-8 h-8 step-indicator"
                >
                  <b>3</b>
                </div>
              </div>
            </v-col>
          </v-row>
          <div class="grid grid-cols-2 gap-0">
            <v-row class="grid items-center justify-center p-4">
              <v-col cols="12">
                <h2 class="text-lg font-bold text-white">ช่องทางชำระเงิน</h2>

                <!-- Card for order summary -->
                <div>
                  <!-- Payment Channel List -->
                  <v-list
                    class="flex flex-row justify-center px-4 rounded-lg card-bank-peyment"
                  >
                    <v-list-item
                      v-for="(peymentList, index) in paymentChannels"
                      :key="index"
                      @click="selectPackage(peymentList)"
                      class="w-[45%] mx-2"
                      :class="[
                        'mb-2 border border-white rounded-lg card-bank-peyment',
                        {
                          'selected-package':
                            selectedPackage === peymentList.name,
                        },
                      ]"
                    >
                      <v-list-item-content>
                        <v-list-item-title class="text-center text-white">
                          {{ peymentList.name }}
                        </v-list-item-title>
                      </v-list-item-content>
                    </v-list-item>
                  </v-list>
                </div>
                <!-- Content based on selected payment channel -->
                <div class="h-[200px]">
                  <div
                    v-if="selectedPackage === 'บัญชีธนาคาร'"
                    class="content-bank"
                  >
                    <h3 class="text-white">Payment via Bank Transfer</h3>
                    <p class="text-gray-400">Bank Account: 1234-5678-9000</p>
                    <p class="text-gray-400">Account Name: บริษัท โกโกดี</p>
                  </div>

                  <div v-if="selectedPackage === 'QR Code'" class="content-qr">
                    <h3 class="text-white">Payment via QR Code</h3>
                    <img src="your-qr-code-image-url" alt="QR Code" />
                  </div>
                </div>

                <!-- Referral Code Section -->
                <v-row class="mt-4"> </v-row>
              </v-col>
            </v-row>
            <v-row class="grid justify-center">
              <v-col cols="12">
                <v-card class="card-order-payment">
                  <h2 class="text-2xl font-bold text-white">สรุปยอดการชำระ</h2>

                  <!-- Package Details -->
                  <div class="flex justify-between mt-4">
                    <span class="text-lg text-white"
                      >AI Gen XII EA แพ็กเกจ 1ปี</span
                    >
                    <span class="text-white">{{ packagePrice }}</span>
                  </div>

                  <!-- Friend Code Discount -->
                  <div class="flex justify-between">
                    <span class="text-lg text-white">โค้ดแนะนำเพื่อน</span>
                    <span class="text-white">{{ discount }}</span>
                  </div>
                  <hr class="my-4 border-gray-600" />
                  <!-- Total Price -->
                  <div class="flex justify-between mt-5">
                    <span class="text-lg text-white">ราคาทั้งหมด</span>
                    <span class="text-white">{{ totalPrice }}</span>
                  </div>

                  <!-- Total Discount -->
                  <div class="flex justify-between">
                    <span class="text-lg text-white">ส่วนลดทั้งหมด</span>
                    <span class="text-white">{{ discount }}</span>
                  </div>

                  <!-- <hr class="my-4 border-gray-600" /> -->

                  <!-- Final Payment -->
                  <div class="flex justify-between mt-5 font-bold">
                    <span class="text-white">ยอดชำระทั้งหมด</span>
                    <span class="text-white">{{ finalPrice }}</span>
                  </div>

                  <!-- Payment Button -->
                  <v-btn class="w-full mt-5 btn-payment" @click="nextStep">
                    เลือกวิธีการชำระเงิน
                  </v-btn>
                </v-card>
              </v-col>
            </v-row>
          </div>
        </section>
        <section v-if="step == 3">
          <div class="flex items-center justify-center mt-4 text-white">
            <h3>ตะกร้าสินค้า</h3>
          </div>
          <v-row class="mt-1 mb-4 text-center">
            <v-col cols="12">
              <div class="flex items-center justify-center space-x-4">
                <div
                  class="flex items-center justify-center w-8 h-8 unstep-indicator"
                >
                  <b>1</b>
                </div>
                <div class="text-gray-400">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="107"
                    height="1"
                    viewBox="0 0 107 1"
                    fill="none"
                    class="bg-yellow"
                  >
                    <rect x="0.5" width="106" height="1" class="rect-step" />
                  </svg>
                </div>
                <div
                  class="flex items-center justify-center w-8 h-8 unstep-indicator"
                >
                  <b>2</b>
                </div>
                <div class="text-gray-400">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="107"
                    height="1"
                    viewBox="0 0 107 1"
                    fill="none"
                    class="bg-yellow"
                  >
                    <rect x="0.5" width="106" height="1" class="rect-step" />
                  </svg>
                </div>
                <div
                  class="flex items-center justify-center w-8 h-8 unstep-indicator"
                >
                  <b>3</b>
                </div>
              </div>
            </v-col>
          </v-row>
          <!-- รายละเอียดคำสั่งซื้อ -->
          <div class="flex items-center justify-between">
            <h4 class="text-lg font-semibold text-white">
              เลขที่คำสั่งซื้อ: 123456789DD - 29/08/2024 17:59
            </h4>
          </div>

          <v-row class="mt-4">
            <!-- คอลัมน์ซ้าย -->
            <v-col cols="12" md="7">
              <v-card class="p-4 text-white bg-gray-800">
                <v-row>
                  <v-col cols="12" class="mb-2">
                    <h5>รายการ</h5>
                    <p>AI Gen XI EA แผ่นพับทดแทน 10 3,200฿</p>
                  </v-col>

                  <v-col cols="6">
                    <h5>ราคาสุทธิ</h5>
                    <p>4,099฿</p>
                  </v-col>

                  <v-col cols="6">
                    <h5>ส่วนลด</h5>
                    <p>20฿</p>
                  </v-col>

                  <v-col cols="12" class="text-yellow-400">
                    <h5>ยอดที่ต้องชำระ</h5>
                    <p>4,079฿</p>
                  </v-col>
                </v-row>

                <!-- ฟอร์มการชำระเงิน -->
                <v-row>
                  <v-col cols="12">
                    <v-text-field
                      label="เลขที่อ้างอิงธนาคาร"
                      outlined
                      dense
                      class="mb-2"
                    />
                  </v-col>
                  <v-col cols="12">
                    <v-select
                      :items="banks"
                      label="ธนาคาร"
                      outlined
                      dense
                      class="mb-2"
                    />
                  </v-col>
                  <v-col cols="6">
                    <v-text-field
                      label="ชื่อบัญชีธนาคาร"
                      outlined
                      dense
                      class="mb-2"
                    />
                  </v-col>
                  <v-col cols="6">
                    <v-text-field
                      label="จำนวนเงินโอน"
                      outlined
                      dense
                      class="mb-2"
                    />
                  </v-col>
                  <v-col cols="6">
                    <v-text-field
                      label="วันที่โอน"
                      outlined
                      dense
                      class="mb-2"
                    />
                  </v-col>
                  <v-col cols="6">
                    <v-text-field label="เวลาโอน" outlined dense class="mb-2" />
                  </v-col>
                </v-row>

                <!-- ปุ่มยกเลิกและยืนยัน -->
                <v-row class="mt-4">
                  <v-col cols="6">
                    <v-btn class="w-full text-white bg-red-600">ยกเลิก</v-btn>
                  </v-col>
                  <v-col cols="6">
                    <v-btn class="w-full text-white bg-gray-400" disabled
                      >ส่งคำสั่ง</v-btn
                    >
                  </v-col>
                </v-row>
              </v-card>
            </v-col>

            <!-- คอลัมน์ขวา -->
            <v-col cols="12" md="5">
              <v-card class="p-4 text-white bg-gray-900">
                <div class="text-center">
                  <h5 class="mb-4">หลักฐานการชำระเงิน</h5>
                  <v-btn class="mb-4 text-white bg-yellow-500"
                    >อัปโหลดหลักฐาน</v-btn
                  >
                  <div class="p-4 border-2 border-yellow-400 border-dashed">
                    <p class="text-gray-400">ลากไฟล์เพื่ออัปโหลด</p>
                    <p class="text-xs text-gray-500">
                      *ไฟล์ .jpg, .png, .pdf ขนาดไม่เกิน 5MB
                    </p>
                  </div>
                </div>
              </v-card>
            </v-col>
          </v-row>
        </section>
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";
import { ref } from "vue";

const step = ref(1);
const nextStep = () => {
  if (step.value < 3) {
    step.value += 1;
  } else {
    console.log("Step");
  }
};
const selectedPackage = ref("");

const selectPackage = (peymentList) => {
  selectedPackage.value = peymentList.name;
};
const paymentChannels = ref([{ name: "บัญชีธนาคาร" }, { name: "QR Code" }]);

const paymentBank = ref([{ name: "บัญชีธนาคาร" }, { name: "QR Code" }]);

defineOptions({
  layout: LayoutAuthenticate,
});

// Define the reactive properties
const referralCode = ref("MONDAY15");
const packagePrice = "3,200";
const discount = "-20";
const totalPrice = "4,099";
const finalPrice = "4,079.00";
</script>


<style scoped>
hr {
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
