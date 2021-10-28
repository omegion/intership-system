<template>
  <app-layout title="Add Company">
    <template #header-title>Add Company</template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <add-company-form
        :user="$page.props.user"
        :initial-countries="initialCountries"
        :initial-cities="initialCities"
        :initial-categories="initialCategories"
      />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout'
import JetActionMessage from '@/Components/Utils/ActionMessage'
import TButton from '@/Components/Utils/Button'
import TFormSection from '@/Components/Utils/FormSection'
import TInput from '@/Components/Utils/Input'
import JetInputError from '@/Components/Utils/InputError'
import JetLabel from '@/Components/Utils/Label'
import JetSecondaryButton from '@/Components/Utils/SecondaryButton'
import AddCompanyForm from '@/Pages/Company/Partials/Add/AddCompanyForm'

export default defineComponent({
  components: {
    AddCompanyForm,
    AppLayout
  },

  props: ['user', 'initialCountries', 'initialCities', 'initialCategories']
})
</script>
