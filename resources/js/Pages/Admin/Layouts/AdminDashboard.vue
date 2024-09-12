<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeft></NavbarLeft>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTop />

      <!-- เนื้อหาภายในหน้า -->
      <div class="text-lg main-content-admin-dashboard pa-5">
        <v-app class="main-content-admin-dashboard">
          <v-main>
            <v-container class="main-content-admin-dashboard">
              <div class="flex">
                <div class="flex main-content-admin-dashboard">
                  <div class="mr-5 content-admin-dashboard">
                    <div class="flex items-center space-x-4">
                      <img
                        src="@/assets/icon/people-icon.png"
                        alt=""
                        class="icon"
                      />

                      <div class="text-left">
                        <div class="text-sm text-gray-400">สมาชิกทั้งหมด</div>
                        <div class="text-xl font-bold text-white">350 คน</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex-1 bg-[#1D1D1D] main-content-admin-dashboard">
                  <div
                    class="flex p-6 space-x-4 bg-[#1D1D1D] content-group-admin-dashboard justify-evenly"
                  >
                    <div class="flex text-center text-white">
                      <div class="flex items-center space-x-4">
                        <img
                          src="@/assets/icon/people.svg"
                          alt=""
                          class="material-icons"
                        />
                        <div class="text-left">
                          <div class="text-sm text-gray-400">
                            สมัครใหม่วันนี้
                          </div>
                          <div class="text-xl font-bold text-white">20 คน</div>
                        </div>
                      </div>
                    </div>
                    <div class="flex text-center text-white">
                      <div class="flex items-center justify-center space-x-4">
                        <img
                          src="@/assets/icon/people.svg"
                          alt=""
                          class="material-icons"
                        />
                        <div class="text-left">
                          <div class="text-sm text-gray-400">
                            สมัครใหม่วันนี้
                          </div>
                          <div class="text-xl font-bold text-white">20 คน</div>
                        </div>
                      </div>
                    </div>
                    <hr />
                    <div class="flex text-center text-white">
                      <div class="flex items-center justify-center space-x-4">
                        <img
                          src="@/assets/icon/people.svg"
                          alt=""
                          class="material-icons"
                        />
                        <div class="text-left">
                          <div class="text-sm text-gray-400">
                            สมัครใหม่วันนี้
                          </div>
                          <div class="text-xl font-bold text-white">20 คน</div>
                        </div>
                      </div>
                    </div>

                    <img
                      src="@/assets/icon/people.svg"
                      alt=""
                      class="material-icons"
                    />
                    <div class="flex items-center">
                      <a href="#" class="text-[#FFD700]">ดูรายละเอียด</a>
                      <img
                        src="@/assets/icon/ssr.png"
                        alt=""
                        class="w-4 h-4 ml-2"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="grid grid-flow-row-dense grid-cols-3 grid-rows-3">
                <div class="col-span-2">
                  <LineChart></LineChart>
                </div>
                <div class="mt-5">
                  <DonutChart></DonutChart>
                </div>
              </div>
            </v-container>
          </v-main>
        </v-app>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import DonutChart from "@/components/Dashboard/Admin/DonutChart.vue";
import LineChart from "@/components/Dashboard/Admin/LineChart.vue";
import NavbarLeft from "@/components/Dashboard/Admin/NavbarLeft.vue";
import NavbarTop from "@/components/Dashboard/Admin/NavbarTop.vue";
</script>

244,244,244,244

<style scoped>
hr {
  border-top: 2px;
  color: #ffffff;
}
.content-admin-dashboard {
  @apply bg-[#1D1D1D] p-6  flex items-center justify-center w-64 h-24;
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
@import url("https://fonts.googleapis.com/icon?family=Material+Icons");

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
