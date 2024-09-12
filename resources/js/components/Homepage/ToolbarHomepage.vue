<template>
  <v-layout>
    <!-- Mobile Navigation Bar with Nav Icon -->
    <v-app-bar class="mobile-drawer" v-if="!is_desktop" app dark>
      <v-app-bar-nav-icon @click="drawer = !drawer">
        <v-icon class="icon-drawer">mdi-menu</v-icon>
      </v-app-bar-nav-icon>
      <div class="flex items-center justify-evenly pl-md-7 pl-lg-15">
        <img
          class="img-toolbar"
          src="@/assets/icon/logo-gogold.png"
          alt="logo"
        />
      </div>
    </v-app-bar>

    <!-- Mobile Drawer -->
    <v-navigation-drawer
      v-if="!is_desktop"
      app
      temporary
      v-model="drawer"
      width="200"
      class="mobile-drawer"
    >
      <v-app-bar-nav-icon @click="drawer = !drawer">
        <v-icon class="icon-drawer">mdi-close</v-icon>
      </v-app-bar-nav-icon>
      <v-list dense>
        <v-list-item-group active-class="bg-yellow-500">
          <v-list-item
            v-for="(item, index) in menuItems"
            :key="index"
            rounded=""
            :class="route().current() == item.route ? '' : ''"
          >
            <a
              :href="route(item.route)"
              class="cursor-pointer text-v-list-item-homepage"
            >
              <v-list-item-icon> </v-list-item-icon>
              <div class="flex ml-2">
                <v-list-item-title>{{ item.title }}</v-list-item-title>
                <!-- {{ item.title }} -->
              </div>
            </a>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

    <!-- Desktop Navigation Bar -->
    <v-app-bar
      v-if="is_desktop"
      class="flex justify-between color-dark toolbar-content align-center"
      app
    >
      <div class="flex w-full justify-evenly toolbar-content">
        <img
          class="img-toolbar"
          src="@/assets/icon/logo-gogold.png"
          alt="logo"
        />
        <div class="flex items-center">
          <div class="flex items-center justify-around main-text-toolbar">
            <div>
              <a href="/home" class="text-navbar">{{ company.home }}</a>
            </div>
            <div>
              <a href="/stats" class="text-navbar">{{ company.stats }}</a>
            </div>
            <div>
              <a href="/learn" class="text-navbar">{{ company.learn }}</a>
            </div>
            <div>
              <a href="/about" class="text-navbar">{{ company.about }}</a>
            </div>
            <div>
              <a href="/about" class="text-navbar">{{ company.contact }}</a>
            </div>
          </div>
        </div>
        <div class="flex items-center">
          <v-btn flat href="/login" class="mr-2 btn-login">เข้าสู่ระบบ</v-btn>
          <v-btn flat href="/register" class="btn-register">สมัครสมาชิก</v-btn>
        </div>
      </div>
    </v-app-bar>
  </v-layout>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import { useDisplay } from "vuetify";

const { width } = useDisplay();
const is_desktop = ref(false);
const drawer = ref(false);

onMounted(() => {
  is_desktop.value = width.value > 1279;
});

watch(
  () => width.value,
  (newWidth) => {
    is_desktop.value = newWidth > 1279;
  }
);

const company = ref({
  name: "GOGOLD",
  home: "หน้าหลัก",
  stats: "แพ็กเกจ",
  learn: "เครื่องมือช่วยเทรด",
  about: "บทความ",
  contact: "ติดต่อเรา",
});
const menuItems = ref([
  { title: "หน้าหลัก", route: "HomePage" },
  { title: "แพ็กเกจ", route: "StatsPage" },
  { title: "เครื่องมือช่วยเทรด", route: "LearnPage" },
  { title: "บทความ", route: "AboutPage" },
  { title: "ติดต่อเรา", route: "AboutPage" },
  { title: "เข้าสู่ระบบ", route: "login" },
  { title: "สมัครสมาชิก", route: "register" },
]);
</script>

