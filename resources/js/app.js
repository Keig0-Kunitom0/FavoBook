require('./bootstrap');

import './bootstrap';
import Vue from 'vue';
import SearchResult from './components/SearchResult';

const app = new Vue({
  el: '#app',
  data: {
    searchText: "",
  },
  components: {
    'search-result': SearchResult,
  },
  methods:{
    search(keyword){
      this.searchText = keyword;
    },
  },
});
