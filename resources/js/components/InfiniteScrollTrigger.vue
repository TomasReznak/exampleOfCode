<template>
  <div class="infinite-scroll">
    <div v-show="requestInProgress">
      <slot name="loading"></slot>
    </div>

    <div v-if="!allowRequests">
      <slot name="end"></slot>
    </div>
  </div>
</template>

<script>
	export default {

		props: {
			offset: {
				default: 0
			},

      url: {
        default: window.location.origin + window.location.pathname
			},

			page: {
        default: 1
      },
		},

    data() {
		  return {
        currentPage: this.page,
        requestInProgress: false,
        allowRequests: true
      }
    },

    computed: {
		  requestUrl () {
		    return this.url + '?page=' + (this.currentPage + 1)
      }
    },

		methods: {
			onScroll() {
				if (this.inViewport() && !this.requestInProgress && this.allowRequests) {
				  this.requestInProgress = true

          axios.get(this.requestUrl)
            .then(response => {
              this.$emit('load', response.data)

              history.replaceState({url: this.requestUrl}, "product-listing-page" + this.currentPage, this.requestUrl)

              this.currentPage++

              // If last request doesn't allow any another requests
              if (response.data.length < 1) {
                this.allowRequests = false
              }

              this.requestInProgress = false
            })
				}
			},

			inViewport() {
				return (this.$el.getBoundingClientRect().bottom + this.offset) <= (window.innerHeight || document.documentElement.clientHeight)
			},
		},

		mounted() {
			window.addEventListener('scroll', this.onScroll)
		},

	}
</script>