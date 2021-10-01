<template>
  <el-dropdown-item
    :icon="icon"
    class="
      block
      px-3
      py-2
      text-sm
      leading-5
      text-gray-700
      hover:bg-gray-100
      focus:outline-none focus:bg-gray-100
      transition
    "
  >
    <button
      type="submit"
      class="hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
      v-if="as === 'button'"
    >
      <slot></slot>
    </button>
    <a v-else-if="href" :href="href">
      <slot></slot>
    </a>
  </el-dropdown-item>
</template>

<script>
import { defineComponent } from 'vue'
import { ElDropdownItem } from 'element-plus'

export default defineComponent({
  components: { ElDropdownItem },
  props: {
    icon: {
      default: ''
    },
    href: {
      default: ''
    },
    as: {
      default: 'href'
    }
  }
})
</script>
