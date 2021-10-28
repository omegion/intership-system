<template>
  <app-layout title="Company List">
    <template #header-title>asdasd</template>
    asd
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import CompanyInformation from '@/Pages/Company/Partials/Show/CompanyInformation'
import Banner from '@/Components/Utils/Banner'
import ActivityTimeline from '@/Pages/Company/Partials/Show/ActivityTimeline'
import Header from '@/Pages/Company/Partials/Header'
import HeaderActions from '@/Pages/Company/Partials/HeaderActions'

export default defineComponent({
  props: ['internship'],

  components: {
    HeaderActions,
    Header,
    ActivityTimeline,
    Banner,
    CompanyInformation,
    AppLayout
  }
})
</script>
