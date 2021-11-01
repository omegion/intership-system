<template>
  <app-layout title="Create a company category">
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
                :href="route('company.show', { company: company.id })"
              >
                {{ company.name }}
              </Link>
            </el-breadcrumb-item>
            <el-breadcrumb-item>Create Internship</el-breadcrumb-item>
          </el-breadcrumb>
        </template>
      </Header>
    </template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <CreateCategoryForm
        :company="company"
        :initial-countries="initialCountries"
        :initial-cities="initialCities"
      />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/inertia-vue3'
import CreateCategoryForm from '@/Pages/Company/Category/Partials/Create/CreateCategoryForm'
import Header from '@/Pages/Company/Partials/Header'

export default defineComponent({
  props: ['company', 'initialCountries', 'initialCities'],

  components: {
    CreateCategoryForm,
    Link,
    AppLayout,
    Header
  }
})
</script>
