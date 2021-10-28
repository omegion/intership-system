<template>
  <FormSection @submitted="storeCountry">
    <template #title>Company Information</template>

    <template #description>
      Define information about the company. It is important that you provide
      valid information.
    </template>

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
          placeholder="Germany"
        />
        <FormInputError :message="form.errors.name" class="mt-2" />
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
          placeholder="DE"
        />
        <FormInputError :message="form.errors.code" class="mt-2" />
      </div>

      <!-- Flag URL -->
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
          placeholder="https://flagcdn.com/de.svg"
        />
        <FormInputError :message="form.errors.flag_url" class="mt-2" />
      </div>
    </template>
    <template #actions>
      <ActionMessage :on="form.recentlySuccessful" class="mr-3">
        <ActionSuccessMessage />
      </ActionMessage>

      <el-button
        :class="({ 'opacity-45': form.processing }, 'submit')"
        :loading="form.processing"
        native-type="submit"
      >
        Save
      </el-button>
    </template>
  </FormSection>
</template>

<script>
import { defineComponent } from 'vue'
import TInput from '@/Components/Utils/Input.vue'
import ActionSuccessMessage from '@/Components/Utils/ActionSuccessMessage'
import ActionMessage from '@/Components/Utils/ActionMessage'
import FormLabel from '@/Components/Utils/Label'
import FormInputError from '@/Components/Utils/InputError'
import FormSection from '@/Components/Utils/FormSection'

export default defineComponent({
  name: 'CreateCountryForm',
  components: {
    FormSection,
    FormInputError,
    FormLabel,
    ActionMessage,
    ActionSuccessMessage,
    TInput
  },

  props: ['user'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'POST',
        name: '',
        code: '',
        flag_url: ''
      })
    }
  },

  methods: {
    storeCountry() {
      this.form.post(route('location.country.store'), {
        preserveScroll: true
      })
    }
  }
})
</script>
