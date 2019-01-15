import CounterInput from './components/CounterInput.vue'

const detailProductSidebar = new Vue({
  el: '#detail-product-sidebar',
  name: 'detail-product-sidebar',
  components: { CounterInput },

  data: {
    quantity: 1,

    min: 1,

    max: 10,
  },

});