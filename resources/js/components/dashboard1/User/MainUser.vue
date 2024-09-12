<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->

    <NavbarLeftUser></NavbarLeftUser>

    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTopUser />

      <!-- เนื้อหาภายในหน้า -->
      <div class="text-lg pa-1">หน้าหลัก</div>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeftUser from "@/components/Dashboard/User/NavbarLeftUser.vue";
import NavbarTopUser from "@/components/Dashboard/User/NavbarTopUser.vue";
</script>

<style scoped>
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
