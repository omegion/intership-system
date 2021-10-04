<template>
  <app-layout title="Add Company">
    <template #header-title>Add Company</template>
    <template #header-actions>
      <t-button secondary>Test</t-button>
      <t-button secondary>Test</t-button>
    </template>
    <div class="bg-gray-100">
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <add-company-form :user="$page.props.user" />
      </div>
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
import AddCompanyForm from '@/Pages/Company/Partials/AddCompanyForm'

export default defineComponent({
  components: {
    AddCompanyForm,
    AppLayout,
    JetActionMessage,
    TButton,
    TFormSection,
    TInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton
  },

  props: ['user'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.user.name,
        email: this.user.email,
        photo: null
      }),

      photoPreview: null
    }
  },

  methods: {
    updateProfileInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0]
      }

      this.form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => this.clearPhotoFileInput()
      })
    },

    selectNewPhoto() {
      this.$refs.photo.click()
    },

    updatePhotoPreview() {
      const photo = this.$refs.photo.files[0]

      if (!photo) return

      const reader = new FileReader()

      reader.onload = (e) => {
        this.photoPreview = e.target.result
      }

      reader.readAsDataURL(photo)
    },

    deletePhoto() {
      this.$inertia.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
          this.photoPreview = null
          this.clearPhotoFileInput()
        }
      })
    },

    clearPhotoFileInput() {
      if (this.$refs.photo?.value) {
        this.$refs.photo.value = null
      }
    }
  }
})
</script>
