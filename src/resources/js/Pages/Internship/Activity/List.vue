<template>
  <app-layout title="Company Activities">
    <template #header>
      <Header :company="company">
        <template #breadcrumb>
          <el-breadcrumb separator-class="el-icon-arrow-right">
            <el-breadcrumb-item>Company</el-breadcrumb-item>
            <el-breadcrumb-item>
              <Link
                class="font-medium text-gray-500 hover:text-gray-700"
                :href="route('company.list')"
              >
                List
              </Link>
            </el-breadcrumb-item>
            <el-breadcrumb-item>
              <Link
                class="font-medium text-gray-500 hover:text-gray-700"
                :href="route('company.list')"
              >
                {{ company.name }}
              </Link>
            </el-breadcrumb-item>
            <el-breadcrumb-item>Activities</el-breadcrumb-item>
          </el-breadcrumb>
        </template>
      </Header>
    </template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div
        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
      >
        <ListTable :activities="activities" />
      </div>
      <div class="pt-3">
        <pagination
          class="pt-2"
          :path="activities.path"
          :links="activities.links"
          :total="activities.total"
          :per-page="activities.per_page"
          :current-page="activities.current_page"
        />
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
import Header from '@/Pages/Company/Partials/Header'
import ListTable from '@/Pages/Company/Activity/Partials/ListTable'

export default defineComponent({
  props: ['company', 'activities'],
  components: {
    ListTable,
    Header,
    AppLayout,
    Pagination,
    Link,
    BadgeCheckIcon
  }
})
</script>
