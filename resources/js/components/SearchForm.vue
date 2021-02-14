<template>
    <form  @submit.prevent="submitText">
    	<div class="input-group mr-5 pr-3">								
    		<input type="text" v-model="keyword" class="form-control" placeholder="検索...">
    		<div class="input-group-append ">
    			<button class="input-group-text"><i class="fas fa-search"></i></button>
    		</div>
    	</div>
    </form>
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
      this.$emit('pass-value',this.keyword);
    },
  }
}
</script>