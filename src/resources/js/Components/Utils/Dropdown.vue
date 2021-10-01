<template>
  <div class="relative">
    <el-dropdown :hide-on-click="false" :trigger="trigger">
      <span class="el-dropdown-link">
        <slot name="trigger"></slot>
      </span>
      <template #dropdown>
        <el-dropdown-menu
          class="rounded-md w-48 ring-1 ring-black ring-opacity-5"
        >
          <slot name="content"></slot>
        </el-dropdown-menu>
      </template>
    </el-dropdown>
  </div>
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
    }
  }
})
</script>
