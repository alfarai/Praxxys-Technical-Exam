import './bootstrap';
//import '../css/app.css';




import { createApp } from 'vue';
import Test from './components/Products.vue'

const app = createApp()
app.component('Products',Test);
app.mount('#app')





