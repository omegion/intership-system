<template>
  <Autocomplete
    v-model="categories"
    :options="options"
    :loading="loading"
    :fetch="remoteMethod"
    :multiple-limit="5"
    collapse-tags
    multiple
    @change="$emit('update:modelValue', $event)"
    no-data-text="no category found"
    class="w-full"
    placeholder=""
  />
</template>

<script>
import { defineComponent } from 'vue'
import Autocomplete from '@/Components/Utils/Autocomplete'
import { debounce } from 'lodash'

export default defineComponent({
  name: 'CompanyCategorySearchAutocomplete',
  components: {
    Autocomplete
  },
  emits: ['update:modelValue'],
  props: ['modelValue', 'initialCategories'],
  data() {
    return {
      loading: false,
      categories: this.modelValue,
      options: this.initialCategories
    }
  },

  methods: {
    searchInCategory() {},
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
          route('company.category.search', {
            query: query
          })
        )
        .then((res) => {
          this.options = res.data.data
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
