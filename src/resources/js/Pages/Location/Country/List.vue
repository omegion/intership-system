<template>
  <app-layout title="Country List">
    <template #header-title>Country List</template>
    <template #header-actions>
      <div class="flex">
        <el-form ref="form" label-width="120px">
          <el-input
            v-model="query"
            name="query"
            prefix-icon="el-icon-search"
            placeholder="Search in countries"
            type="text"
            class="pr-3"
            @input="search"
          ></el-input>
        </el-form>
        <Link :href="route('location.country.create')" class="">
          <el-button type="primary">Create</el-button>
        </Link>
      </div>
    </template>
    <div class="mx-auto sm:px-6 lg:max-w-7xl lg:grid lg:grid-cols-5 lg:gap-x-8">
      <div class="lg:col-span-6">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <CountryTable :countries="countries" />
        </div>
        <div class="pt-3">
          <pagination
            class="pt-2"
            :path="countries.path"
            :links="countries.links"
            :total="countries.total"
            :per-page="countries.per_page"
            :current-page="countries.current_page"
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
import CountryTable from '@/Pages/Location/Country/Partials/List/Table'
import TButton from '@/Components/Utils/Button'
import { Inertia } from '@inertiajs/inertia'
import { debounce } from 'lodash'

export default defineComponent({
  props: ['countries'],

  components: {
    TButton,
    CountryTable,
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
