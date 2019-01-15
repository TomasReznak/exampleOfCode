<template>
  <div class="counter-field">
    <div class="decrement" @click="decrement"><icon href="minus"></icon></div>

    <input v-model.number="quantity" type="tel">
    <input type="hidden" :name="name" :value="quantity">

    <div class="increment" @click="increment"><icon href="plus"></icon></div>
  </div>
</template>

<script>
  export default {

    props: {
      value: {
        default: 1,
      },

      min: {
        default: 1,
      },

      max: {
        default: 100,
      },

      name: {

      }
    },

    data() {
      return {
        quantity: this.value,
      }
    },

    methods: {
      increment() {
        if (this.quantity < this.max) {
          this.quantity++;
        }
      },

      decrement() {
        if (this.quantity > this.min){
          this.quantity--;
        }
      },

      update() {
        this.$emit('input', this.quantity);
      },
    },

    watch: {
      quantity (newValue, oldValue) {
        let regex = /^[0-9]*$/.test(newValue);

        if (!regex) {
          this.quantity=oldValue;
        }

        this.update();
      }
    }
  }
</script>