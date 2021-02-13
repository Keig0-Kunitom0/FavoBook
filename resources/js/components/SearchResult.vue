<template>
    <div class="container">
      <div class="row">
        <section v-if="searchText">
          <h1 class="title_text">検索結果｢{{searchText}}｣</h1>
        </section>
        <section v-else >
          <h1 class="title_text">こんな本はいかがですか?</h1>
        </section>
      </div>
      <div class="row">
        <div 
          v-for="book in books"
        　v-bind:key="book.id"
          class="col-xl-4 col-lg-6 col-md-6 col-sm-11 book"
        >
          <div class="single-new-arrival mb-50 text-center wow fadeInUp" id="image_item" data-wow-duration="1s" data-wow-delay=".1s">
            <div class="popular-img">
              <img
                v-bind:src="book.img_url"
                alt="書籍画像"
              >
            </div>
              <div class="popular-caption">
                <h3>
                  <a target="_blank" v-bind:href="'/books/'+ book.id">{{ book.title }}</a>
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
#image_item {
  
  /*枠をつける*/
  border: 8px solid #EEEEEE;
  
  /*影をつける*/
  box-shadow: 4px 4px 6px 1px #ccc;
  
  margin-left: 9px;
  margin-right: 9px;
  margin-bottom: 18px;
}


</style>