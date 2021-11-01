<template>
  <FormSection @submitted="store">
    <template #title>Category Information</template>

    <template #description>
      Provide company category information. Category defines the market where a
      company operates.
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
          placeholder="e.g. Telecommunication"
        />
        <FormInputError :message="form.errors.name" class="mt-2" />
        <FormInputError :message="form.errors.slug" class="mt-2" />
      </div>
    </template>
    <template #actions>
      <ActionMessage :on="form.recentlySuccessful" class="mr-3">
        <ActionSuccessMessage />
      </ActionMessage>

      <el-button
        type="black"
        class="text-xs tracking-widest uppercase"
        :class="{ 'opacity-45': form.processing }"
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
  name: 'CreateInternshipForm',
  components: {
    FormSection,
    FormInputError,
    FormLabel,
    ActionMessage,
    ActionSuccessMessage,
    TInput
  },

  data() {
    return {
      form: this.$inertia.form({
        _method: 'POST',
        name: ''
      })
    }
  },

  methods: {
    store() {
      this.form.post(route('company.category.store'), {
        preserveScroll: true
      })
    }
  }
})
</script>
