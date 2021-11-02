<template>
  <app-layout title="Internship List">
    <template #header-title>Internship List</template>
    <div class="mx-auto sm:px-6 lg:max-w-7xl lg:grid lg:grid-cols-5 lg:gap-x-4">
      <div class="lg:col-span-4 lg:border-r lg:border-gray-200 lg:pr-4">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <InternshipTable :internships="internships" />
        </div>
        <div class="pt-3">
          <pagination
            class="pt-2"
            :path="internships.path"
            :links="internships.links"
            :total="internships.total"
            :per-page="internships.per_page"
            :current-page="internships.current_page"
          />
        </div>
      </div>
      <div class="mt-4 lg:mt-0 col-auto">
        <InternshipFilters />
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@/Components/Utils/Pagination'
import { Link } from '@inertiajs/inertia-vue3'
import { BadgeCheckIcon } from '@heroicons/vue/solid'
import InternshipTable from '@/Pages/Internship/Partials/List/Table'
import InternshipFilters from '@/Pages/Internship/Partials/List/Filters'

export default defineComponent({
  props: ['internships'],

  components: {
    InternshipFilters,
    InternshipTable,
    AppLayout,
    Pagination,
    Link,
    BadgeCheckIcon
  }
})
</script>
