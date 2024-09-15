import './bootstrap';
import '../css/app.css';
import "../css/custom-table-theme.css";
import '@assets/css/satoshi.css'
import '@assets/css/style.css'
import 'flatpickr/dist/flatpickr.min.css'

import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createPinia } from 'pinia'
import VueApexCharts from 'vue3-apexcharts'
import router from './router'
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(createPinia())
      .use(plugin)
      .use(router)
      .use(ZiggyVue)
      .component("Link", Link)
      .component("Head", Head)
      .component('EasyDataTable', Vue3EasyDataTable)
      .mount(el);
  },
  progress: {
    delay: 250,
    color: '#4B5563', //#29d
    includeCSS: true,
    showSpinner: true,
  },
});
