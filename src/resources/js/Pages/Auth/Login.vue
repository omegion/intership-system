<template>
  <Head title="Log in" />

  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <jet-validation-errors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <jet-label for="email" value="Email" />
        <t-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          placeholder="Email"
          required
          autofocus
        />
      </div>

      <div class="mt-4">
        <jet-label for="password" value="Password" />
        <t-input
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="current-password"
        />
      </div>

      <div class="block mt-4">
        <label class="flex items-center">
          <jet-checkbox name="remember" v-model:checked="form.remember" />
          <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="underline text-sm text-gray-600 hover:text-gray-900"
        >
          Forgot your password?
        </Link>

        <t-button
          class="ml-4"
          :class="{ 'opacity-45': form.processing }"
          :loading="form.processing"
        >
          Log in
        </t-button>
      </div>
    </form>
  </jet-authentication-card>
</template>

<script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Components/Utils/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Components/Utils/AuthenticationCardLogo.vue'
import TButton from '@/Components/Utils/Button.vue'
import TInput from '@/Components/Utils/Input.vue'
import JetCheckbox from '@/Components/Utils/Checkbox.vue'
import JetLabel from '@/Components/Utils/Label.vue'
import JetValidationErrors from '@/Components/Utils/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    TButton,
    TInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Link
  },

  props: {
    canResetPassword: Boolean,
    status: String
  },

  data() {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false
      })
    }
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? 'on' : ''
        }))
        .post(this.route('login'), {
          onFinish: () => this.form.reset('password')
        })
    }
  }
})
</script>
