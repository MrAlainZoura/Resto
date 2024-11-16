import '../bootstrap';
import { createApp, h} from 'vue';
// import { createInertiaApp } from '@inertiajs/inertia-vue3';
import App from './App.vue';
import router from '../router';
import 'flowbite';


createApp(App).use(router).mount('#app')

// createInertiaApp({
//   resolve: name => import(`../composant/${name}`),
//   setup({ el, App, props, plugin }) {
//     createApp({ render: () => h(App, props) })
//       .use(plugin)
//       .mount(el);
//   },
// });