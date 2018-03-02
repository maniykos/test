import Vue from 'vue'
import App from './App.vue'
import Vuelidate from 'vuelidate'
import axios from 'axios'

import AppMessageAnswer from './components/MessageAnswer.vue';
import AppNewMessage from './components/NewMessage.vue';

Vue.component('AppMessageAnswer', AppMessageAnswer);
Vue.component('AppNewMessage', AppNewMessage);

Vue.use(Vuelidate)

new Vue({
  el: '#app',
  render: h => h(App)
})
