<template>
  <MainDashbaord></MainDashbaord>
</template>
<script setup>
import MainDashbaord from "@/components/dashboard/Admin/MainDashbaord.vue";
import LayoutAuthenticate from "@/layouts/LayoutAuthenticate.vue";

defineOptions({
  layout: LayoutAuthenticate,
});
</script>
