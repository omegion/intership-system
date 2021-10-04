<template>
  <el-dropdown :hide-on-click="false" :trigger="trigger">
    <span class="el-dropdown-link">
      <slot name="trigger"></slot>
    </span>
    <template #dropdown>
      <el-dropdown-menu
        :class="[width, 'rounded-md ring-1 ring-black ring-opacity-5']"
      >
        <slot name="content"></slot>
      </el-dropdown-menu>
    </template>
  </el-dropdown>
</template>

<script>
import { defineComponent } from 'vue'
import DropdownItem from '@/Components/Utils/DropdownItem'
import { ElDropdown, ElDropdownItem, ElDropdownMenu } from 'element-plus'

export default defineComponent({
  components: { ElDropdown, ElDropdownItem, ElDropdownMenu, DropdownItem },

  props: {
    trigger: {
      default: 'click'
    },
    width: {
      default: 'w-48'
    }
  }
})
</script>

<style>
.el-dropdown {
  color: inherit;
}
</style>
