<template>
  <el-select
    v-model="value"
    filterable
    remote
    reserve-keyword
    :placeholder="placeholder"
    :remote-method="fetch"
    :loading="loading"
    :clearable="true"
    @change="$emit('change', $event)"
    @clear="$emit('clear', $event)"
    :no-data-text="noDataText"
    :reserve-keyword="false"
    class="
      border-gray-300
      focus:border-indigo-300
      focus:ring
      focus:ring-indigo-200
      focus:ring-opacity-50
      rounded-md
      shadow-sm
    "
  >
    <el-option
      v-for="item in options"
      :key="item.id"
      :label="item.name"
      :value="item.id"
    >
      <slot name="option" v-bind:option="item" />
    </el-option>
  </el-select>
</template>

<script>
import { defineComponent, ref } from 'vue'

export default defineComponent({
  name: 'Autocomplete',
  props: {
    modelValue: {},
    fetch: {
      type: Function,
      required: true
    },
    options: {
      type: Array,
      required: true
    },
    loading: {
      type: Boolean,
      required: true
    },
    placeholder: {
      type: String,
      required: true
    },
    noDataText: {
      type: String,
      required: true
    }
  },
  emits: ['change', 'clear'],
  setup(props) {
    const value = ref(props.modelValue)

    return {
      value
    }
  }
})
</script>
