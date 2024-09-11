<template>
  <div class="flex flex-col items-center p-4 text-white bg-gray-800 rounded-lg">
    <div class="mb-2 text-3xl">
      <img src="@/assets/icon.png" alt="Icon" class="inline-block w-8 h-8" />
    </div>
    <div class="text-lg">{{ title }}</div>
    <div class="text-2xl font-bold">{{ count }} คน</div>
  </div>
</template>

  <script>
export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    count: {
      type: Number,
      required: true,
    },
  },
};
</script>

  <style scoped>
/* Add any additional styles here */
</style>
