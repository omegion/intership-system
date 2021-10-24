<template>
  <app-layout :title="country.name">
    <template #header>
      <CountryHeader :country="country"></CountryHeader>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <UpdateDetailsForm :country="country" />
      <section-border />
      <CountryDeletionForm :country="country" />
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

export default defineComponent({
  props: ['country'],

  components: {
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
