import Vuex from 'vuex'
import { getters } from '~/stores/cart/StoreData'

export default new Vuex.Store({
  state: {
    // CART_ITEMS variable is located in layouts/main.blade.php file
    cart: CART_ITEMS
  },

  mutations: {
    updateState: (state, item) => {
      state.cart = item
    },
  },

  actions: {
    updateQuantity: (item) =>
      context.commit("ADD_ITEM", item)
  },

  getters
})