<template>
  <Head title="Secure Area" />

  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      This is a secure area of the application. Please confirm your password
      before continuing.
    </div>

    <jet-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
      <div>
        <jet-label for="password" value="Password" />
        <jet-input
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="current-password"
          autofocus
        />
      </div>

      <div class="flex justify-end mt-4">
        <t-button
          class="ml-4"
          :class="{ 'opacity-45': form.processing }"
          :loading="form.processing"
        >
          Confirm
        </t-button>
      </div>
    </form>
  </jet-authentication-card>
</template>

<script>
import { defineComponent } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'
import JetAuthenticationCard from '@/Components/Utils/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Components/Utils/AuthenticationCardLogo.vue'
import TButton from '@/Components/Utils/Button.vue'
import JetInput from '@/Components/Utils/Input.vue'
import JetLabel from '@/Components/Utils/Label.vue'
import JetValidationErrors from '@/Components/Utils/ValidationErrors.vue'

export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    TButton,
    JetInput,
    JetLabel,
    JetValidationErrors
  },

  data() {
    return {
      form: this.$inertia.form({
        password: ''
      })
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('password.confirm'), {
        onFinish: () => this.form.reset()
      })
    }
  }
})
</script>
