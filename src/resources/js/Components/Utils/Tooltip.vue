<template>
  <el-tooltip :content="content" placement="bottom">
    <slot />
  </el-tooltip>
</template>

<script>
import { defineComponent } from 'vue'
import { ElTooltip } from 'element-plus'

export default defineComponent({
  components: { ElTooltip },
  name: 't-tooltip',
  props: ['content']
})
</script>
