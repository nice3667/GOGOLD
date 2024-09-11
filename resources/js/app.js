import "./bootstrap";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import "@mdi/font/css/materialdesignicons.css";
import "vuetify/dist/vuetify.min.css";

import { usePwa } from "./composables/usePwa";
const { createPwa } = usePwa();

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

const vuetify = createVuetify({
  components,
  directives,
  theme: {
    themes: {
      light: {
        primary: "#3D90D1",
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
});

createPwa();

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob("./Pages/**/*.vue")
    ),
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin) // ปลั๊กอินของ Inertia
      .use(ZiggyVue) // ZiggyVue สำหรับการจัดการเส้นทาง
      .use(vuetify) // Vuetify สำหรับคอมโพเนนต์ UI
      .mixin({ methods: { route } }) // ทำให้เมธอด `route` ใช้ได้ทั่วทั้งแอป
      .mount(el);
  },
  progress: {
    color: "#4B5563",
  },
});
