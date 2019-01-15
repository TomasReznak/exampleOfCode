<template>
  <svg class="icon">
    <use :xlink:href="'#' + href" :href="'#' + href"></use>
  </svg>
</template>

<script>
  export default {

    props: {
      href: {
        required: true
      }
    },

  }
</script>