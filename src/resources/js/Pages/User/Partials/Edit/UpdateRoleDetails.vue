<template>
  <FormSection @submitted="updateUserInformation">
    <template #title>Role Information</template>
    <template #description>
      Update your account's profile information and email address.
    </template>

    <template #form>
      <UserRoleSwitch
        v-for="(role, index) in roles"
        :user="user"
        :role="role"
        :existing-roles="user.role_list"
        :has-border="index + 1 !== roles.length"
        :key="index"
      />
    </template>
  </FormSection>
</template>

<script>
import { defineComponent } from 'vue'
import Button from '@/Components/Utils/Button.vue'
import ActionMessage from '@/Components/Utils/ActionMessage.vue'
import ActionSuccessMessage from '@/Components/Utils/ActionSuccessMessage'
import FormSection from '@/Components/Utils/FormSection'
import FormLabel from '@/Components/Utils/Label'
import FormInputError from '@/Components/Utils/InputError'
import UserRoleSwitch from '@/Pages/User/Partials/Edit/RoleSwitch'

export default defineComponent({
  name: 'UserUpdateRoleDetailsForm',
  components: {
    UserRoleSwitch,
    FormInputError,
    FormLabel,
    FormSection,
    ActionSuccessMessage,
    ActionMessage,
    Button
  },

  props: ['user', 'roles'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.user.name,
        email: this.user.email,
        student_id: this.user.student_id,
        photo: null
      }),

      photoPreview: null
    }
  },

  methods: {
    updateUserInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0]
      }

      this.form.post(route('user.update', { user: this.user.id }), {
        errorBag: 'updateUserInformation',
        preserveScroll: true,
        onSuccess: () => this.success()
      })
    },
    success() {}
  }
})
</script>
