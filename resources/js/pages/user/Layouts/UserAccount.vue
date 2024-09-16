<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="p-4 text-lg lg:p-16 main-content-dashboard">
        <v-container class="main-content-dashboard">
          <v-row>
            <v-col cols="12">
              <v-card class="p-4 shadow-md main-content">
                <!-- Profile Header -->
                <v-row class="align-center">
                  <v-col cols="auto">
                    <v-avatar size="100" class="mr-2">
                      <img src="@/assets/icon/testteeruk.png" alt="" />
                    </v-avatar>
                  </v-col>
                  <v-col>
                    <h2 class="mt-2 text-lg font-semibold text-white">
                      Jackson Warateno
                    </h2>
                    <div class="mt-3 d-flex align-center">
                      <span
                        class="px-2 py-1 text-sm text-[#FF9900] bg-[#FF990040] rounded-full"
                        >Diamond</span
                      >
                      <span class="ml-5 text-sm text-gray-400">
                        หมดอายุ: 15/02/2568
                      </span>
                    </div>
                  </v-col>
                </v-row>
                <hr class="mt-5" />
                <!-- Information Cards -->
                <v-row class="mt-4">
                  <v-col cols="12" md="4">
                    <!-- Personal Information Card -->
                    <v-card class="information-cards">
                      <v-card-title class="justify-between d-flex">
                        <b>ข้อมูลส่วนตัว</b>
                        <a href="/account/profile">
                          <img
                            src="@/assets/icon/edit.png"
                            alt=""
                            class="icon-edit"
                          />
                        </a>
                      </v-card-title>
                      <v-card-text>
                        <v-row class="flex-col sm:flex-row">
                          <v-col class="justify-between d-flex">
                            <span><b>ชื่อ-นามสกุล:</b></span>
                            <p>
                              {{ data_user.first_name }}
                              {{ data_user.last_name }}
                            </p>
                          </v-col>
                          <v-col class="justify-between d-flex">
                            <span><b>เบอร์โทร:</b></span>
                            <p>{{ data_user.phone }}</p>
                          </v-col>
                          <v-col class="justify-between d-flex">
                            <span><b>อีเมล:</b></span>
                            <p>{{ data_user.email }}</p>
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </v-col>

                  <!-- Bank Details Card -->
                  <v-col cols="12" md="4">
                    <v-card class="information-cards">
                      <v-card-title class="justify-between d-flex">
                        <b>บัญชีธนาคาร</b>
                        <a href="/account/profile">
                          <img
                            src="@/assets/icon/edit.png"
                            alt=""
                            class="icon-edit"
                          />
                        </a>
                      </v-card-title>
                      <v-card-text>
                        <v-row class="flex-col sm:flex-row">
                          <v-col class="justify-between d-flex">
                            <span><b>ชื่อบัญชี:</b></span>
                            <p>{{ data_user.bank_account_name }}</p>
                          </v-col>
                          <v-col class="justify-between d-flex">
                            <span><b>ธนาคาร:</b></span>
                            <p>{{ data_user.bank_name }}</p>
                          </v-col>
                          <v-col class="justify-between d-flex">
                            <span><b>เลขที่บัญชี:</b></span>
                            <p>{{ data_user.bank_account_number }}</p>
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </v-col>

                  <!-- Package Information Card -->
                  <v-col cols="12" md="4">
                    <v-card class="information-cards">
                      <v-card-title class="justify-between d-flex">
                        <b>ข้อมูลแพ็กเกจ</b>
                        <a href="/account/profile">
                          <img
                            src="@/assets/icon/edit.png"
                            alt=""
                            class="icon-edit"
                          />
                        </a>
                      </v-card-title>
                      <v-card-text>
                        <v-row class="flex-col sm:flex-row">
                          <v-col class="justify-between d-flex">
                            <span><b>ชื่อแพ็กเกจ:</b></span>
                            <p>{{ data_package.name }}</p>
                          </v-col>
                          <v-col class="justify-between d-flex">
                            <span><b>อายุใช้งาน:</b></span>
                            <p>{{ data_package.age }} ปี</p>
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </v-col>
                </v-row>
              </v-card>
            </v-col>
          </v-row>

          <div
            class="grid grid-cols-1 py-3 mx-0 mt-3 mb-0 lg:grid-cols-5 sm:grid-cols-2 md:grid-cols-3"
          >
            <div class="pr-2">
              <v-card class="card-status">
                <v-card-text>
                  <v-row class="align-center">
                    <v-col cols="auto">
                      <img
                        src="@/assets/icon/icon-wallet.png"
                        alt=""
                        class="icon"
                      />
                    </v-col>
                    <v-col>
                      <p class="text-sm text-white">ยอดเงินคงเหลือ</p>
                      <p class="text-xl font-bold text-white">
                        ฿ {{ data_user.remaining_balance }}
                      </p>
                    </v-col>
                  </v-row>
                </v-card-text>
              </v-card>
            </div>

            <div class="px-2">
              <v-card class="card-status">
                <v-row class="align-center">
                  <v-col cols="auto">
                    <img
                      src="@/assets/icon/icon-money.png"
                      alt=""
                      class="icon"
                    />
                  </v-col>
                  <v-col>
                    <p class="text-sm text-white">ค่าคอมมิชชั่น</p>
                    <p class="text-xl font-bold text-white">
                      ฿ {{ data_user.commission }}
                    </p>
                    <div class="d-flex">
                      <img
                        src="@/assets/icon/iconbuy.png"
                        alt=""
                        class="w-3 h-3 mt-2"
                      />
                      <span class="ml-2 text-[#34A853]">6.62%</span>
                    </div>
                  </v-col>
                </v-row>
              </v-card>
            </div>
            <div class="px-2">
              <v-card class="card-status">
                <v-row class="align-center">
                  <v-col cols="auto">
                    <img
                      src="@/assets/icon/icon-money.png"
                      alt=""
                      class="icon"
                    />
                  </v-col>
                  <v-col>
                    <p class="text-sm text-white">ค่าคอมมิชชั่น</p>
                    <p class="text-xl font-bold text-white">
                      ฿ {{ data_user.commission }}
                    </p>
                    <div class="d-flex">
                      <img
                        src="@/assets/icon/iconbuy.png"
                        alt=""
                        class="w-3 h-3 mt-2"
                      />
                      <span class="ml-2 text-[#34A853]">6.62%</span>
                    </div>
                  </v-col>
                </v-row>
              </v-card>
            </div>
            <div class="px-2">
              <v-card class="card-status">
                <v-row class="align-center">
                  <v-col cols="auto">
                    <img
                      src="@/assets/icon/icon-money.png"
                      alt=""
                      class="icon"
                    />
                  </v-col>
                  <v-col>
                    <p class="text-sm text-white">ค่าคอมมิชชั่น</p>
                    <p class="text-xl font-bold text-white">
                      ฿ {{ data_user.commission }}
                    </p>
                    <div class="d-flex">
                      <img
                        src="@/assets/icon/iconbuy.png"
                        alt=""
                        class="w-3 h-3 mt-2"
                      />
                      <span class="ml-2 text-[#34A853]">6.62%</span>
                    </div>
                  </v-col>
                </v-row>
              </v-card>
            </div>
            <div class="pl-2">
              <v-card class="card-status">
                <v-row class="align-center">
                  <v-col cols="auto">
                    <img
                      src="@/assets/icon/icon-money.png"
                      alt=""
                      class="icon"
                    />
                  </v-col>
                  <v-col>
                    <p class="text-sm text-white">ค่าคอมมิชชั่น</p>
                    <p class="text-xl font-bold text-white">
                      ฿ {{ data_user.commission }}
                    </p>
                    <div class="d-flex">
                      <img
                        src="@/assets/icon/iconbuy.png"
                        alt=""
                        class="w-3 h-3 mt-2"
                      />
                      <span class="ml-2 text-[#34A853]">6.62%</span>
                    </div>
                  </v-col>
                </v-row>
              </v-card>
            </div>
          </div>

          <TableAccount></TableAccount>
        </v-container>
      </div>
    </v-main>
  </v-app>
