<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main class="h-full main-content-admin-dashboard">
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <v-container
        class="h-full text-lg main-content-admin-dashboard pa-10"
        fluid
      >
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
                    <div class="ml-4">
                      <div class="grid grid-rows-3">
                        <div>
                          <h2 class="text-white">
                            {{ package_data.package_name }}
                          </h2>
                        </div>
                        <div>
                          <h4 class="mt-1 text-white">
                            {{ package_data.package_month }}
                          </h4>
                        </div>
                        <div class="mt-1">
                          <h2 class="text-white">
                            ฿ {{ package_data.package_price }}
                          </h2>
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
                    <span class="text-lg text-white">{{
                      package_data.package_name
                    }}</span>
                    <span class="text-white"
                      >{{ package_data.package_price }} ฿</span
                    >
                  </div>

                  <!-- Friend Code Discount -->
                  <div class="flex justify-between">
                    <span class="text-lg text-white">โค้ดแนะนำเพื่อน</span>
                    <span class="text-white">{{ discount }} ฿</span>
                  </div>
                  <hr class="my-4 border-gray-600" />

                  <!-- Total Price -->
                  <div class="flex justify-between mt-5">
                    <span class="text-lg text-white">ราคาทั้งหมด</span>
                    <span class="text-white">{{ totalPrice }} ฿</span>
                  </div>

                  <!-- Total Discount -->
                  <div class="flex justify-between">
                    <span class="text-lg text-white">ส่วนลดทั้งหมด</span>
                    <span class="text-white">{{ totalDiscount }} ฿</span>
                  </div>

                  <!-- Final Payment -->
                  <div class="flex justify-between mt-5 font-bold">
                    <span class="text-white">ยอดชำระทั้งหมด</span>
                    <span class="text-white">{{ finalPrice }} ฿</span>
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
            <div class="p-4 mt-0">
              <div>
                <h2 class="text-lg font-bold text-white">ช่องทางชำระเงิน</h2>

                <!-- Card for order summary -->
                <div class="grid grid-cols-1">
                  <!-- Payment Channel List -->
                  <div class="flex flex-row gap-3 card-bank-peyment">
                    <v-list-item
                      v-for="(peymentList, index) in paymentChannels"
                      :key="index"
                      @click="selectPayment(peymentList)"
                      :class="[
                        ' border border-white rounded-lg card-bank-peyment',
                        {
                          'selected-package':
                            selectedPayment === peymentList.name,
                          'unselected-package':
                            selectedPayment !== peymentList.name,
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
                <div>
                  <!-- bank -->
                  <div
                    v-if="selectedPayment === 'บัญชีธนาคาร'"
                    class="content-bank"
                  >
                    <div>
                      <!-- Payment Channel List -->
                      <div
                        class="flex items-center justify-between mt-5 rounded-lg payment-card-list"
                      >
                        <div
                          v-for="(paymentBankItem, index) in paymentBank"
                          :key="index"
                          @click="selectBank(paymentBankItem)"
                          :class="{
                            'border-bank-peyment':
                              selectedBank === paymentBankItem.name,
                            'unborder-bank-peyment':
                              selectedBank !== paymentBankItem.name,
                          }"
                        >
                          <img
                            :src="paymentBankItem.icon"
                            alt="Bank Icon"
                            class="img-bank-peyment"
                          />
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
                  <!-- Qr code -->
                  <div
                    v-if="selectedPayment === 'QR Code'"
                    class="content-bank"
                  >
                    <div class="flex mt-5 rounded-lg payment-card-list">
                      <div
                        class="grid justify-center w-full grid-rows-2 text-white rounded-lg selected-rq-details"
                      >
                        <!-- QR Code Image -->
                        <v-row class="text-center">
                          <v-col>
                            <img
                              src="@/assets/icon/QRCODEnice.jpg"
                              alt="QR
                                              Code"
                              class="mx-auto rounded-lg icon-qr-code"
                            />
                          </v-col>
                        </v-row>

                        <!-- Payment Details -->
                        <v-row class="mt-4 text-center">
                          <v-col>
                            <p>
                              <strong>Account Name:</strong> บริษัท แท็กซี
                              เอสเอ็มเอส
                            </p>
                            <p><strong>Amount:</strong> 16,015.00 บาท</p>
                            <p class="font-bold text-yellow-500">
                              กรุณาชำระภายใน
                            </p>
                            <p class="mt-2 text-lg">
                              Time left:
                              <span id="time">{{ countdown }}</span>
                            </p>
                            <p class="mt-2 text-sm text-gray-400">
                              Expires: 01 March 2024, 14:40
                            </p>
                          </v-col>
                        </v-row>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Referral Code Section -->
              </div>
            </div>
            <div>
              <v-row class="grid justify-center">
                <v-col cols="12">
                  <v-card class="card-order-payment">
                    <h2 class="text-2xl font-bold text-white">
                      สรุปยอดการชำระ
                    </h2>

                    <!-- Package Details -->
                    <div class="flex justify-between mt-4">
                      <span class="text-lg text-white">
                        {{ package_data.package_name }}</span
                      >
                      <span class="text-white">{{
                        package_data.package_price
                      }}</span>
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
                      <span class="text-white"> {{ finalPrice }} ฿</span>
                    </div>

                    <!-- Payment Button -->
                    <v-btn class="w-full mt-5 btn-payment" @click="nextStep">
                      ยืนยันรายการสั่งซื้อ
                    </v-btn>
                    <v-btn class="w-full mt-5 btn-unpayment" @click="backStep">
                      ยกเลิกคำสั่งซื้อ
                    </v-btn>
                  </v-card>
                </v-col>
              </v-row>
            </div>
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
          <div class="grid grid-flow-row-dense grid-cols-2 xl:grid-cols-5">
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
                      <h4>
                        {{ package_data.package_name }}
                        เช่า
                        {{ package_data.package_month }}
                        {{ package_data.package_price }}฿
                      </h4>
                    </div>
                    <div class="grid grid-cols-2 mt-5">
                      <div class="grid grid-rows-2">
                        <h5 class="main-text-peyment">ราคารวม</h5>
                        <h4>{{ package_data.package_price }}</h4>
                      </div>
                      <div class="grid grid-rows-2">
                        <h5 class="main-text-peyment">ส่วนลด</h5>
                        <h4>{{ discount }}</h4>
                      </div>
                    </div>
                    <div class="grid grid-cols-2 mt-5">
                      <div class="grid grid-rows-2">
                        <h5 class="main-text-peyment">ยอดที่ต้องชำระ</h5>
                        <h4>{{ totalAmountToBePaid }}</h4>
                      </div>
                      <div class="grid grid-rows-2">
                        <h5 class="main-text-peyment">ช่องทางการชำระเงิน</h5>
                        <h4>{{ payment_data.payment_bank }}</h4>
                      </div>
                    </div>
                  </v-col>
                  <hr class="mt-2" />
                  <!-- Payment details form -->
                  <div class="mt-3">
                    <div class="grid justify-between grid-cols-2 gap-x-8">
                      <div>
                        <div>
                          <h5 class="main-text-peyment">เลขที่บัญชีธนาคาร</h5>
                        </div>
                        <v-text-field
                          v-model="account_number"
                          label="เลขที่บัญชีธนาคาร"
                          variant="outlined"
                          class="form-peyment"
                          rounded=""
                        ></v-text-field>
                      </div>
                      <div>
                        <div>
                          <h5 class="main-text-peyment">ธนาคาร</h5>
                        </div>
                        <v-text-field
                          v-model="bank_name"
                          label="ธนาคาร"
                          variant="outlined"
                          class="form-peyment"
                          rounded=""
                        ></v-text-field>
                      </div>
                      <div>
                        <div>
                          <h5 class="main-text-peyment">ชื่อบัญชีธนาคาร</h5>
                        </div>
                        <v-text-field
                          v-model="account_name"
                          label="ชื่อบัญชีธนาคาร"
                          variant="outlined"
                          class="form-peyment"
                          rounded=""
                        ></v-text-field>
                      </div>
                      <div>
                        <div>
                          <h5 class="main-text-peyment">จำนวนเงินที่โอน</h5>
                        </div>
                        <v-text-field
                          v-model="transfer_money"
                          label="จำนวนเงินโอน"
                          variant="outlined"
                          class="form-peyment"
                          rounded=""
                        ></v-text-field>
                      </div>
                      <div>
                        <div>
                          <h5 class="main-text-peyment">วันที่โอน</h5>
                        </div>
                        <v-text-field
                          v-model="transfer_date"
                          label="วันที่โอน"
                          variant="outlined"
                          class="form-peyment"
                          rounded=""
                        ></v-text-field>
                      </div>
                      <div>
                        <div>
                          <h5 class="main-text-peyment">เวลาที่โอน</h5>
                        </div>
                        <v-text-field
                          v-model="transfer_time"
                          label="เวลาโอน"
                          variant="outlined"
                          class="form-peyment"
                          rounded=""
                        ></v-text-field>
                      </div>
                    </div>
                  </div>
                </div>
              </v-col>
            </div>
            <!-- อัพโหลดสลิป -->
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
                      @change="handleFileChange"
                      style="display: none"
                    />

                    <!-- Show this if no image has been uploaded yet -->
                    <div
                      v-if="!uploadedImage"
                      class="flex justify-center mt-5 flex-column align-center card-image-peyment"
                      @click="triggerFileUpload"
                      style="height: 450px"
                    >
                      <img
                        src="/duangdee/images/Img_upload.png"
                        alt=""
                        class="img-fluid p-auto"
                        style="max-height: 80%; max-width: 60%"
                      />
                      <div class="text-center text-white">อัปโหลดสลิป</div>
                    </div>

                    <!-- Image preview section if an image is uploaded -->
                    <div
                      v-if="uploadedImage"
                      @click="triggerFileUpload"
                      class="flex justify-center mt-4 flex-column align-center w-100"
                      style="height: 450px"
                    >
                      <img
                        class="img-fluid"
                        :src="uploadedImage"
                        style="max-height: 100%; max-width: 100%"
                      />
                    </div>

                    <p class="mt-4 text-center text-white f-16 f-w-500">
                      *คลิกเพื่ออัปโหลดสลิป
                    </p>
                  </div>
                </v-col>
              </v-row>
            </div>
          </div>
          <v-row>
            <v-row class="mt-10 gap-[16px]" justify="center">
              <v-btn class="button-cancel-purchase" @click="backStep">
                ยกเลิก
              </v-btn>
              <v-btn
                :class="{
                  'button-send-evidence': !isFormComplete,
                  'button-send-evidence-complete': isFormComplete,
                }"
                @click="submitForm"
              >
                ส่งหลักฐานการโอน
              </v-btn>
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
import { usePaymentStore } from "@/stores/usePaymentStore";
import { useRoute } from "vue-router";
import { ref, computed } from "vue";
import { reactive, onMounted } from "vue";
import axios from "axios";

