<template>
  <app-layout title="Create a country">
    <template #header-title>Create Country</template>
    <template #header>
      <el-breadcrumb separator-class="el-icon-arrow-right">
        <el-breadcrumb-item>Location</el-breadcrumb-item>
        <el-breadcrumb-item>
          <Link
            class="font-medium text-gray-500 hover:text-gray-700"
            :href="route('location.country.list')"
          >
            Country List
          </Link>
        </el-breadcrumb-item>
        <el-breadcrumb-item>Create</el-breadcrumb-item>
      </el-breadcrumb>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <CreateCountryForm :user="$page.props.user" />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Header from '@/Pages/Company/Partials/Header'
import UpdateDetailsForm from '@/Pages/Location/Country/Partials/Edit/UpdateDetailsForm'
import SectionBorder from '@/Components/Utils/SectionBorder'
import { Link } from '@inertiajs/inertia-vue3'
import CountryHeader from '@/Pages/Location/Country/Partials/Header'
import CountryDeletionForm from '@/Pages/Location/Country/Partials/Edit/DeletionForm'
import CreateCountryForm from '@/Pages/Location/Country/Partials/Create/CreateCountryForm'

export default defineComponent({
  components: {
    CreateCountryForm,
    CountryDeletionForm,
    CountryHeader,
    SectionBorder,
    UpdateDetailsForm,
    Header,
    Link,
    AppLayout
  }
})
</script>
