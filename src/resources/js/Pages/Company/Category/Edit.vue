<template>
  <app-layout :title="category.name">
    <template #header>
      <CompanyCategoryHeader :category="category"></CompanyCategoryHeader>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <UpdateDetailsForm :category="category" />
      <section-border />
      <CategoryDeletionForm :category="category" />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import UpdateDetailsForm from '@/Pages/Company/Category/Partials/Edit/UpdateDetailsForm'
import SectionBorder from '@/Components/Utils/SectionBorder'
import { Link } from '@inertiajs/inertia-vue3'
import CompanyCategoryHeader from '@/Pages/Company/Category/Partials/Header'
import CategoryDeletionForm from '@/Pages/Company/Category/Partials/Edit/DeletionForm'

export default defineComponent({
  props: ['category'],

  components: {
    CategoryDeletionForm,
    CompanyCategoryHeader,
    SectionBorder,
    UpdateDetailsForm,
    Link,
    AppLayout
  }
})
</script>
