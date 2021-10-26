<template>
  <Autocomplete
    v-model="modelValue"
    :options="options"
    :loading="loading"
    :fetch="remoteMethod"
    placeholder="Enter a country"
    no-data-text="no countries found"
    @change="$emit('update:modelValue', $event)"
    @clear="clear"
    class="mt-1 block w-full"
  >
    <template #option="scope">
      <span class="flex min-w-0 items-center justify-between space-x-3">
        <img
          class="w-6 h-4 bg-gray-300 rounded shadow-md flex-shrink-0"
          :src="getFlagURL(scope.option.flag_url, scope.option.name)"
          :alt="scope.option.name"
        />
        <span class="flex-1 flex flex-col min-w-0">
          {{ scope.option.name }}
        </span>
      </span>
    </template>
  </Autocomplete>
</template>

<script>
import { defineComponent } from 'vue'
import { debounce } from 'lodash'
import Autocomplete from '@/Components/Utils/Autocomplete'

export default defineComponent({
  name: 'CountrySelectBox',
  components: { Autocomplete },
  emits: ['update:modelValue'],
  props: ['modelValue', 'initialOptions'],
  data() {
    return {
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
          route('location.country.search', {
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
    },
    getFlagURL(url, name) {
      if (url !== null) {
        return url
      }
      return `https://ui-avatars.com/api/?name=${name}&background=ffffff00`
    }
  }
})
</script>
