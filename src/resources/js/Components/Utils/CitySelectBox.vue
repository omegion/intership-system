<template>
  <Autocomplete
    v-model="value"
    :options="options"
    :loading="loading"
    :fetch="remoteMethod"
    placeholder="Enter a city"
    no-data-text="no cities found"
    @change="$emit('update:modelValue', $event)"
    @clear="clear"
    class="mt-1 block w-full"
  />
</template>

<script>
import { defineComponent } from 'vue'
import { debounce } from 'lodash'
import Autocomplete from '@/Components/Utils/Autocomplete'

export default defineComponent({
  name: 'CitySelectBox',
  components: { Autocomplete },
  emits: ['update:modelValue'],
  props: ['modelValue', 'initialOptions'],
  data() {
    return {
      value: this.modelValue,
      loading: false,
      options: this.initialOptions
    }
  },
  methods: {
    async remoteMethod(query) {
      this.loading = true
      await this.readData(query)
    },
    readData: debounce(function (query) {
      this.fetchData(query)
    }, 100),
    fetchData(query) {
      axios
        .get(
          route('location.city.search', {
            query: query,
            current_id: this.modelValue
          })
        )
        .then((res) => {
          this.options = res.data
        })
        .finally(() => {
          this.loading = false
        })
    },
    clear() {
      this.$emit('update:modelValue', '')
    }
  }
})
</script>
