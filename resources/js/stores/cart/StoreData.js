export const getters = {
  totalItemsInCart: state => {
    if (state.cart && state.cart.constructor === Object && Object.values(state.cart).length > 0) {
      return Object.values(state.cart)
        .map(item => item.quantity)
        .reduce((total, num) => parseInt(total) + parseInt(num))
    }

    return 0
  },

  addItemToCart: state => {

  }
}