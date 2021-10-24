<template>
  <app-layout title="City List">
    <template #header-title>City List</template>
    <template #header-actions>
      <div class="flex">
        <el-form ref="form" label-width="120px">
          <el-input
            v-model="query"
            name="query"
            prefix-icon="el-icon-search"
            placeholder="Search in cities"
            type="text"
            class="pr-3"
            @input="search"
          ></el-input>
        </el-form>
        <Link :href="route('location.city.create')">
          <el-button type="primary">Create</el-button>
        </Link>
      </div>
    </template>
    <div class="mx-auto sm:px-6 lg:max-w-7xl lg:grid lg:grid-cols-5 lg:gap-x-8">
      <div class="lg:col-span-6">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <CityTable :cities="cities" />
        </div>
        <div class="pt-3">
          <pagination
            class="pt-2"
            :path="cities.path"
            :links="cities.links"
            :total="cities.total"
            :per-page="cities.per_page"
            :current-page="cities.current_page"
          />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@/Components/Utils/Pagination'
import { Link } from '@inertiajs/inertia-vue3'
import CityTable from '@/Pages/Location/City/Partials/List/Table'
import TButton from '@/Components/Utils/Button'
import { debounce } from 'lodash'
import { Inertia } from '@inertiajs/inertia'

export default defineComponent({
  props: ['cities'],
  components: {
    TButton,
    CityTable,
    AppLayout,
    Pagination,
    Link
  },
  data() {
    return {
      query: this.route().params?.query
    }
  },
  methods: {
    search: debounce(function () {
      Inertia.get(this.route(this.route().current(), { query: this.query }))
    }, 300)
  }
})
</script>
