<template>
  <FormSection @submitted="storeCity">
    <template #title>City Information</template>

    <template #description>
      Define information about the city. It is important that you provide valid
      information.
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
          placeholder="Berlin"
        />
        <FormInputError :message="form.errors.name" class="mt-2" />
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
  name: 'CreateCityForm',
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
        name: ''
      })
    }
  },

  methods: {
    storeCity() {
      this.form.post(route('location.city.store'), {
        preserveScroll: true
      })
    }
  }
})
</script>
