import CartList from './components/cart/List'
import CartStore from '~/stores/cart/store'

window.cartProductsList = new Vue({
  el: '#cart-products-list',
  name: 'cart-products-list',
  store: CartStore,
  components: { CartList },
})