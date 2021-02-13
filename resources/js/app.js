require('./bootstrap');

import './bootstrap';
import Vue from 'vue';
import SearchResult from './components/SearchResult';
import SearchForm from './components/SearchForm';

const app = new Vue({
  el: '#app',
  data: {
    searchText: "",
  },
  components: {
    'search-result': SearchResult,
    'search-form': SearchForm,
  },
  methods:{
    search(keyword){
      this.searchText = keyword;
    },
  },
});
