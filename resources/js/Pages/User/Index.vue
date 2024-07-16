<script setup>
import UserLayouts from "./Layouts/UserLayouts.vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";
// Hero

// Hero
</script>
<template>
  <!-- Navbar -->
  <nav class="bg-gray-800">
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div
          class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start"
        >
          <div class="flex items-center flex-shrink-0">
            <img
              class="w-auto h-8"
              src="/imageuse/LogoEA/LOGO.png"
              alt="Your Company"
            />
          </div>
          <div class="hidden sm:ml-2 sm:block">
            <div class="flex space-x-4">
              <a
                href="#"
                class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                aria-current="page"
                >หน้าหลัก</a
              >
              <a
                href="#"
                class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                >สถิติ</a
              >
              <a
                href="#"
                class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                >เรียนรู้</a
              >
              <a
                href="#"
                class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white"
                >เกี่ยวกับเรา</a
              >
            </div>
          </div>
        </div>
        <div class="flex items-center justify-end gap-3">
          <a
            class="items-center justify-center hidden px-3 py-2 text-sm font-semibold text-gray-900 transition-all duration-150 bg-white shadow-sm rounded-xl ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:inline-flex"
            href="/login"
            >เข้าสู่ระบบ</a
          >
          <a
            class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold text-white transition-all duration-150 bg-yellow-500 shadow-sm rounded-xl hover:bg-yellow-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
            href="/register"
            >สมัครสมาชิก</a
          >
        </div>
      </div>
    </div>
  </nav>
</template>
  <!-- Navbar -->
  <!-- <Carousel :autoplay="5000" :wrap-around="true">
    <Slide v-for="slide in 10" :key="slide">
      <div class="carousel__item">
        <img src="/imageuse/Hero/8.png" alt="" />
      </div>
    </Slide>
  </Carousel>
  <div class="absolute inset-0 flex items-center justify-center">
    <h2 class="text-3xl font-bold text-white">Let Go GoGold!!!</h2>
  </div>


<!-- <style> -->
<!-- .carousel__item {
  font-size: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.carousel__prev,
.carousel__next {
  width: 40px;
  height: 200px;
  color: rgb(196, 196, 196);
  margin-top: -100px;
  border: transparent;
}

.carousel__prev:hover,
.carousel__next:hover {
  width: 40px;
  height: 200px;
  color: rgb(212, 212, 212);
  margin-top: -100px;
  border: 3px solid rgb(217, 217, 217);
}
</style> -->

