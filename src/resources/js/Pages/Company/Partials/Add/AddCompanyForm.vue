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
      <div class="col-span-6 sm:col-span-4 pb-3">
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
  </t-form-section>
  <t-form-section @submitted="storeCompany" class="mt-8">
    <template #title>Location Information</template>

    <template #description>
      Define information about the company. It is important that you provide
      valid information.
    </template>

    <template #form>
      <!-- Country -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="country" value="Country" />
        <CountrySelectBox
          id="country"
          v-model="form.country_id"
          :initial-options="initialCountries"
        />
        <jet-input-error :message="form.errors.country_id" class="mt-2" />
      </div>

      <!-- City -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="city" value="City" />
        <CitySelectBox
          id="city"
          v-model="form.city_id"
          :initial-options="initialCities"
        />
        <jet-input-error :message="form.errors.city_id" class="mt-2" />
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
import CountrySelectBox from '@/Components/Utils/CountrySelectBox'
import CitySelectBox from '@/Components/Utils/CitySelectBox'

export default defineComponent({
  components: {
    CitySelectBox,
    CountrySelectBox,
    JetActionMessage,
    TButton,
    TFormSection,
    TInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton
  },

  props: ['user', 'initialCountries', 'initialCities'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'POST',
        name: '',
        email: '',
        country_id: '',
        city_id: ''
      }),

      photoPreview: null
    }
  },

  methods: {
    storeCompany() {
      this.form.post(route('company.store'), {
        errorBag: 'storeCompany',
        preserveScroll: true
      })
    }
  }
})
</script>
