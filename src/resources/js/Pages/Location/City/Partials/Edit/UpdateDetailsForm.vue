<template>
  <t-form-section @submitted="updateCityInformation">
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
    </template>
    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        <ActionSuccessMessage />
      </action-message>

      <el-button
        type="black"
        class="text-xs tracking-widest uppercase"
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
import FormLabel from '@/Components/Utils/Label'

export default defineComponent({
  name: 'UpdateDetailsForm',
  components: {
    FormLabel,
    ActionSuccessMessage,
    ActionMessage,
    Button,
    TFormSection,
    TInput,
    InputError
  },

  props: ['city'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.city.name
      })
    }
  },

  methods: {
    updateCityInformation() {
      this.form.put(route('location.city.update', { city: this.city.id }), {
        errorBag: 'updateCityInformation',
        preserveScroll: true
      })
    }
  }
})
</script>
