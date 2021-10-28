<template>
  <app-layout title="Create a company category">
    <template #header-title>Create Company Category</template>
    <template #header>
      <el-breadcrumb separator-class="el-icon-arrow-right">
        <el-breadcrumb-item>Company</el-breadcrumb-item>
        <el-breadcrumb-item>
          <Link
            class="font-medium text-gray-500 hover:text-gray-700"
            :href="route('company.category.list')"
          >
            Category List
          </Link>
        </el-breadcrumb-item>
        <el-breadcrumb-item>Create</el-breadcrumb-item>
      </el-breadcrumb>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <CreateCategoryForm />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'
import CreateCategoryForm from '@/Pages/Company/Category/Partials/Create/CreateCategoryForm'

export default defineComponent({
  components: {
    CreateCategoryForm,
    Link,
    AppLayout
  }
})
</script>
