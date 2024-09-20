<template>
  <!-- Mobile Navigation Bar with Nav Icon -->
  <v-app-bar class="mobile-main" v-if="!is_desktop" app>
    <v-app-bar-nav-icon @click="drawer = !drawer">
      <v-icon class="icon-drawer">mdi-menu</v-icon>
    </v-app-bar-nav-icon>
    <div class="flex items-center justify-evenly pl-md-7 pl-lg-15">
      <img class="img-toolbar" src="@/assets/icon/logo-gogold.png" alt="logo" />
    </div>
  </v-app-bar>

  <!-- Mobile Drawer -->
  <v-navigation-drawer
    v-if="!is_desktop"
    app
    temporary
    v-model="drawer"
    width="200"
    class="mobile-main"
  >
    <v-app-bar-nav-icon @click="drawer = !drawer">
      <v-icon class="icon-drawer">mdi-close</v-icon>
    </v-app-bar-nav-icon>
    <v-list dense>
      <v-list-item-group active-class="bg-yellow-500">
        <v-list-item
          v-for="(item, index) in menu_items_mobile"
          :key="'mobile' + index"
          rounded=""
          :class="route().current() == item.route_name ? '' : ''"
        >
          <a
            :href="route(item.route_name)"
            class="cursor-pointer text-v-list-item-homepage"
          >
            <div class="flex ml-2">
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </div>
          </a>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>
  <v-navigation-drawer
    v-if="is_desktop"
    :width="330"
    app
    permanent
    class="text-white bg-black"
  >
    <!-- โลโก้ด้านบนในแถบซ้าย -->
    <div class="flex items-center justify-center py-4">
      <LogoIconUser />
    </div>

    <!-- รายการเมนู -->
    <v-list class="px-5" dense>
      <v-list-item-group active-class="bg-yellow-500">
        <v-list-item
          v-for="(item, index) in menuItems"
          :key="index"
          rounded=""
          class="text-white"
          :class="route().current() == item.route ? 'list-item-admin' : ''"
        >
          <a :href="route(item.route)" class="text-white cursor-pointer">
            <div class="flex items-center">
              <v-icon class="mr-4 text-white">{{ item.icon }}</v-icon>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </div>
          </a>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>
</template>
<script setup>
console.log(route().current());
import { ref, onMounted, watch } from "vue";
import LogoIconUser from "@/components/LogoIconUser.vue";
import LogoIcon from "@/components/LogoIcon.vue";
import { useDisplay } from "vuetify";

const { width } = useDisplay();
const is_desktop = ref(false);
const drawer = ref(false);
const menu_items_mobile = ref([
  { title: "หน้าหลัก", route_name: "UserHomepage" },
  { title: "แดชบอร์ด", route_name: "UserDashboard" },
  { title: "สถิติ", route_name: "UserStatistics" },
  { title: "คอร์สเรียน", route_name: "UserCourse" },
  { title: "บัญชีของฉัน", route_name: "UserAccount" },
  { title: "การสั่งซื้อ", route_name: "UserOrder" },
  { title: "ออกจากระบบ", route_name: "logout" },
]);

onMounted(() => {
  is_desktop.value = width.value > 1279;
});

watch(
  () => width.value,
  (newWidth) => {
    is_desktop.value = newWidth > 1279;
  }
);

const menuItems = ref([
  { title: "หน้าหลัก", icon: "mdi-file-chart", route: "UserHomepage" },
  { title: "แดชบอร์ด", icon: "mdi-view-dashboard", route: "UserDashboard" },
  { title: "สถิติ", icon: "mdi-cart", route: "UserStatistics" },
  { title: "คอร์สเรียน", icon: "mdi-school", route: "UserCourse" },
  { title: "บัญชีของฉัน", icon: "mdi-cog", route: "UserAccount" },
  { title: "การสั่งซื้อ", icon: "mdi-cart", route: "UserOrder" },
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
@media only screen and (max-width: 600px) {
  v-navigation-drawer {
    background-color: lightblue;
  }
}
</style>
