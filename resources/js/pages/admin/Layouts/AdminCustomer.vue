<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeft></NavbarLeft>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTop />

      <!-- เนื้อหาภายในหน้า -->
      <div class="text-lg main-content-admin-dashboard pa-1">
        <v-app class="main-content-admin-dashboard">
          <v-main>
            <v-container>
              <h1>Main Content</h1>
            </v-container>
          </v-main>
        </v-app>
      </div>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeft from "@/components/dashboard/Admin/NavbarLeft.vue";
import NavbarTop from "@/components/dashboard/Admin/NavbarTop.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

defineOptions({
  layout: LayoutAuthenticate,
});
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
