<template>
  <app-layout title="Company List">
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
            <el-breadcrumb-item>Edit</el-breadcrumb-item>
          </el-breadcrumb>
        </template>
      </Header>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <UpdateDetailsForm
        :company="company"
        :initial-countries="initialCountries"
        :initial-cities="initialCities"
      />
      <section-border />
      <UpdateVerificationForm
        v-if="hasPermission('can-verify-company')"
        :company="company"
      />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Header from '@/Pages/Company/Partials/Header'
import UpdateDetailsForm from '@/Pages/Company/Partials/Edit/UpdateDetailsForm'
import UpdateVerificationForm from '@/Pages/Company/Partials/Edit/UpdateVerificationForm'
import SectionBorder from '@/Components/Utils/SectionBorder'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  props: ['company', 'initialCountries', 'initialCities'],

  components: {
    SectionBorder,
    UpdateVerificationForm,
    UpdateDetailsForm,
    Header,
    Link,
    AppLayout
  }
})
</script>
