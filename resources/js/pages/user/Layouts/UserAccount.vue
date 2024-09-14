<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="text-lg main-content-dashboard pa-15">
        <v-app class="main-content-dashboard">
          <div>
            <div class="p-4 bg-[#1D1D1D] main-content shadow-md">
              <!-- Profile Header -->
              <div class="flex p-4 bg-[#1D1D1D] rounded-lg">
                <v-avatar size="100" class="mr-2">
                  <img src="@/assets/icon/testteeruk.png" alt="" />
                </v-avatar>
                <div class="ml-4">
                  <h2 class="mt-2 text-lg font-semibold text-white it">
                    Jackson Warateno
                  </h2>
                  <div class="flex items-center mt-3">
                    <span
                      class="px-2 py-1 text-sm text-[#FF9900] bg-[#FF990040] rounded-full"
                      >Diamond</span
                    >
                    <div class="ml-5 text-sm text-gray-400">
                      หมดอายุ: 15/02/2568
                    </div>
                  </div>
                </div>
              </div>
              <hr />
              <!-- Information Cards -->
              <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-3">
                <!-- Personal Information -->
                <v-card class="flex items-center information-cards">
                  <v-card-title
                    class="flex flex-col text-lg font-semibold information-cards"
                  >
                    <div class="flex justify-between">
                      <b>ข้อมูลส่วนตัว</b>
                      <a href="/account/profile"
                        ><img
                          src="@/assets/icon/edit.png"
                          alt=""
                          class="icon-edit"
                      /></a>
                    </div>
                  </v-card-title>
                  <v-card-text class="flex flex-col space-y-2">
                    <div class="flex justify-between">
                      <span><b>ชื่อ-นามสกุล:</b></span>
                      <p>
                        {{ data_user.first_name }} {{ data_user.last_name }}
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
                  </v-card-text>
                </v-card>

                <!-- Bank Details -->
                <v-card class="flex items-center information-cards">
                  <v-card-title class="text-lg font-semibold information-cards">
                    <div class="flex justify-between">
                      <b>บัญชีธนาคาร</b>
                      <a href="/account/profile"
                        ><img
                          src="@/assets/icon/edit.png"
                          alt=""
                          class="icon-edit"
                      /></a>
                    </div>
                  </v-card-title>
                  <v-card-text class="flex flex-col space-y-2">
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
                  </v-card-text>
                </v-card>

                <!-- Package Information -->
                <v-card class="flex items-center information-cards">
                  <v-card-title class="text-lg font-semibold information-cards">
                    <div class="flex justify-between">
                      <span>ข้อมูลแพ็กเกจ</span>
                      <a href="/account/profile"
                        ><img
                          src="@/assets/icon/edit.png"
                          alt=""
                          class="icon-edit"
                      /></a>
                    </div>
                  </v-card-title>
                  <v-card-text class="flex flex-col space-y-2">
                    <div class="flex justify-between">
                      <span><b>ชื่อแพ็กเกจ:</b></span>
                      <p>{{ data_package.name }}</p>
                    </div>
                    <div class="flex justify-between">
                      <span><b>อายุใช้งาน:</b></span>
                      <p>{{ data_package.age }} ปี</p>
                    </div>
                  </v-card-text>
                </v-card>
              </div>
            </div>
          </div>
          <div class="flex justify-between mt-5 main-content">
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
            <div class="flex items-center justify-center card-status">
              <div class="flex items-center justify-center space-x-4">
                <img
                  src="@/assets/icon/icon-discount.png"
                  alt=""
                  class="icon"
                />
                <div class="text-left">
                  <div class="text-sm text-white">ขาย</div>
                  <div class="text-xl font-bold text-white">
                    ฿ {{ data_user.sell }}
                  </div>
                  <div class="flex">
                    <img
                      src="@/assets/icon/iconsell.png"
                      alt=""
                      class="w-3 h-3 mt-2"
                    />
                    <div class="ml-2 text-[#EA4335]">6.62%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <TableAccount></TableAccount>
        </v-app>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import TableAccount from "@/components/user/TableAccount.vue";
import NavbarLeftUser from "@/components/dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/dashboard/User/NavbarTopUser.vue";
import { ref, useAttrs, onMounted } from "vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

defineOptions({
  layout: LayoutAuthenticated,
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
  border-radius: 16px;
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
  width: 250.4px;
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
</style>
