<template>
  <Head title="Email Verification" />

  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      Thanks for signing up! Before getting started, could you verify your email
      address by clicking on the link we just emailed to you? If you didn't
      receive the email, we will gladly send you another.
    </div>

    <div
      class="mb-4 font-medium text-sm text-green-600"
      v-if="verificationLinkSent"
    >
      A new verification link has been sent to the email address you provided
      during registration.
    </div>

    <form @submit.prevent="submit">
      <div class="mt-4 flex items-center justify-between">
        <t-button
          :class="{ 'opacity-45': form.processing }"
          :loading="form.processing"
        >
          Resend Verification Email
        </t-button>

        <Link
          :href="route('logout')"
          method="post"
          as="button"
          class="underline text-sm text-gray-600 hover:text-gray-900"
        >
          Log Out
        </Link>
      </div>
    </form>
  </jet-authentication-card>
</template>

<script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Components/Utils/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Components/Utils/AuthenticationCardLogo.vue'
import TButton from '@/Components/Utils/Button.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    TButton,
    Link
  },

  props: {
    status: String
  },

  data() {
    return {
      form: this.$inertia.form()
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('verification.send'))
    }
  },

  computed: {
    verificationLinkSent() {
      return this.status === 'verification-link-sent'
    }
  }
})
</script>
