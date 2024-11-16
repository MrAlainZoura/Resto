import './bootstrap';
import { createApp} from 'vue';
import App from './composant/App.vue';
import router from './router';
import 'flowbite';

createApp(App).use(router).mount('#app')