</template>


<script setup>
import TableAccount from "@/components/user/TableAccount.vue";
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import { ref, useAttrs, onMounted } from "vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

defineOptions({
  layout: LayoutAuthenticate,
});

const data_package = ref({
  name: "EA1",
  age: "1",
});

const attrs = useAttrs();

const data_user = ref({
  name: "",
  phone: "",
  email: "",
  bank_name: "",
  bank_account_name: "",
  bank_account_number: "",
  remaining_balance: "",
  commission: "",
  buy: "",
  sell: "",
});

onMounted(async () => {
  //dataUser
  data_user.value.phone = attrs.auth.user.phone;
  data_user.value.first_name = attrs.auth.user.first_name;
  data_user.value.last_name = attrs.auth.user.last_name;
  data_user.value.email = attrs.auth.user.email;
  //end
  //bank
  data_user.value.bank_name = attrs.auth.user.bank_name;
  data_user.value.bank_account_number = attrs.auth.user.bank_account_number;
  data_user.value.bank_account_name = attrs.auth.user.bank_account_name;
  //end
  //commission
  // data_user.value.commission = attrs.auth.user.commission;

  //end
});
</script>

<style scoped>
.main-content {
  background-color: #1d1d1d;
  border-radius: 16px;
  padding: 15px;
}

