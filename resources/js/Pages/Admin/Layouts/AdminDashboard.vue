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
              <div class="flex space-x-4">
                <div
                  class="flex justify-start space-x-4 main-content-admin-dashboard"
                >
                  <div class="card1">
                    <div class="flex items-center space-x-4">
                      <img src="@/assets/icon/3.svg" alt="" class="icon" />

                      <div class="text-left">
                        <div class="text-sm text-gray-400">สมาชิกทั้งหมด</div>
                        <div class="text-xl font-bold text-white">350 คน</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex p-6 space-x-4 bg-gray-800 rounded-lg">
                  <div class="flex-1 text-center text-white">
                    <div class="flex items-center justify-center space-x-4">
                      <img
                        src="@/assets/icon/people.svg"
                        alt=""
                        class="material-icons"
                      />
                      <div class="text-left">
                        <div class="text-sm text-gray-400">สมัครใหม่วันนี้</div>
                        <div class="text-xl font-bold text-white">20 คน</div>
                      </div>
                    </div>
                  </div>
                  <div class="flex-1 text-center text-white">
                    <div class="flex items-center justify-center space-x-4">
                      <img
                        src="@/assets/icon/people.svg"
                        alt=""
                        class="material-icons"
                      />
                      <div class="text-left">
                        <div class="text-sm text-gray-400">สมัครใหม่วันนี้</div>
                        <div class="text-xl font-bold text-white">20 คน</div>
                      </div>
                    </div>
                  </div>
                  <div class="flex-1 text-center text-white">
                    <div class="flex items-center justify-center space-x-4">
                      <img
                        src="@/assets/icon/people.svg"
                        alt=""
                        class="material-icons"
                      />
                      <div class="text-left">
                        <div class="text-sm text-gray-400">สมัครใหม่วันนี้</div>
                        <div class="text-xl font-bold text-white">20 คน</div>
                      </div>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <a href="#" class="text-yellow-500">ดูรายละเอียด</a>
                  </div>
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
import NavbarLeft from "@/components/Dashboard/Admin/NavbarLeft.vue";
import NavbarTop from "@/components/Dashboard/Admin/NavbarTop.vue";
</script>

<style scoped>
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
