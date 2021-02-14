import Vue from 'vue'
import VueRouter from 'vue-router'

import SearchForm from './components/SearchForm';

Vue.use(VueRouter);

export default new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'searchform',
      component: SearchForm
    },
  ]
});