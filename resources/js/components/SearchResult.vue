<template>
    <div class="container">
      <div class="row">
        <section v-if="searchText">
          <h2 class="title_text">検索結果｢{{searchText}}｣</h2>
        </section>
        <section v-else>
          <h2 class="title_text">こんな本はいかがですか?</h2>
        </section>
      </div>
      <div class="row">
        <div 
          v-for="book in books"
        　v-bind:key="book.id"
          class="col-xl-4 col-lg-5 col-md-6 col-sm-10 book"
        >
          <div class="card text-center">
            <div class="popular-img">
              <img
                class="card-img-top"
                v-bind:src="book.img_url"
                alt="書籍画像"
              >
            </div>
              <div class="card-body popular-caption">
                <h3>
                  <a class="card-title" target="_blank" v-bind:href="'/books/'+ book.id">{{ book.title }}</a>
                </h3>
              </div>
          </div>
        </div>
        <div class="load"></div>
      </div>
    </div>
</template>

<script>
export default {
  props: ['searchText'],
  
  data(){
    return {
      books: [],
      page: 1,
    };
  },
  watch:{
    searchText:function (newSearchText,oldSearchText) {
      console.log(newSearchText);
      this.reset();
      this.getBooks();
      
    }
  },
  
  mounted() {
    const load = document.querySelectorAll('.load')
    load.forEach((target) => this.onIntersect(target));
  },
  
  methods:{
    getBooks(){
      fetch(`/api/search?q=${this.searchText}&page=${this.page}`)
        .then(response => response.json())
        .then(data => {
          this.books = this.books.concat(data);
          console.log(this.books);
          console.log(`/api/search?q=${this.searchText}`);
        });
    },
    
    onIntersect(target, options = {}) {
     const observer = new IntersectionObserver(this.load, options)
     // 監視したい要素をobserveする。
     observer.observe(target)
   },
    
    load(){
      this.page = this.page+1;
      this.getBooks();
    },
    
     reset() {
      Object.assign(this.$data,this.$options.data.call(this));
    }
    
  }
}
</script>

<style scoped>
  .card {
    width:325px;
    margin:20px;
  }
  .card-img-top {
    height:380px;
    width:325px;
  }
  .card-body {
    height:180px;
    width:325px;
  }
</style>