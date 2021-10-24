<template>
  <el-input
    ref="input"
    v-model="value"
    @input="$emit('update:modelValue', $event)"
    :placeholder="placeholder"
    type="text"
  ></el-input>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { ElInput } from 'element-plus'

export default defineComponent({
  components: { ElInput },
  name: 'input',
  props: ['modelValue', 'placeholder'],
  emits: ['update:modelValue'],
  methods: {
    focus() {
      this.$refs.input.focus()
    }
  },
  setup(props) {
    const value = ref(props.modelValue)
    const input = ref(null)

    return {
      value,
      input
    }
  }
})
</script>