// เรียกใช้ Pinia Store
const store_payment = usePaymentStore();

onMounted(() => {
  console.log("Package:", package_data.value);
});
// ตรวจสอบว่าได้ค่าจาก Store หรือไม่
const package_data = computed(() => {
  const storedPackage = localStorage.getItem("package");
  console.log("Retrieved package_data:", storedPackage);
  return storedPackage ? JSON.parse(storedPackage) : "ไม่พบข้อมูลแพ็กเกจ";
});

const totalPrice = computed(() => package_data.package_price);
const totalDiscount = computed(() => discount.value);
const finalPrice = computed(() => totalPrice.value - totalDiscount.value);
const totalAmountToBePaid = computed(() => {
  console.log("Package Price:", package_data.package_price);
  console.log("Package", package_data.value.package_price);
  console.log("Discount:", discount.value);
  console.log("Package Data:", package_data.value);

  const packagePrice = package_data.value.package_price || 0;
  const discountValue = discount.value || 0;

  const finalAmount = packagePrice - discountValue;

  return finalAmount >= 0 ? finalAmount : 0;
});

const discount = ref("30");
const account_number = ref("");
const bank_name = ref("");
const account_name = ref("");
const transfer_money = ref("");
const transfer_date = ref("");
const transfer_time = ref("");
const image_path = ref(null);
const uploadedImage = ref(null);
const isFormComplete = computed(() => {
  return (
    account_number.value &&
    bank_name.value &&
    account_name.value &&
    transfer_money.value &&
    transfer_date.value &&
    transfer_time.value &&
    image_path.value // ตรวจสอบว่าอัปโหลดไฟล์แล้ว
  );
});
//doc_purchase

