<template>
    <div id="overlay" v-show="showContent" class="search-model-box" ref="search-model-box">
        <div class="header d-flex align-i tems-center justify-content-center">
            <h4><i class="fas fa-search"></i></h4>
                <form  @submit.prevent="submitText">
                    <input type="text" v-model="keyword"  id="search-input" placeholder="キーワードを入力" size="70" >
                </form>
            <h4 class="search-close-btn" @click="closeModal"><i class="fas fa-times"></i></h4>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      keyword: "",
    }
  },
  methods: {
    submitText(){
      this.closeModal();
      this.$emit('pass-value',this.keyword);
    },
    
    closeModal(){
      console.log("close modal in vue");
      console.log(this.$refs["search-model-box"]);
      this.$refs["search-model-box"].style.display = "none";
    },
  }
}
</script>

<style>
#overlay{
  /*　要素を重ねた時の順番　*/
  z-index:1;

  /*　画面全体を覆う設定　*/
  position:fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color:rgba(0,0,0,0.5);

  /*　画面の中央に要素を表示させる設定　*/
  display: flex;
  align-items: center;
  justify-content: center;

}

.header{
    height: 56px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #fff;
    width: 100%;
    margin-bottom:auto;
}

#search-input{
    flex: 1;
    font-size: 16px;
    border: 0;
    outline: none;
    padding: 10px 9px;
    background: hsla(0,0%,93.7%,.6);
    display: flex;
    align-items: center;
}

.fa-times{
    margin: 10px 10px 0px;
}

h4 .fa-search{
    margin: 10px 10px 0px;
}
</style>