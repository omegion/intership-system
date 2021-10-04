<template>
  <t-form-section @submitted="storeCompany">
    <template #title>Company Information</template>

    <template #description>
      Define information about the company. It is important that you provide
      valid information.
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
          placeholder="Example Company"
        />
        <jet-input-error :message="form.errors.name" class="mt-2" />
      </div>

      <!-- Email -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="email" value="Email" />
        <t-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          autocomplete="email"
          placeholder="example@company.com"
        />
        <jet-input-error :message="form.errors.email" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <jet-action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </jet-action-message>

      <t-button
        :class="{ 'opacity-45': form.processing }"
        :loading="form.processing"
      >
        Save
      </t-button>
    </template>
  </t-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import TButton from '@/Components/Utils/Button.vue'
import TFormSection from '@/Components/Utils/FormSection.vue'
import TInput from '@/Components/Utils/Input.vue'
import JetInputError from '@/Components/Utils/InputError.vue'
import JetLabel from '@/Components/Utils/Label.vue'
import JetActionMessage from '@/Components/Utils/ActionMessage.vue'
import JetSecondaryButton from '@/Components/Utils/SecondaryButton.vue'

export default defineComponent({
  components: {
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
        _method: 'POST',
        name: '',
        email: ''
      }),

      photoPreview: null
    }
  },

  methods: {
    storeCompany() {
      this.form.post(route('company.store'), {
        errorBag: 'storeCompany',
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
