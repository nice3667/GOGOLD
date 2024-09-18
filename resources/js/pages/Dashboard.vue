<template>
  <MainUser></MainUser>
</template>
<script setup>
import MainUser from "@/components/dashboard/User/MainUser.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

defineOptions({
  layout: LayoutAuthenticate,
});
</script>
