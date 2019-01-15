<template>
  <div class="row">
    <div v-for="product in products" class="col-md-4 product-item">
      <a :href="'/products/' + product.id">
        <div class="product-image">
          <img :src="'https://placeimg.com/200/200/animals?' +  product.id">
        </div>
        <h4 v-text="product.name"></h4>
        <p v-text="product.description"></p>
      </a>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      data: {
        required: true
      }
    },

    data() {
      return {
        products: this.data
      }
    },
  }
</script>