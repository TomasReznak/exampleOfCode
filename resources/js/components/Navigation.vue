<template>
  <div v-click-outside="close">
    <ul class="navigation">
      <li v-for="category in data" :class="{active: selected === category}">
        <a :href="'/categories/' + category.id" v-text="category.name" @click.prevent="handleClick(category)"></a>
      </li>
    </ul>

    <transition name="roll">
      <div class="submenu" v-show="subNavigationOpened">
        <div class="submenu-content">
          <div class="row">
            <div class="col-3" v-for="category in getChildren(selected)">
              <a :href="'/categories/' + category.id">
                <strong v-text="category.name"></strong>
              </a>

              <ul>
                <li v-for="child in getChildren(category)">
                  <a :href="'/categories/' + child.id" v-text="child.name"></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
  export default {

    props: {
      data: {
        requirde: true
      }
    },

    data() {
      return {
        selected: null,
        opened: false,
      }
    },

    computed: {
      hasChildren() {
        return this.getChildren(this.selected) && this.getChildren(this.selected).length > 0
      },

      subNavigationOpened() {
        return this.selected && this.opened && this.hasChildren
      }
    },

    methods: {
      open() {
        this.opened = true
      },

      close() {
        this.opened = false
        this.deselect()
      },

      /**
       * Selects category on click, or on hover when the navigation is already open
       */
      select(category) {
        this.selected = category
      },

      /**
       * Deselect is postponed by 0.3s because of the hiding transition
       * so, when the navigation is closing content doesn't just disappear right after click
       */
      deselect() {
        setTimeout(() => this.selected = null, 300)
      },

      getChildren(object) {
        return lodash.get(object, 'children', null)
      },

      /**
       * If category is opened and current category is selected then redirect user to category listing
       * otherwise open navigation and select clicked category
       */
      handleClick(category) {
        if ((this.opened && this.selected === category) || this.getChildren(category).length < 1) {
          window.location.href = '/categories/' + category.id
        } else {
          this.open()
          this.select(category)
        }
      }
    },

  }
</script>