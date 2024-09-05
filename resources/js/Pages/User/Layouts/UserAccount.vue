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
                  <img src="@/assets/icon/test.png" alt="" />
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
                  <v-card-title class="text-lg font-semibold information-cards">
                    <b>ข้อมูลส่วนตัว</b>
                  </v-card-title>
                  <v-card-text class="flex flex-col space-y-2">
                    <div class="flex justify-between">
                      <span><b>ชื่อ-นามสกุล:</b></span>
                      <p>{{ data_user.name }}</p>
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
                    <b>บัญชีธนาคาร</b></v-card-title
                  >
                  <v-card-text class="flex flex-col space-y-2">
                    <div class="flex justify-between">
                      <span><b>ชื่อบัญชี:</b></span>
                      <p>{{ data_user.name_bank }}n</p>
                    </div>
                    <div class="flex justify-between">
                      <span><b>ธนาคาร:</b></span>
                      <p>{{ data_user.bank }}</p>
                    </div>
                    <div class="flex justify-between">
                      <span><b>เลขที่บัญชี:</b></span>
                      <p>{{ data_user.number }}</p>
                    </div>
                  </v-card-text>
                </v-card>

                <!-- Package Information -->
                <v-card class="flex items-center information-cards">
                  <v-card-title class="text-lg font-semibold information-cards"
                    ><span>ข้อมูลแพ็กเกจ</span></v-card-title
                  >
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
          <div class="flex justify-between mt-10 main-content">
            <div class="flex items-center justify-center card-status">
              <div class="flex items-center justify-center space-x-4">
                <img src="@/assets/icon/icon1.png" alt="" class="icon" />

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
                <img src="@/assets/icon/icon2.png" alt="" class="icon" />
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
                <img src="@/assets/icon/icon2.png" alt="" class="icon" />
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
                <img src="@/assets/icon/icon2.png" alt="" class="icon" />
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
                <img src="@/assets/icon/icon3.png" alt="" class="icon" />
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
import TableAccount from "@/components/User/TableAccount.vue";
import NavbarLeftUser from "@/components/Dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/Dashboard/User/NavbarTopUser.vue";
import { ref } from "vue";
const data_user = ref({
  name: "Thitikorn Rueanmon",
  phone: "0970787580",
  email: "Thitikorncs@gmail.com",
  name_bank: "Thitikorn Rueanmon",
  bank: "กสิกรลาว",
  number: "123-123-123",
  remaining_balance: "2,456",
  commission: "1,688",
  buy: "12",
  sell: "34",
});

const data_package = ref({
  name: "EA1",
  age: "1",
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
  border-top: 2px solid #252525;
}
.content-dashboard {
  @apply bg-[#1D1D1D] p-6  flex items-center justify-center w-64 h-24;
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
@import url("https://fonts.googleapis.com/icon?family=Material+Icons");

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
</style>
