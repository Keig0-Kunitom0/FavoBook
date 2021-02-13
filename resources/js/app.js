require('./bootstrap');

import './bootstrap';
import Vue from 'vue';
import SearchResult from './components/SearchResult';
import SearchForm from './components/SearchForm';
import BookLike from './components/BookLike';

const app = new Vue({
  el: '#app',
  data: {
    searchText: "",
  },
  components: {
    'search-result': SearchResult,
    'search-form': SearchForm,
    'book-like': BookLike,
  },
  methods:{
    search(keyword){
      this.searchText = keyword;
    },
  },
});
