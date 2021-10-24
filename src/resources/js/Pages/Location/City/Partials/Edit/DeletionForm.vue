<template>
  <ActionSection>
    <template #title>Delete City</template>

    <template #description>Permanently delete {{ city.name }}.</template>

    <template #content>
      <div class="max-w-xl text-sm text-gray-600">
        Once this city is deleted, all of its resources and data will be
        permanently deleted. If another resources are depending on this city,
        they will be set to
        <code>null</code>
        .
      </div>

      <InputError :message="form.errors.flag_url" class="mt-2" />

      <div class="mt-5">
        <el-button
          type="danger"
          class="text-xs tracking-widest uppercase"
          @click="open"
        >
          Delete City
        </el-button>
      </div>
    </template>
  </ActionSection>
</template>

<script>
import { defineComponent } from 'vue'
import InputError from '@/Components/Utils/InputError.vue'
import ActionSection from '@/Components/Utils/ActionSection'

export default defineComponent({
  name: 'CityDeletionForm',
  props: ['city'],
  components: {
    ActionSection,
    InputError
  },

  data() {
    return {
      centerDialogVisible: false,
      confirmingUserDeletion: false,

      form: this.$inertia.form({
        password: ''
      })
    }
  },

  methods: {
    open() {
      this.$confirm(
        `You are about to delete ${this.city.name}. This action cannot be undone.`,
        `Warning`,
        {
          confirmButtonText: 'Delete',
          confirmButtonClass: 'el-button--danger',
          cancelButtonText: 'Cancel',
          type: 'warning',
          showClose: false
        }
      )
        .then(() => {
          this.delete()
        })
        .catch(() => {})
    },
    delete() {
      this.form.delete(route('location.city.destroy', { city: this.city.id }), {
        preserveScroll: true,
        errorBag: 'destroyCity',
        onError: () => this.$refs.password.focus(),
        onFinish: () => this.form.reset()
      })
    }
  }
})
</script>
