<template>
  <jet-action-section>
    <template #title>Delete Country</template>

    <template #description>Permanently delete {{ country.name }}.</template>

    <template #content>
      <div class="max-w-xl text-sm text-gray-600">
        Once this country is deleted, all of its resources and data will be
        permanently deleted. If another resources are depending on this country,
        they will be set to
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
          Delete Country
        </el-button>
      </div>
    </template>
  </jet-action-section>
</template>

<script>
import { defineComponent } from 'vue'
import JetActionSection from '@/Components/Utils/ActionSection.vue'
import JetDialogModal from '@/Components/Utils/DialogModal.vue'
import JetDangerButton from '@/Components/Utils/DangerButton.vue'
import JetInput from '@/Components/Utils/Input.vue'
import InputError from '@/Components/Utils/InputError.vue'
import JetSecondaryButton from '@/Components/Utils/SecondaryButton.vue'

export default defineComponent({
  name: 'CountryDeletionForm',
  props: ['country'],
  components: {
    JetActionSection,
    JetDangerButton,
    JetDialogModal,
    JetInput,
    InputError,
    JetSecondaryButton
  },

  data() {
    return {
      form: this.$inertia.form({})
    }
  },

  methods: {
    open() {
      this.$confirm(
        `You are about to delete ${this.country.name}. This action cannot be undone.`,
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
      this.form.delete(
        route('location.country.destroy', { country: this.country.id }),
        {
          preserveScroll: true,
          errorBag: 'destroyCountry',
          onFinish: () => this.form.reset()
        }
      )
    }
  }
})
</script>
