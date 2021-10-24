<template>
  <app-layout title="Company List">
    <template #header-title>User List</template>
    <div class="mx-auto sm:px-6 lg:max-w-7xl lg:grid lg:grid-cols-5 lg:gap-x-8">
      <div class="lg:col-span-4 lg:border-r lg:border-gray-200 lg:pr-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <ListTable :users="users" />
        </div>
        <div class="pt-3">
          <pagination
            class="pt-2"
            :path="users.path"
            :links="users.links"
            :total="users.total"
            :per-page="users.per_page"
            :current-page="users.current_page"
          />
        </div>
      </div>
      <div class="mt-4 lg:mt-0 col-auto">
        <h2>Filters</h2>
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
import ListTable from '@/Pages/User/Partials/ListTable'

export default defineComponent({
  props: ['users'],

  components: {
    ListTable,
    AppLayout,
    Pagination,
    Link,
    BadgeCheckIcon
  }
})
</script>
