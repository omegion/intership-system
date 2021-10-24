<template>
  <el-dropdown-item
    :icon="icon"
    class="text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
  >
    <button
      type="submit"
      class="
        flex
        group
        items-center
        hover:bg-gray-100
        focus:outline-none focus:bg-gray-100
        transition
      "
      v-if="as === 'button'"
    >
      <slot></slot>
    </button>
    <a v-else-if="href" :href="href" class="flex group items-center">
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
