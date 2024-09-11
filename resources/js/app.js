import "./bootstrap";
import "../css/app.css";
import "../css/_button.scss";
import "../css/_card.scss";
import "../css/_text.scss";
import "../css/_input.scss";
import "../css/_color.scss";
import "../css/_form.scss";
import "../css/_table.scss";
import "../css/User/variables.scss";
//Homepage
import "../css/Homepage/_bodyhome.scss";
import "../css/Homepage/_tablehome.scss";
import "../css/Homepage/_toolbar.scss";
import "../css/Homepage/_commenthome.scss";
import "../css/Homepage/_maintablehome.scss";
import "../css/Homepage/_commentgrouphome.scss";
import "../css/Homepage/_imagehome.scss";
import "../css/Homepage/_footerhome.scss";
//end
//Login
import "../css/Login/_login.scss";
//end
//User
import "../css/User/_buttonuser.scss";
import "../css/User/_tableuser.scss";
import "../css/User/_chipuser.scss";
import "../css/User/_typographyuser.scss";
//end
// import CanvasJSChart from "@canvasjs/vue-charts";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import "@mdi/font/css/materialdesignicons.css";
import "vuetify/dist/vuetify.min.css";

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