const submitForm = async () => {
  if (!isFormComplete.value) return; // Prevent submission if form is incomplete

  const formData = new FormData();
  if (package_data.value && package_data.value.package_id) {
    formData.append("package_id", package_data.value.package_id);
  } else {
    console.error("Package ID is required.");
  }
  formData.append("price", package_data.value.package_price);
  if (package_data.value && package_data.value.package_price) {
    formData.append("price", package_data.value.package_price);
  } else {
    console.error("Price is required.");
  }
  formData.append("account_number", account_number.value);
  formData.append("bank_name", bank_name.value);
  formData.append("account_name", account_name.value);
  formData.append("transfer_money", transfer_money.value);
  formData.append("transfer_date", transfer_date.value);
  formData.append("transfer_time", transfer_time.value);

  const fileInput = document.querySelector("input[type='file']");
  if (fileInput.files[0]) {
    formData.append("image_path", fileInput.files[0]);
  }

  try {
    const response = await axios.post("/api/purchase/create", formData, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    });

    console.log("Success:", response.data);
  } catch (error) {
    console.error("Error submitting form:", error);
  }
};

const handleFileChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      image_path.value = file;
      uploadedImage.value = e.target.result;
    };
    reader.readAsDataURL(file);
  }
};
const triggerFileUpload = () => {
  const fileInput = document.querySelector("input[type='file']");
  fileInput.click();
};