.information-cards {
  padding: 15px;
  border-radius: 24px;
  background-color: #27272a;
  color: #ffffff;
}

hr {
  border-top: 1px solid #a4a4a4;
}

.content-dashboard {
  @apply bg-[#1D1D1D] p-6 flex items-center justify-center w-64 h-24;
  border-radius: 24px;
}

.content-group-dashboard {
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

.card-status {
  width: 100%;
  height: 114px;
  background-color: #1d1d1d;
  border-radius: 24px;
}

.icon {
  @apply w-12 h-12;
}

.text-left {
  @apply flex flex-col;
}

.icon-edit {
  width: 49px;
  height: 23px;
}

/* xs */
@media (min-width: 475px) {
}

@media (min-width: 640px) {
  /* .information-cards {
    padding: 15px;
    border-radius: 24px;
    background-color: #27272a;
    color: #ffffff;
  } */
}

/* md */
@media (min-width: 768px) {
}

/* lg */
@media (min-width: 1024px) {
}

/* xl */
@media (min-width: 1280px) {
}

/* 2xl */
@media (min-width: 1536px) {
}

/* 2xl */
@media (max-width: 1536px) {
}

/* xl */
@media (max-width: 1280px) {
}

/* lg */
@media (max-width: 1024px) {
}

/* md */
@media (max-width: 768px) {
}

/* sm */
@media (max-width: 640px) {
}

/* xs */
@media (max-width: 475px) {
}

.container {
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  padding-left: 0.5rem;
  padding-right: 0.5rem;
}

/* xs */
@media (min-width: 475px) {
  .container {
    max-width: 475px;
  }
}

/* sm */
@media (min-width: 640px) {
  .container {
    max-width: 640px;
  }
}

/* md */
@media (min-width: 768px) {
  .container {
    max-width: 768px;
  }
}

/* lg */
@media (min-width: 1024px) {
  .container {
    max-width: 1024px;
  }
}

/* xl */
@media (min-width: 1280px) {
  .container {
    max-width: 1280px;
  }
}

/* 2xl */
@media (min-width: 1536px) {
  .container {
    max-width: 1536px;
  }
}

.container {
  max-width: 1536px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 0.5rem;
  padding-right: 0.5rem;
}

/* 2xl */
@media (max-width: 1536px) {
  .container {
    max-width: 1280px;
  }
}

/* xl */
@media (max-width: 1280px) {
  .container {
    max-width: 1024px;
  }
}

/* lg */
@media (max-width: 1024px) {
  .container {
    max-width: 768px;
  }
}

/* md */
@media (max-width: 768px) {
  .container {
    max-width: 640px;
  }
}

/* sm */
@media (max-width: 640px) {
  .container {
    max-width: 475px;
  }
}

/* xs */
@media (max-width: 475px) {
  .container {
    width: 100%;
  }
}
</style>
