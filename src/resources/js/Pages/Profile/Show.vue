<template>
  <app-layout title="Profile">
    <template #header-title>Profile</template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div v-if="$page.props.jetstream.canUpdateProfileInformation">
        <update-profile-information-form :user="$page.props.user" />

        <jet-section-border />
      </div>

      <div v-if="$page.props.jetstream.canUpdatePassword">
        <update-password-form class="mt-10 sm:mt-0" />

        <jet-section-border />
      </div>

      <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
        <two-factor-authentication-form class="mt-10 sm:mt-0" />

        <jet-section-border />
      </div>

      <logout-other-browser-sessions-form
        :sessions="sessions"
        class="mt-10 sm:mt-0"
      />

      <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
        <jet-section-border />

        <delete-user-form class="mt-10 sm:mt-0" />
      </template>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue'
import JetSectionBorder from '@/Components/Utils/SectionBorder.vue'
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue'
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue'
import TButton from '@/Components/Utils/Button'

export default defineComponent({
  props: ['sessions'],

  components: {
    TButton,
    AppLayout,
    DeleteUserForm,
    JetSectionBorder,
    LogoutOtherBrowserSessionsForm,
    TwoFactorAuthenticationForm,
    UpdatePasswordForm,
    UpdateProfileInformationForm
  }
})
</script>
