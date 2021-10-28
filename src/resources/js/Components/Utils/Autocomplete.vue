<template>
  <el-select
    v-model="value"
    filterable
    remote
    :collapse-tags="collapseTags"
    :placeholder="placeholder"
    :remote-method="fetch"
    :loading="loading"
    :clearable="true"
    :allow-create="allowCreate"
    :multiple="multiple"
    @change="change"
    @clear="$emit('clear', $event)"
    :no-data-text="noDataText"
    :reserve-keyword="false"
    :automatic-dropdown="false"
    :multiple-limit="multipleLimit"
  >
    <el-option
      v-for="item in options"
      :key="item.id"
      :label="item.name"
      :value="item.id"
    >
      <slot name="option" v-bind:option="item" />
    </el-option>
    <div
      class="
        flex flex-col
        px-6
        py-4
        mt-2
        text-sm
        font-medium
        bg-gray-50
        text-gray-500 text-center
        sm:rounded-bl-md sm:rounded-br-md
      "
    >
      start typing for more results
    </div>
  </el-select>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Autocomplete',
  components: {},
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
    },
    allowCreate: {
      type: Boolean,
      required: false
    },
    multiple: {
      type: Boolean,
      required: false
    },
    collapseTags: {
      type: Boolean,
      required: false
    },
    multipleLimit: {
      type: Number,
      required: 0
    }
  },
  emits: ['update:modelValue', 'change', 'clear', 'loadMore'],
  data() {
    return {
      value: this.modelValue
    }
  },
  methods: {
    change(event) {
      this.$emit('update:modelValue', event)
      this.$emit('change', event)
    }
  }
})
</script>
