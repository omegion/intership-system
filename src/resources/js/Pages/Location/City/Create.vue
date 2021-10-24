<template>
  <app-layout title="Create a city">
    <template #header-title>Create City</template>
    <template #header>
      <el-breadcrumb separator-class="el-icon-arrow-right">
        <el-breadcrumb-item>Location</el-breadcrumb-item>
        <el-breadcrumb-item>
          <Link
            class="font-medium text-gray-500 hover:text-gray-700"
            :href="route('location.city.list')"
          >
            City List
          </Link>
        </el-breadcrumb-item>
        <el-breadcrumb-item>Create</el-breadcrumb-item>
      </el-breadcrumb>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <CreateCityForm :user="$page.props.user" />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import UpdateDetailsForm from '@/Pages/Location/City/Partials/Edit/UpdateDetailsForm'
import SectionBorder from '@/Components/Utils/SectionBorder'
import { Link } from '@inertiajs/inertia-vue3'
import CityHeader from '@/Pages/Location/City/Partials/Header'
import CityDeletionForm from '@/Pages/Location/City/Partials/Edit/DeletionForm'
import CreateCityForm from '@/Pages/Location/City/Partials/Create/CreateCityForm'

export default defineComponent({
  components: {
    CreateCityForm,
    CityDeletionForm,
    CityHeader,
    SectionBorder,
    UpdateDetailsForm,
    Link,
    AppLayout
  }
})
</script>
