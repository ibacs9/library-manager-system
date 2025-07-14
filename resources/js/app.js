require('./bootstrap');

import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import BookList from './components/BookListComponent.vue';
import BookReading from './components/BookReadingComponent.vue';
import axios from 'axios';
window.axios = axios;

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({});
app.component('BookList', BookList);
app.component('BookReading', BookReading);
app.mount('#app');