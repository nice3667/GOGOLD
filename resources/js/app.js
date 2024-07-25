import './bootstrap';
import '../css/app.css';
import '../css/_button.scss'
import '../css/_card.scss'
import '../css/_text.scss'
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import '@mdi/font/css/materialdesignicons.css';
import 'vuetify/dist/vuetify.min.css';


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        themes: {
            light: {
                primary: '#3D90D1', // Primary
                info: '#30384C', // Info
                warning: '#FFA83B', // Warning
                danger: '#FF3E22', // Danger
                muted: '#707070', // Muted
                base: '#707070', // Base
                placeholder: '#B5B5B5', // Placeholder
                headline: '#004086', // Headline
                white: '#FFFFFF', // White
                success: '#179BFF', // Success
                successText: '#517D2E', // Success Text
                switchActive: '#0E54A2', // Switch Active
                tabActive: '#004086', // Tab Active
                headlineBg: '#FB5135', // Headline BG
                mainBg: '#E3E8EB', // Main BG
            },
        },
    },
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
