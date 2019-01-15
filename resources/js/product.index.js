import InfiniteScrollTrigger from './components/InfiniteScrollTrigger.vue'
import ProductList from './components/product/List'

const app = new Vue({
  el: '#app',
  components: { InfiniteScrollTrigger, ProductList },
  data: {
    products: products,
  },

  methods: {
    addPage(data) {
      this.products.push(...data)
    },
  },
});