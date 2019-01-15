<template>
  <transition name="navigation">
    <div class="modal">
      <div class="modal-dialog">
        <div class="modal-header">
          <h2 class="modal-title" v-text="data.name"></h2>
          <button type="button" class="modal-back-arrow" @click="goBack">
            <svg>
              <use xlink:href="#arrow_back" href="#arrow_back"></use>
            </svg>
          </button>
        </div>

        <div class="modal-body full-width">
          <ul>
            <li class="navigation-selected-category-link" v-if="data.id !== 0" @click="redirect(data.id)">Show {{ data.name }} category</li>
            <li v-for="category in getChildren(data)" @click="handleClick(category)">
              {{ category.name }}
              <svg v-if="category.children.length > 0">
                <use xlink:href="#arrow" href="#arrow"></use>
              </svg>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
  export default {
    props: {
      data: {
        required: true
      }
    },

    methods: {
      goBack() {
        this.$emit('removeLevel')
      },

      getChildren(object) {
        return lodash.get(object, 'children', null)
      },

      /**
       * If category doesn't have children redirect user to category listing
       * otherwise send addLevel event to parent component (parent should show another category level)
       * @param category
       */
      handleClick(category) {
        if (category.children && category.children.length < 1) {
          return this.redirect(category.id)
        }

        this.$emit('addLevel', category)
      },

      redirect(categoryId) {
        return window.location.href = '/categories/' + categoryId
      }
    },

  }
</script>