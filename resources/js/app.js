// Setup of the application, axios and so on...
require('~/utilities/setup')

// global Vue directives and components
Vue.use(require('v-click-outside-x'))
Vue.component('icon', require('~/components/Icon'))

// Vue Header
require('~/header.js')