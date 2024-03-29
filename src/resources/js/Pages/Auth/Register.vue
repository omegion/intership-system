<template>
  <Head title="Register" />

  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <jet-validation-errors class="mb-4" />

    <form @submit.prevent="submit">
      <div>
        <jet-label for="name" value="Name" />
        <jet-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
        />
      </div>

      <div class="mt-4">
        <jet-label for="email" value="Email" />
        <jet-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
        />
      </div>

      <div class="mt-4">
        <jet-label for="password" value="Password" />
        <jet-input
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
        />
      </div>

      <div class="mt-4">
        <jet-label for="password_confirmation" value="Confirm Password" />
        <jet-input
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />
      </div>

      <div
        class="mt-4"
        v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
      >
        <jet-label for="terms">
          <div class="flex items-center">
            <jet-checkbox
              name="terms"
              id="terms"
              v-model:checked="form.terms"
            />

            <div class="ml-2">
              I agree to the
              <a
                target="_blank"
                :href="route('terms.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
              >
                Terms of Service
              </a>
              and
              <a
                target="_blank"
                :href="route('policy.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
              >
                Privacy Policy
              </a>
            </div>
          </div>
        </jet-label>
      </div>

      <div class="flex items-center justify-end mt-4">
        <Link
          :href="route('login')"
          class="underline text-sm text-gray-600 hover:text-gray-900"
        >
          Already registered?
        </Link>

        <t-button
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :loading="form.processing"
        >
          Register
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
import JetInput from '@/Components/Utils/Input.vue'
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
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Link
  },

  data() {
    return {
      form: this.$inertia.form({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false
      })
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('register'), {
        onFinish: () => this.form.reset('password', 'password_confirmation')
      })
    }
  }
})
</script>
