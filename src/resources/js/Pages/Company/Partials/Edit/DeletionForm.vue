<template>
  <ActionSection>
    <template #title>Delete Company</template>

    <template #description>Permanently delete {{ company.name }}.</template>

    <template #content>
      <div class="max-w-xl text-sm text-gray-600">
        Once this company is deleted, all of its resources and data will be
        permanently deleted. If another resources are depending on this company,
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
          Delete Company
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
  name: 'CompanyDeletionForm',
  props: ['company'],
  components: {
    ActionSection,
    InputError
  },

  data() {
    return {
      form: this.$inertia.form({})
    }
  },

  methods: {
    open() {
      this.$confirm(
        `You are about to delete ${this.company.name}. This action cannot be undone.`,
        `Warning`,
        {
          confirmButtonText: 'Delete',
          confirmButtonClass: 'el-button--danger',
          cancelButtonText: 'Cancel',
          type: 'warning',
          showClose: false
        }
      )
        .then(() => this.deleteConfirm())
        .catch()
    },
    deleteConfirm() {
      this.$confirm('Do you want to delete?', 'Warning', {
        confirmButtonText: 'Yes',
        confirmButtonClass: 'el-button--danger',
        type: 'error',
        showClose: false
      })
        .then(() => this.delete())
        .catch()
    },
    delete() {
      this.form.delete(route('company.destroy', { company: this.company.id }), {
        preserveScroll: true,
        errorBag: 'destroyCompany',
        onFinish: () => this.form.reset()
      })
    }
  }
})
</script>
