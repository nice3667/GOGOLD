<template>
  <div class="space-y-4 text-black bg-white p-7">
    <div class="grid grid-cols-2 gap-4">
      <!-- Main Colors -->
      <div
        v-for="color in mainColors"
        :key="color.name"
        class="flex items-center space-x-4"
      >
        <div :class="`w-20 h-20 ${color.class}`"></div>
        <div>
          <p class="text-lg font-bold">{{ color.name }}</p>
          <p>{{ color.hex }}</p>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <!-- Text Colors -->
      <div
        v-for="color in textColors"
        :key="color.name"
        class="flex items-center space-x-4"
      >
        <div :class="`w-20 h-20 ${color.class}`"></div>
        <div>
          <p class="text-lg font-bold">{{ color.name }}</p>
          <p>{{ color.hex }}</p>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <!-- Additional Colors -->
      <div
        v-for="color in additionalColors"
        :key="color.name"
        class="flex items-center space-x-4"
      >
        <div :class="`w-20 h-20 ${color.class}`"></div>
        <div>
          <p class="text-lg font-bold">{{ color.name }}</p>
          <p>{{ color.hex }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

  <script>
export default {
  name: "ColorShowcase",
  data() {
    return {
      mainColors: [
        { name: "Primary", class: "bg-primary", hex: "#3D90D1" },
        { name: "Info", class: "bg-info", hex: "#30384C" },
        { name: "Warning", class: "bg-warning", hex: "#FFAB3B" },
        { name: "Danger", class: "bg-danger", hex: "#FF3E22" },
        { name: "Muted", class: "bg-muted", hex: "#707070" },
        { name: "lime", class: "bg-lime", hex: "#34A840" },
      ],
      textColors: [
        { name: "Base", class: "bg-base", hex: "#707070" },
        { name: "Placeholder", class: "bg-placeholder", hex: "#B5B5B5" },
        { name: "Headline", class: "bg-headline", hex: "#004086" },
        { name: "White", class: "bg-white", hex: "#FFFFFF" },
      ],
      additionalColors: [
        { name: "Gold", class: "bg-newGold", hex: "#FFD700" },
        { name: "Gray", class: "bg-newGray", hex: "#737373" },
        { name: "Red", class: "bg-newRed", hex: "#F56565" },
        { name: "Green", class: "bg-newGreen", hex: "#34A853" },
        { name: "Orange", class: "bg-newOrange", hex: "#FF9900" },
      ],
    };
  },
};
</script>

  <style scoped>
/* Add any additional styles if necessary */
</style>
