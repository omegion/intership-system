<template>
  <div class="col-span-12">
    <div class="grid grid-cols-2 gap-0">
      <div class="">
        <p class="text-sm font-medium text-gray-900">
          {{ role.name }}
        </p>
        <p class="text-sm text-gray-500 text-justify">
          {{ role.description }}
        </p>
      </div>
      <div class="flex items-center justify-end text-right">
        <ActionMessage :on="form.recentlySuccessful" class="mr-3">
          <ActionSuccessMessage />
        </ActionMessage>

        <el-switch
          v-model="form.value"
          :loading="form.processing"
          @change="save"
        />
      </div>
    </div>
    <div v-if="hasBorder" class="pt-2 border-b border-gray-200"></div>
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
  name: 'UserRoleSwitch',
  props: {
    user: {},
    role: {},
    existingRoles: {},
    hasBorder: {
      type: Boolean,
      default: true
    }
  },
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
        value: this.existingRoles.some((e) => e.id === this.role.id)
      })
    }
  },
  methods: {
    save: debounce(function (value) {
      if (value) {
        this.form.put(
          route('user.addRoleToUser', {
            user: this.user.id,
            role_id: this.role.id
          }),
          {
            preserveScroll: true
          }
        )
      } else {
        this.form.delete(
          route('user.removeRoleFromUser', {
            user: this.user.id,
            role_id: this.role.id
          }),
          {
            preserveScroll: true
          }
        )
      }
    }, 300)
  }
})
</script>
