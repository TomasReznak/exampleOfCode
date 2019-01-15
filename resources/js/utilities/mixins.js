export const breakpoints = {
  mounted() {
    this.$nextTick(() => window.addEventListener("resize", this.getWindowWidth));
  },

  beforeDestroy() {
    window.removeEventListener("resize", this.getWindowWidth);
  },

  data() {
    return {
      windowWidth: document.documentElement.clientWidth
    };
  },

  computed: {
    breakpoint() {
      var output = "xs";

      switch (true) {
        case (this.windowWidth >= 1200):
          output = "xl";
          break;

        case (this.windowWidth >= 992):
          output = "lg";
          break;

        case (this.windowWidth >= 768):
          output = "md";
          break;

        case (this.windowWidth >= 576):
          output = "sm";
          break;
      }

      return output;
    }
  },

  methods: {
    getWindowWidth(event) {
      this.windowWidth = document.documentElement.clientWidth;
    },

    isBreakpoint(data) {
      if (data.constructor === Array)
        return data.some(value => value === this.breakpoint);

      if (data.constructor === String)
        return data === this.breakpoint;

      return console.error("Passed argument is not Array nor String.");
    }
  }
};

export const touchSupported = {
  methods: {
    touchSupported() {
      return 'ontouchstart' in window || navigator.msMaxTouchPoints;
    },
  }
};