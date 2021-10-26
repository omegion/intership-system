<template>
  <div class="col-span-12">
    <div class="pb-4 flex items-center justify-between">
      <div class="flex flex-col">
        <p class="text-sm font-medium text-gray-900">
          {{ setting.name }}
        </p>
        <p class="text-sm text-gray-500">
          {{ setting.description }}
        </p>
      </div>
      <div class="flex items-center justify-end text-right">
        <ActionMessage :on="form.recentlySuccessful" class="mr-3">
          <ActionSuccessMessage />
        </ActionMessage>

        <el-switch
          v-if="setting.value_type === 'boolean'"
          v-model="form.value"
          :loading="form.processing"
          @change="save"
        />
        <el-input-number
          v-else-if="setting.value_type === 'integer'"
          v-model="form.value"
          controls-position="right"
          size="small"
          class="w-24"
          @change="save"
        />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import FormActionSection from '@/Components/Utils/ActionSection'
import FormLabel from '@/Components/Utils/Label'
import FormInputError from '@/Components/Utils/InputError'
import ActionMessage from '@/Components/Utils/ActionMessage'
import ActionSuccessMessage from '@/Components/Utils/ActionSuccessMessage'
import { debounce } from 'lodash'

export default defineComponent({
  name: 'Setting',
  props: ['setting'],
  components: {
    ActionSuccessMessage,
    ActionMessage,
    FormInputError,
    FormLabel,
    FormActionSection
  },
  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        value: this.setting.casted_value
      })
    }
  },
  methods: {
    save: debounce(function (value) {
      this.form.put(route('setting.update', { setting: this.setting.id }), {
        preserveScroll: true,
        onSuccess: () => this.success()
      })
    }, 300),
    success() {}
  }
})
</script>
