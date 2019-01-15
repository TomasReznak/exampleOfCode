<template>
  <div>
    <div class="cart-product" v-for="item in items" :id=" 'product' + item.id" v-bind:class="{ deactive: prepareForRemoved }">
      <div class="cart-product-image">
        <img :src="'https://placeimg.com/100/100/animals?' + item.id">
      </div>

      <div class="card-product-description">
        <a :href="'/products/' + item.id ">
          <strong>
            {{ item.name }}
          </strong>
        </a>
      </div>

      <div class="card-product-quantity">

        <counter-input :value="item.quantity" @input="updateQuantity($event, item.id)"></counter-input>

        <button @click="deleteFromCart(item.id)"><icon class="trash-icon" href="trash"></icon></button>

      </div>

      <div class="card-product-price">
        <!--<span>CHF @{{ item.quantity }}</span>-->
      </div>
    </div>
  </div>
</template>

<script>

  import CounterInput from "../CounterInput";

  export default {
    components: {CounterInput},

    props: {

    },

    data() {
      return {
        prepareForRemoved: false
      }
    },

    computed: {
      items() {
        return this.$store.state.cart
      }
    },

    methods: {

      updateQuantity(quantity, id) {
        axios.put('/cart/' + id , {
          qty: quantity,
        }).then(response => {

          this.$store.commit('updateState', response.data)

        }).catch(e => console.log(e))

      },

      deleteFromCart (id) {
        axios.put('/cart/' + id, {
          qty: 0,
        }).then(response => {
          this.$store.commit('updateState', response.data)
        })

        this.prepareForRemoved=true;

      }

    }
  }
</script>