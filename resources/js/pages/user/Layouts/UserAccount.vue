<template>
  <v-app>
    <!-- Left Navigation Bar -->
    <NavbarLeftUser></NavbarLeftUser>

    <!-- Main Content -->
    <v-main>
      <!-- Top Navigation Bar -->
      <NavbarTopUser />

      <!-- Main Dashboard Content -->
      <div class="p-4 text-lg lg:p-16 main-content-dashboard">
        <v-container>
          <v-row>
            <v-col cols="12">
              <v-card class="p-4 shadow-md main-content">
                <!-- Profile Section -->
                <v-row class="align-center">
                  <v-col cols="auto">
                    <v-avatar size="100" class="mr-2">
                      <img
                        src="@/assets/icon/testteeruk.png"
                        alt="Profile Image"
                      />
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
                      <span class="ml-5 text-sm text-gray-400"
                        >หมดอายุ: 15/02/2568</span
                      >
                    </div>
                  </v-col>
                </v-row>
                <hr class="mt-5" />

                <!-- Information Cards -->
                <v-row class="mt-4">
                  <v-col cols="12" md="4">
                    <!-- Personal Information -->
                    <v-card class="information-cards">
                      <v-card-title class="justify-between d-flex">
                        <b>ข้อมูลส่วนตัว</b>
                        <a href="/account/profile">
                          <img
                            src="@/assets/icon/edit.png"
                            alt="Edit Icon"
                            class="icon-edit"
                          />
                        </a>
                      </v-card-title>
                      <v-card-text>
                        <v-row>
                          <v-col cols="12">
                            <div class="flex justify-between">
                              <span><b>ชื่อ-นามสกุล:</b></span>
                              <p>
                                {{ data_user.first_name }}
                                {{ data_user.last_name }}
                              </p>
                            </div>
                            <div class="flex justify-between">
                              <span><b>เบอร์โทร:</b></span>
                              <p>{{ data_user.phone }}</p>
                            </div>
                            <div class="flex justify-between">
                              <span><b>อีเมล:</b></span>
                              <p>{{ data_user.email }}</p>
                            </div>
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </v-col>

                  <!-- Bank Details -->
                  <v-col cols="12" md="4">
                    <v-card class="information-cards">
                      <v-card-title class="justify-between d-flex">
                        <b>บัญชีธนาคาร</b>
                        <a href="/account/profile/bank">
                          <img
                            src="@/assets/icon/edit.png"
                            alt="Edit Icon"
                            class="icon-edit"
                          />
                        </a>
                      </v-card-title>
                      <v-card-text>
                        <v-row>
                          <v-col cols="12">
                            <div class="flex justify-between">
                              <span><b>ชื่อบัญชี:</b></span>
                              <p>{{ data_user.bank_account_name }}</p>
                            </div>
                            <div class="flex justify-between">
                              <span><b>ธนาคาร:</b></span>
                              <p>{{ data_user.bank_name }}</p>
                            </div>
                            <div class="flex justify-between">
                              <span><b>เลขที่บัญชี:</b></span>
                              <p>{{ data_user.bank_account_number }}</p>
                            </div>
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </v-col>

                  <!-- Package Information -->
                  <v-col cols="12" md="4">
                    <v-card class="information-cards">
                      <v-card-title class="justify-between d-flex">
                        <b>ข้อมูลแพ็กเกจ</b>
                        <a href="/account/profile/package">
                          <img
                            src="@/assets/icon/edit.png"
                            alt="Edit Icon"
                            class="icon-edit"
                          />
                        </a>
                      </v-card-title>
                      <v-card-text>
                        <v-row>
                          <v-col cols="12">
                            <div class="flex justify-between">
                              <span><b>ชื่อแพ็กเกจ:</b></span>
                              <p>{{ data_package.name }}</p>
                            </div>
                            <div class="flex justify-between">
                              <span><b>อายุใช้งาน:</b></span>
                              <p>{{ data_package.age }} ปี</p>
                            </div>
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </v-col>
                </v-row>
              </v-card>
            </v-col>
          </v-row>

          <!-- Financial Status Cards -->
          <div
            class="grid grid-cols-1 gap-6 py-3 mx-0 mt-3 mb-0 lg:grid-cols-4 sm:grid-cols-2 md:grid-cols-3"
          >
            <div class="flex items-center justify-center card-status">
              <div class="flex items-center justify-center space-x-4">
                <img src="@/assets/icon/icon-wallet.png" alt="" class="icon" />

                <div class="text-left">
                  <div class="text-sm text-white">ยอดเงินคงเหลือ</div>
                  <div class="text-xl font-bold text-white">
                    ฿ {{ data_user.remaining_balance }}
                  </div>
                </div>
              </div>
            </div>

            <div class="flex items-center justify-center card-status">
              <div class="flex items-center justify-center space-x-4">
                <img src="@/assets/icon/icon-money.png" alt="" class="icon" />
                <div class="text-left">
                  <div class="text-sm text-white">ค่าคอมมิชชั่น</div>
                  <div class="mt-2 text-xl font-bold text-white">
                    ฿ {{ data_user.commission }}
                  </div>
                  <div class="flex">
                    <img
                      src="@/assets/icon/iconbuy.png"
                      alt=""
                      class="w-3 h-3 mt-2"
                    />
                    <div class="ml-2 text-[#34A853]">6.62%</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex items-center justify-center card-status">
              <div class="flex items-center justify-center space-x-4">
                <img src="@/assets/icon/icon-money.png" alt="" class="icon" />
                <div class="text-left">
                  <div class="text-sm text-white">ซื้อ</div>
                  <div class="mt-2 text-xl font-bold text-white">
                    ฿ {{ data_user.buy }}
                  </div>
                  <div class="flex">
                    <img
                      src="@/assets/icon/iconbuy.png"
                      alt=""
                      class="w-3 h-3 mt-2"
                    />
                    <div class="ml-2 text-[#34A853]">6.62%</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex items-center justify-center card-status">
              <div class="flex items-center justify-center space-x-4">
                <img src="@/assets/icon/icon-money.png" alt="" class="icon" />
                <div class="text-left">
                  <div class="text-sm text-white">ซื้อ</div>
                  <div class="mt-2 text-xl font-bold text-white">
                    ฿ {{ data_user.buy }}
                  </div>
                  <div class="flex">
                    <img
                      src="@/assets/icon/iconbuy.png"
                      alt=""
                      class="w-3 h-3 mt-2"
                    />
                    <div class="ml-2 text-[#34A853]">6.62%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Account Table -->
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
hr {
  border-top: 1px solid #a4a4a4;
}

.text-left {
  @apply flex flex-col;
}

@media (min-width: 640px) {
  .information-cards {
    /* background-color: #ff0000; */
    color: #ffffff;
    display: grid;
  }
}
</style>
