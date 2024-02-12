import './bootstrap';
//import '../css/app.css';




import { createApp } from 'vue';
import Test from './components/Products.vue'
import Test2 from './components/GetCount.vue'
const app = createApp()
const app2 = createApp()
app.component('products',Test);
app2.component('count',Test2);
app.mount('#app')
app2.mount('#app2')








