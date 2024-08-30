<script setup>
import ApplicationLogo from "@/components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import LogoPage from "@/components/LogoPage.vue";
</script>

<template>
  <div
    class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0"
  >
    <div>
      <LogoPage></LogoPage>
    </div>
    <div
      class="w-full px-6 py-4 mt-6 overflow-hidden shadow-md sm:max-w-md sm:rounded-lg login-main"
    >
      <slot />
    </div>
  </div>
</template>
<style scoped>
</style>


