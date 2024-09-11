<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeftUser></NavbarLeftUser>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="text-lg main-content-admin-dashboard pa-5">
        <v-app class="main-content-admin-dashboard">
          <v-main>
            <FormUserProfile></FormUserProfile>
          </v-main>
        </v-app>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import FormUserProfile from "@/components/User/FormUserProfile.vue";
import NavbarLeftUser from "@/components/Dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/Dashboard/User/NavbarTopUser.vue";
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
hr {
  border-top: 1px solid #27272a;
}
p {
  font-size: 15px;
}
</style>
