<template>
  <el-button :native-type="type" :class="classes">
    <slot></slot>
  </el-button>
</template>

<script>
import { defineComponent } from 'vue'
import { ElButton } from 'element-plus'

export default defineComponent({
  name: 't-button',
  components: { ElButton },
  props: {
    type: {
      type: String,
      default: 'submit'
    },
    primary: {
      type: Boolean
    },
    secondary: {
      type: Boolean
    }
  },
  computed: {
    classes() {
      if (this.secondary)
        return 'inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
      else if (this.primary)
        return 'inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
      else
        return 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition hover:tw-bg-blue-100'
    }
  }
})
</script>

<style lang="scss">
.el-button {
  min-height: inherit;
}
</style>
