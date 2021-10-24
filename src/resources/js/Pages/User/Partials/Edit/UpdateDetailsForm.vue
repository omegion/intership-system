<template>
  <t-form-section @submitted="updateUserInformation">
    <template #title>Profile Information</template>

    <template #description>
      Update your account's profile information and email address.
    </template>

    <template #form>
      <!-- Name -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="name" value="Name" />
        <t-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          autocomplete="name"
        />
        <InputError :message="form.errors.name" class="mt-2" />
      </div>

      <!-- Email -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="email" value="Email" />
        <t-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
        />
        <InputError :message="form.errors.email" class="mt-2" />
      </div>
      <!-- Student ID -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="student_id" value="Student ID" />
        <t-input
          id="student_id"
          type="text"
          class="mt-1 block w-full"
          v-model="form.student_id"
        />
        <InputError :message="form.errors.student_id" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        <ActionSuccessMessage />
      </action-message>

      <Button
        :class="{ 'opacity-45': form.processing }"
        :loading="form.processing"
      >
        Save
      </Button>
    </template>
  </t-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import Button from '@/Components/Utils/Button.vue'
import TFormSection from '@/Components/Utils/FormSection.vue'
import TInput from '@/Components/Utils/Input.vue'
import InputError from '@/Components/Utils/InputError.vue'
import JetLabel from '@/Components/Utils/Label.vue'
import ActionMessage from '@/Components/Utils/ActionMessage.vue'
import ActionSuccessMessage from '@/Components/Utils/ActionSuccessMessage'

export default defineComponent({
  name: 'UpdateDetailsForm',
  components: {
    ActionSuccessMessage,
    ActionMessage,
    Button,
    TFormSection,
    TInput,
    InputError,
    JetLabel
  },

  props: ['user'],

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
