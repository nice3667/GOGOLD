import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";
import tailwindcss from "tailwindcss";
import autoprefixer from "autoprefixer";

export default defineConfig({
  resolve: {
    alias: {
      "ziggy-js": path.resolve("vendor/tightenco/ziggy/dist/vue.es.js"),
    },
  },
  plugins: [
    laravel({
      input: ["resources/js/app.js", "resources/scss/app.scss"],
      refresh: true,
      postcss: [tailwindcss(), autoprefixer()],
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
});
