import Navigation from '~/components/Navigation'
import MobileNavigation from '~/components/MobileNavigation'
import CartPopup from '~/components/cart/HeaderPopup'
import CartStore from '~/stores/cart/store'

const header = new Vue({
  el: '#header',
  name: 'header',
  components: { Navigation, MobileNavigation, CartPopup },
  store: CartStore,
  methods: {
    openMobileNav() {
      this.$refs['mobile-navigation'].open()
    }
  }
})