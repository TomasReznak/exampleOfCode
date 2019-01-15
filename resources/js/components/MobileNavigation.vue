<template>
  <transition name="modal">
    <div v-show="this.visible" class="mobile-navigation-wrap">
      <mobile-navigation-content v-for="level in levels" :key="level.id"
                                 :data="level"
                                 @addLevel="addLevel($event)" @removeLevel="removeLevel()">
      </mobile-navigation-content>
    </div>
  </transition>
</template>

<script>
  import MobileNavigationContent from '~/components/MobileNavigationContent'

  export default {
    components: { MobileNavigationContent },

    props: {
      data: {
        required: true,
      }
    },

    data() {
      return {
        // Please not that very last level is always currently visible
        levels: [
          {
            id: 0,
            name: 'Navigation',
            children: [...this.data]
          }
        ],

        visible: false
      }
    },

    methods: {
      getChildren(object) {
        return lodash.get(object, 'children', null)
      },

      addLevel(level) {
        this.levels.push(level)
      },

      /**
       * Remove level, If there is last level remaining then close navigation instead
       */
      removeLevel() {
        if (this.levels.length > 1) {
          this.levels.pop()
        } else {
          this.close()
        }
      },

      close() {
        this.visible = false

        // This class prevents body from scrolling on most of the devices
        document.body.classList.remove('lock')
      },

      open() {
        this.visible = true

        // This class prevents body from scrolling on most of the devices
        document.body.classList.add('lock')
      }
    },
  }
</script>