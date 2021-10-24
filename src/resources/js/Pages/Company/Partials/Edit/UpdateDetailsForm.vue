<template>
  <t-form-section @submitted="updateCompanyInformation">
    <template #title>Basic Information</template>

    <template #description>Update company's information.</template>

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
      <div class="col-span-6 sm:col-span-4 pb-3">
        <jet-label for="email" value="Email" />
        <t-input
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
        />
        <InputError :message="form.errors.email" class="mt-2" />
      </div>
    </template>
  </t-form-section>
  <t-form-section @submitted="updateCompanyInformation" class="mt-8">
    <template #title>Location Information</template>

    <template #description>Update company's location information.</template>

    <template #form>
      <!-- Country -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="country" value="Country" />
        <CountrySelectBox
          id="country"
          v-model="form.country_id"
          :initial-options="initialCountries"
        />
        <InputError :message="form.errors.country_id" class="mt-2" />
      </div>

      <!-- City -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="city" value="City" />
        <CitySelectBox
          id="city"
          v-model="form.city_id"
          :initial-options="initialCities"
        />
        <InputError :message="form.errors.city_id" class="mt-2" />
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
import CountrySelectBox from '@/Components/Utils/CountrySelectBox'
import CitySelectBox from '@/Components/Utils/CitySelectBox'

export default defineComponent({
  name: 'UpdateDetailsForm',
  components: {
    CitySelectBox,
    CountrySelectBox,
    ActionSuccessMessage,
    ActionMessage,
    Button,
    TFormSection,
    TInput,
    InputError,
    JetLabel
  },

  props: ['company', 'initialCountries', 'initialCities'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.company.name,
        email: this.company.email,
        country_id: this.company.country_id,
        city_id: this.company.city_id,
        photo: null
      }),

      photoPreview: null
    }
  },

  methods: {
    updateCompanyInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0]
      }

      this.form.post(route('company.update', { company: this.company.id }), {
        errorBag: 'updateCompanyInformation',
        preserveScroll: true,
        onSuccess: () => this.success()
      })
    },
    success() {}
  }
})
</script>
