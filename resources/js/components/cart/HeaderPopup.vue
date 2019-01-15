<template>
  <div class="shopping-cart-popup">
    <div class="shopping-cart-popup-list">
      <div class="item" v-show="$store.getters.totalItemsInCart <= 0">
        <strong>Your shopping cart is empty</strong>
      </div>

      <div class="item" v-for="item in items">
        <a :href="'/products/' + item.id">
          <img :src="'https://placeimg.com/100/100/animals?' + item.id" alt="">
        </a>

        <a :href="'/products/' + item.id">
          <strong class="name" v-text="item.name"></strong>
        </a>

        <span class="quantity">{{ item.quantity }}x</span>
      </div>
    </div>

    <a :href="buttonHref" class="btn-primary fl-right">Shopping cart</a>
  </div>
</template>

<script>
  export default {
    props: {
      buttonHref: ''
    },
    computed: {
      items() {
        return this.$store.state.cart
      }
    }
  }
</script>