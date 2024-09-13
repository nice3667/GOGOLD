<template>
  <!-- Mobile Navigation Bar with Nav Icon -->
  <v-app-bar class="mobile-drawer" v-if="!is_desktop" app>
    <v-app-bar-nav-icon @click="drawer = !drawer">
      <v-icon class="icon-drawer">mdi-menu</v-icon>
    </v-app-bar-nav-icon>
    <div class="flex items-center justify-evenly pl-md-7 pl-lg-15">
      <a :href="route('home')" class="cursor-pointer">
        <img class="img-toolbar" src="@/assets/icon/logo-gogold.png" alt="logo" />
      </a>
    </div>
  </v-app-bar>

  <!-- Mobile Drawer -->
  <v-navigation-drawer v-if="!is_desktop" app temporary v-model="drawer" width="200" class="mobile-drawer">
    <v-app-bar-nav-icon @click="drawer = !drawer">
      <v-icon class="icon-drawer">mdi-close</v-icon>
    </v-app-bar-nav-icon>
    <v-list dense>
      <v-list-item-group active-class="bg-yellow-500">
        <v-list-item v-for="(item, index) in menu_items_mobile" :key="'mobile' + index" rounded=""
          :class="route().current() == item.route_name ? '' : ''">
          <a :href="route(item.route_name)" class="cursor-pointer text-v-list-item-homepage">
            <v-list-item> </v-list-item>
            <div class="flex ml-2">
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </div>
          </a>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>

  <!-- Desktop Navigation Bar -->
  <v-app-bar v-if="is_desktop" class="flex justify-between color-dark toolbar-content align-center" app>
    <div class="flex w-full justify-evenly toolbar-content">
      <a :href="route('home')" class="cursor-pointer">
        <img class="img-toolbar" src="@/assets/icon/logo-gogold.png" alt="logo" />
      </a>
      <div class="flex items-center">
        <div class="flex items-center justify-around main-text-toolbar">
          <a :href="route(item.route_name)" class="text-navbar" v-for="(item, index) in menu_items_desktop"
            :key="'desktop' + index">{{ item.title }}</a>
        </div>
      </div>
      <div class="flex items-center">
        <v-btn flat href="/login" class="mr-2 btn-login">เข้าสู่ระบบ</v-btn>
        <v-btn flat href="/register" class="btn-register">สมัครสมาชิก</v-btn>
      </div>
    </div>
  </v-app-bar>
</template>

<script setup>
import { ref, onMounted, watch } from "vue"
import { useDisplay } from "vuetify"
// import { isMobile } from 'mobile-device-detect';

const { width } = useDisplay()
const is_desktop = ref(false)
const drawer = ref(false)

onMounted(() => {
  is_desktop.value = width.value > 1279
})

watch(
  () => width.value,
  (newWidth) => {
    is_desktop.value = newWidth > 1279
  }
)

const menu_items_mobile = ref([
  { title: "หน้าหลัก", route_name: "home" },
  { title: "แพ็กเกจ", route_name: "StatsPage" },
  { title: "เครื่องมือช่วยเทรด", route_name: "LearnPage" },
  { title: "บทความ", route_name: "AboutPage" },
  { title: "ติดต่อเรา", route_name: "AboutPage" },
  { title: "เข้าสู่ระบบ", route_name: "login" },
  { title: "สมัครสมาชิก", route_name: "register" },
])

const menu_items_desktop = ref([
  { title: "หน้าหลัก", route_name: "home" },
  { title: "แพ็กเกจ", route_name: "StatsPage" },
  { title: "เครื่องมือช่วยเทรด", route_name: "LearnPage" },
  { title: "บทความ", route_name: "AboutPage" },
  { title: "ติดต่อเรา", route_name: "AboutPage" },
])
</script>
