import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Prompt", ...defaultTheme.fontFamily.sans],
      },
      colors: {
        primary: "#ffd700",
        secondary: "#27272A",
        info: "#30384C",
        warning: "#FFAB3B",
        danger: "#FF3E22",
        muted: "#707070",
        base: "#707070",
        placeholder: "#B5B5B5",
        headline: "#004086",
        white: "#FFFFFF",
        newGold: "#FFD700",
        newGray: "#737373",
        newRed: "#F56565",
        newGreen: "#34A853",
        newOrange: "#FF9900",
      },
    },
  },

  plugins: [forms],
};
