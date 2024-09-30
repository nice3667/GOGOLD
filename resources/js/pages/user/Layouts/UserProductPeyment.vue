<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main class="main-content-admin-dashboard">
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <v-container class="text-lg main-content-admin-dashboard pa-10" fluid>
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
          <div class="grid grid-cols-1 gap-0 px-15 lg:grid-cols-2">
            <v-row class="grid items-center justify-center p-4">
              <v-col cols="12">
                <h2 class="text-lg font-bold text-white">ช่องทางชำระเงิน</h2>

                <!-- Card for order summary -->
                <div class="mt-3">
                  <!-- Payment Channel List -->
                  <div class="flex flex-row justify-between card-bank-peyment">
                    <v-list-item
                      v-for="(peymentList, index) in paymentChannels"
                      :key="index"
                      @click="selectPackage(peymentList)"
                      class="w-[45%] mx-2"
                      :class="[
                        ' border border-white rounded-lg card-bank-peyment',
                        {
                          'selected-package':
                            selectedPackage === peymentList.name,
                        },
                      ]"
                    >
                      <v-list-item-content>
                        <v-list-item-title
                          class="text-center text-white text-bank-peyment"
                        >
                          {{ peymentList.name }}
                        </v-list-item-title>
                      </v-list-item-content>
                    </v-list-item>
                  </div>
                </div>
                <!-- Content based on selected payment channel -->
                <div class="h-[200px]">
                  <div
                    v-if="selectedPackage === 'บัญชีธนาคาร'"
                    class="content-bank"
                  >
                    <div>
                      <!-- Payment Channel List -->
                      <div
                        class="flex items-center justify-center mt-5 rounded-lg payment-card-list"
                      >
                        <div
                          v-for="(paymentBankItem, index) in paymentBank"
                          :key="index"
                          @click="selectBank(paymentBankItem)"
                          class="img-bank-peyment"
                          :class="{
                            'border-bank-peyment':
                              selectedBank === paymentBankItem.name,
                            'unborder-bank-peyment':
                              selectedBank !== paymentBankItem.name,
                          }"
                        >
                          <div class="flex justify-between">
                            <img
                              :src="paymentBankItem.icon"
                              alt="Bank Icon"
                              class="img-bank-peyment"
                            />
                          </div>
                        </div>
                      </div>
                      <!-- Selected Bank Details -->
                      <div
                        v-if="selectedBank"
                        class="p-4 mt-5 text-white rounded-lg selected-bank-details"
                      >
                        <div class="flex items-center">
                          <img
                            :src="selectedBankDetails.icon"
                            alt="Selected Bank Icon"
                            class="w-20 h-20 mr-4"
                          />
                          <div>
                            <div>
                              ชื่อบัญชี: {{ selectedBankDetails.accountName }}
                            </div>
                            <div>
                              เลขบัญชี: {{ selectedBankDetails.accountNumber }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
            <h2>ตรวจสอบคำสั่งซื้อ</h2>
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
          <div
            class="grid grid-flow-row-dense grid-cols-2 grid-rows-2 xl:grid-cols-5"
          >
            <div class="col-span-3">
              <v-col cols="12">
                <div class="text-white card-order-details">
                  <!-- Order details -->
                  <v-col cols="12">
                    <div>
                      <h2 class="text-lg font-semibold text-white">
                        เลขที่คำสั่งซื้อ: 123456789DD - 29/08/2024 17:59
                      </h2>
                    </div>
                    <div class="grid grid-rows-2 mt-5">
                      <h5 class="main-text-peyment">รายการ</h5>
                      <h4>AI Gen XIII EA เข่าแพ็กเกจ 1 ปี 3,200฿</h4>
                    </div>
                    <div class="grid grid-cols-2 mt-5">
                      <div class="grid grid-rows-2">
                        <h5 class="main-text-peyment">ราคารวม</h5>
                        <h4>4,099</h4>
                      </div>
                      <div class="grid grid-rows-2">
                        <h5 class="main-text-peyment">ส่วนลด</h5>
                        <h4>20</h4>
                      </div>
                    </div>
                    <div class="grid grid-cols-2 mt-5">
                      <div class="grid grid-rows-2">
                        <h5 class="main-text-peyment">ยอดที่ต้องชำระ</h5>
                        <h4>4,079</h4>
                      </div>
                      <div class="grid grid-rows-2">
                        <h5 class="main-text-peyment">ช่องทางการชำระเงิน</h5>
                        <h4>QR Code</h4>
                      </div>
                    </div>
                  </v-col>
                  <hr class="mt-2" />
                  <!-- Payment details form -->
                  <v-row class="mt-3">
                    <v-col cols="12" md="6">
                      <div>
                        <h5 class="main-text-peyment">เลขที่บัญชีธนาคาร</h5>
                      </div>
                      <v-text-field
                        v-model="accountNumber"
                        label="เลขที่บัญชีธนาคาร"
                        variant="outlined"
                        class="form-peyment"
                        rounded=""
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <div>
                        <h5 class="main-text-peyment">ธนาคาร</h5>
                      </div>
                      <v-text-field
                        v-model="bank"
                        label="ธนาคาร"
                        variant="outlined"
                        class="form-peyment"
                        rounded=""
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <div>
                        <h5 class="main-text-peyment">ชื่อบัญชีธนาคาร</h5>
                      </div>
                      <v-text-field
                        v-model="accountName"
                        label="ชื่อบัญชีธนาคาร"
                        variant="outlined"
                        class="form-peyment"
                        rounded=""
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <div>
                        <h5 class="main-text-peyment">จำนวนเงินที่โอน</h5>
                      </div>
                      <v-text-field
                        v-model="amount"
                        label="จำนวนเงินโอน"
                        variant="outlined"
                        class="form-peyment"
                        rounded=""
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <div>
                        <h5 class="main-text-peyment">วันที่โอน</h5>
                      </div>
                      <v-text-field
                        v-model="date"
                        label="วันที่โอน"
                        variant="outlined"
                        class="form-peyment"
                        rounded=""
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" md="6">
                      <div>
                        <h5 class="main-text-peyment">เวลาที่โอน</h5>
                      </div>
                      <v-text-field
                        v-model="time"
                        label="เวลาโอน"
                        variant="outlined"
                        class="form-peyment"
                        rounded=""
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </div>
              </v-col>
            </div>
            <div class="col-span-2">
              <!-- Proof of payment upload -->
              <v-row class="p-14">
                <v-col cols="12">
                  <div class="p-10 form-group-peyment">
                    <div class="flex justify-between">
                      <div class="text-white">
                        <h2>หลักฐานการชำระเงิน</h2>
                      </div>
                      <div>
                        <v-chip class="chip-peyment">รอการชำระเงิน</v-chip>
                      </div>
                    </div>

                    <!-- Hidden file input for selecting the file -->
                    <input
                      type="file"
                      ref="fileInput"
                      class="form-control form-control-dark"
                      @change="onFileChange"
                      style="display: none"
                    />

                    <!-- Show this if no image has been uploaded yet -->
                    <div
                      v-if="!imageShow"
                      class="flex mt-5 flex-column align-items-center justify-content-center card-image-peyment"
                      @click="triggerFileUpload"
                      style="height: 450px"
                    >
                      <img
                        src="/duangdee/images/Img_upload.png"
                        alt=""
                        class="img-fluid p-auto"
                        style="max-height: 80%; max-width: 60%"
                      />
                      <div class="text-center text-primary-600">
                        อัปโหลดสลิป
                      </div>
                    </div>

                    <!-- Image preview section if an image is uploaded -->
                    <div
                      v-if="imageShow"
                      @click="triggerFileUpload"
                      class="items-center m-auto mt-4 p-auto w-100 d-flex flex-column justify-content"
                    >
                      <img
                        class="img-fluid"
                        :src="imageShow"
                        style="max-height: 80%; max-width: 60%"
                      />
                    </div>

                    <p class="mt-4 text-center text-white f-16 f-w-500">
                      *คลิกเพื่ออัปโหลดอัปโหลด
                    </p>
                  </div>
                </v-col>
              </v-row>
            </div>
          </div>
          <v-row>
            <v-row class="" justify="center">
              <v-btn color="red darken-2" class="mr-4">ยกเลิก</v-btn>
              <v-btn color="gray darken-1" :disabled="!proofOfPayment"
                >ส่งหลักฐาน</v-btn
              >
            </v-row>
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

const accountNumber = ref("");
const bank = ref("");
const accountName = ref("");
const amount = ref("");
const date = ref("");
const time = ref("");
const proofOfPayment = ref(null); // Reactive reference to store the uploaded file

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

const selectedBank = ref("");
const selectedBankDetails = ref({
  icon: "",
  name: "",
  accountName: "",
  accountNumber: "",
});

const selectBank = (paymentBankItem) => {
  selectedBank.value = paymentBankItem.name;
  selectedBankDetails.value = paymentBankItem;
};

const paymentBank = ref([
  {
    name: "กรุงไทย",
    icon: new URL("@/assets/icon/kasikon.jpg", import.meta.url).href,
    accountName: "บริษัท กรุงไทย จำกัด",
    accountNumber: "123-456-7890",
  },
  {
    name: "กรุงศรี",
    icon: new URL("@/assets/icon/bank-scb.png", import.meta.url).href,
    accountName: "บริษัท กรุงศรี จำกัด",
    accountNumber: "987-654-3210",
  },
  {
    name: "กสิกร",
    icon: new URL("@/assets/icon/krungsri-bank.png", import.meta.url).href,
    accountName: "บริษัท กสิกร จำกัด",
    accountNumber: "555-666-7777",
  },
  {
    name: "ไทยพาณิชย์",
    icon: new URL("@/assets/icon/bank-thailand.png", import.meta.url).href,
    accountName: "บริษัท ไทยพาณิชย์ จำกัด",
    accountNumber: "123-123-1234",
  },
  {
    name: "ทีเอ็มบีธนชาต",
    icon: new URL("@/assets/icon/bank-ttb.png", import.meta.url).href,
    accountName: "บริษัท ทีเอ็มบีธนชาต จำกัด",
    accountNumber: "222-333-4444",
  },
  {
    name: "nice",
    icon: new URL("@/assets/icon/bangkok-bank.png", import.meta.url).href,
    accountName: "บริษัท ทีเอ็มบีธนชาต จำกัด",
    accountNumber: "222-333-4/444",
  },
]);
defineOptions({
  layout: LayoutAuthenticate,
});

// Define the reactive properties
const referralCode = ref("MONDAY15");
const packagePrice = "3,200";
const discount = "-20";
const totalPrice = "4,099";
const finalPrice = "4,079.00";

const imageShow = ref(null);
const slipFile = ref(null);
const fileInput = ref(null);

function onFileChange(e) {
  const file = e.target.files[0];
  if (file) {
    slipFile.value = file;
    const reader = new FileReader();
    reader.onload = (e) => {
      imageShow.value = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}

function triggerFileUpload() {
  fileInput.value.click();
}
</script>


<style scoped>
hr {
  border-top: 1px solid #a4a4a4;
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
