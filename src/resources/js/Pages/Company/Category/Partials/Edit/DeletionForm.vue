<template>
  <ActionSection>
    <template #title>Delete Category</template>

    <template #description>Permanently delete {{ category.name }}.</template>

    <template #content>
      <div class="max-w-xl text-sm text-gray-600">
        Once this category is deleted, all of its resources and data will be
        permanently deleted. If another resources are depending on this
        category, they will be set to
        <code>null</code>
        .
      </div>

      <InputError :message="form.errors.flag_url" class="mt-2" />

      <div class="mt-5">
        <el-button
          type="danger"
          class="text-xs tracking-widest uppercase"
          :class="({ 'opacity-45': form.processing }, 'submit')"
          :loading="form.processing"
          @click="open"
        >
          Delete Category
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
  name: 'CategoryDeletionForm',
  props: ['category'],
  components: {
    ActionSection,
    InputError
  },

  data() {
    return {
      form: this.$inertia.form({
        password: ''
      })
    }
  },

  methods: {
    open() {
      this.$confirm(
        `You are about to delete ${this.category.name}. All relations with companies will be <strong>deleted</strong>. This action cannot be undone.`,
        `Warning`,
        {
          confirmButtonText: 'Delete',
          confirmButtonClass: 'el-button--danger',
          cancelButtonText: 'Cancel',
          type: 'warning',
          showClose: false,
          dangerouslyUseHTMLString: true
        }
      )
        .then(() => this.deleteConfirm())
        .catch(() => {})
    },
    deleteConfirm() {
      this.$confirm('Do you want to delete?', 'Warning', {
        confirmButtonText: 'Yes',
        confirmButtonClass: 'el-button--danger',
        type: 'error',
        showClose: false
      })
        .then(() => this.delete())
        .catch(() => {})
    },
    delete() {
      this.form.delete(
        route('company.category.destroy', { category: this.category.id }),
        {
          preserveScroll: true
        }
      )
    }
  }
})
</script>