const step = ref(1);
const nextStep = () => {
  if (step.value < 3) {
    step.value += 1;
  } else {
    console.log("Step");
  }
};
const backStep = () => {
  if (step.value > 1) {
    step.value -= 1;
  } else {
    console.log("Step Back");
  }
};
const selectedPayment = ref("");
const selectPayment = (peymentList) => {
  selectedPayment.value = peymentList.name;
  store_payment.setPackage(peymentList.name);

  // บันทึกข้อมูลใน reactive object
  payment_data.payment_bank = peymentList.name;

  // บันทึกข้อมูลลง LocalStorage
  let payment_info = {
    payment_bank: peymentList.name,
  };
  localStorage.setItem("payment", JSON.stringify(payment_info));

  // ตรวจสอบค่าที่เก็บใน payment_data
  console.log("Selected Payment Bank:", payment_data.payment_bank);
};
const payment_data = reactive({
  payment_bank: "",
});
onMounted(() => {
  const storedPayment = localStorage.getItem("payment");

  if (storedPayment) {
    const payment = JSON.parse(storedPayment);
    payment_data.payment_bank = payment.payment_bank; // อัปเดตข้อมูลใน reactive object
    console.log("Payment Bank from LocalStorage:", payment_data.payment_bank);
  }
});
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

const imageShow = ref(null);
const slipFile = ref(null);
const fileInput = ref(null);

// function onFileChange(e) {
//   const file = e.target.files[0];
//   if (file) {
//     slipFile.value = file;
//     const reader = new FileReader();
//     reader.onload = (e) => {
//       imageShow.value = e.target.result;
//     };
//     reader.readAsDataURL(file);
//   }
// }
</script>


<style scoped>
hr {
  border-top: 1px solid #a4a4a4;
}
</style>
