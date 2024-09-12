<template>
  <v-app>
    <!-- แถบเมนูด้านซ้าย -->
    <NavbarLeft></NavbarLeft>
    <!-- เนื้อหาหลัก -->
    <v-main>
      <!-- แถบเมนูด้านบน -->
      <NavbarTop />

      <!-- เนื้อหาภายในหน้า -->
      <div class="text-lg pa-1">หน้าหลัก</div>
    </v-main>
  </v-app>
</template>

<script setup>
import NavbarLeft from "@/components/dashboard/Admin/NavbarLeft.vue"
import NavbarTop from "@/components/dashboard/Admin/NavbarTop.vue"

import { ref, watch } from "vue"
import LogoIcon from "@/components/LogoIcon.vue"
import { useRouter } from "vue-router"
const menuItems = ref([
  { title: "แดชบอร์ด", icon: "mdi-view-dashboard", route: "admindashboard" },
  { title: "รายงาน", icon: "mdi-file-chart", route: "report" },
  { title: "คำสั่งซื้อ", icon: "mdi-cart", route: "order" },
  { title: "สินค้า", icon: "mdi-package-variant", route: "product" },
  { title: "แพ็กเกจ", icon: "mdi-cube-outline", route: "package" },
  { title: "บทความ", icon: "mdi-newspaper", route: "article" },
  { title: "คอร์สเรียน", icon: "mdi-school", route: "course" },
  { title: "ลูกค้า", icon: "mdi-account-group", route: "customer" },
  { title: "ตั้งค่า", icon: "mdi-cog", route: "setting" },
])

const company = ref({
  home: "หน้าหลัก",
  stats: "สถิติ",
  learn: "เรียนรู้",
  about: "เกี่ยวกับเรา",
  orderhistory: "ประวัติการสั่งซื้อ",
})
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
