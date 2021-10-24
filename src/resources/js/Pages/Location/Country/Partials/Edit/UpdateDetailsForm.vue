<template>
  <t-form-section @submitted="updateCountryInformation">
    <template #title>Basic Information</template>

    <template #description>Update company's information.</template>

    <template #form>
      <!-- Name -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="name" value="Name" />
        <t-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          autocomplete="name"
        />
        <InputError :message="form.errors.name" class="mt-2" />
      </div>

      <!-- Code -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel
          for="code"
          value="Code"
          helper="Country code is universal shortage code of the country."
        />
        <t-input
          id="code"
          type="text"
          class="mt-1 block w-full"
          v-model="form.code"
          autocomplete="code"
        />
        <InputError :message="form.errors.code" class="mt-2" />
      </div>

      <!-- Code -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel
          for="flag_url"
          value="Flag URL"
          helper="You can set a flag image for the country by defining a valid URL. You can use https://flagcdn.com to get free flags."
        />
        <t-input
          id="flag_url"
          type="text"
          class="mt-1 block w-full"
          v-model="form.flag_url"
          autocomplete="flag_url"
        />
        <InputError :message="form.errors.flag_url" class="mt-2" />
      </div>
    </template>
    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        <ActionSuccessMessage />
      </action-message>

      <el-button
        :class="({ 'opacity-45': form.processing }, 'submit')"
        :loading="form.processing"
        native-type="submit"
      >
        Save
      </el-button>
    </template>
  </t-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import Button from '@/Components/Utils/Button.vue'
import TFormSection from '@/Components/Utils/FormSection.vue'
import TInput from '@/Components/Utils/Input.vue'
import InputError from '@/Components/Utils/InputError.vue'
import ActionMessage from '@/Components/Utils/ActionMessage.vue'
import ActionSuccessMessage from '@/Components/Utils/ActionSuccessMessage'
import CountrySelectBox from '@/Components/Utils/CountrySelectBox'
import CitySelectBox from '@/Components/Utils/CitySelectBox'
import FormLabel from '@/Components/Utils/Label'

export default defineComponent({
  name: 'UpdateDetailsForm',
  components: {
    FormLabel,
    CitySelectBox,
    CountrySelectBox,
    ActionSuccessMessage,
    ActionMessage,
    Button,
    TFormSection,
    TInput,
    InputError
  },

  props: ['country'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.country.name,
        code: this.country.code,
        flag_url: this.country.flag_url
      })
    }
  },

  methods: {
    updateCountryInformation() {
      this.form.put(
        route('location.country.update', { country: this.country.id }),
        {
          errorBag: 'updateCountryInformation',
          preserveScroll: true
        }
      )
    }
  }
})
</script>
