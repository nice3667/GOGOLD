<template>
  <v-navigation-drawer :width="330" app permanent class="text-white bg-black">
    <!-- โลโก้ด้านบนในแถบซ้าย -->
    <div class="flex items-center justify-center py-4">
      <LogoIconUser />
    </div>

    <!-- รายการเมนู -->
    <v-list class="px-5" dense>
      <v-list-item-group active-class="bg-yellow-500">
        <v-list-item v-for="(item, index) in menuItems" :key="index" rounded="" class="text-white"
          :class="route().current() == item.route ? 'list-item-admin' : ''">
          <a :href="route(item.route)" class="text-white cursor-pointer">
            <v-list-item> </v-list-item>
            <div class="flex">
              <v-icon class="mr-4 text-white">{{ item.icon }}</v-icon>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
              <!-- {{ item.title }} -->
            </div>
          </a>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>
</template>
<script setup>
console.log(route().current());
import LogoIconUser from "@/components/LogoIconUser.vue";
import LogoIcon from "@/components/LogoIcon.vue";
import { ref } from "vue";
const menuItems = ref([
  { title: "หน้าหลัก", icon: "mdi-file-chart", route: "UserHomepage" },
  { title: "แดชบอร์ด", icon: "mdi-view-dashboard", route: "UserDashboard" },
  { title: "สถิติ", icon: "mdi-cart", route: "UserStatistics" },
  { title: "คอร์สเรียน", icon: "mdi-school", route: "UserCourse" },
  { title: "บัญชีของฉัน", icon: "mdi-cog", route: "UserAccount" },
  { title: "การสั่งซื้อ", icon: "mdi-cog", route: "UserOrder" },
  { title: "ออกจากระบบ", icon: "mdi-cog", route: "logout" },
]);
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

.list-item-admin {
  border-radius: 13px;
  background-color: #ffd700;
}
</style>
