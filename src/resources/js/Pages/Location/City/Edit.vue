<template>
  <app-layout :title="city.name">
    <template #header>
      <CityHeader :city="city"></CityHeader>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <UpdateDetailsForm :city="city" />
      <section-border />
      <CityDeletionForm :city="city" />
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

export default defineComponent({
  props: ['city'],

  components: {
    CityDeletionForm,
    CityHeader,
    SectionBorder,
    UpdateDetailsForm,
    Link,
    AppLayout
  }
})
</script>
