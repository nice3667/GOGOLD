<template>
  <div class="col-span-4 mb-3 md:col-span-3 lg:col-span-2">
    <div class="overflow-hidden border rounded-lg" @click="copyHex">
      <div class="color-box" :style="{ backgroundColor: color.hex }"></div>
      <div class="p-2">
        <div class="font-semibold">{{ color.name }}</div>
        <div class="text-sm">{{ color.hex }}</div>
      </div>
    </div>
  </div>
</template>

  <script setup>
const props = defineProps({
  color: {
    type: Object,
    required: true,
  },
});

const copyHex = () => {
  const hexValue = props.color.hex;
  const textarea = document.createElement("textarea");
  textarea.value = hexValue;
  document.body.appendChild(textarea);
  textarea.select();
  document.body.removeChild(textarea);
  alert(`Copied: ${hexValue}`);
};
</script>

  <style>
.color-box {
  width: 100%;
  height: 100px;
  display: inline-block;
}
</style>
