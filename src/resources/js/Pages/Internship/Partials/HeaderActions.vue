<template>
  <span class="hidden sm:block">
    <Link
      :href="route('internship.edit', { internship: internship.id })"
      class="px-2"
    >
      <t-button secondary type="href">Edit</t-button>
    </Link>
  </span>
</template>

<script>
import { defineComponent } from 'vue'
import TButton from '@/Components/Utils/Button'
import BaseIcon from '@/Components/Utils/BaseIcon'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'InternshipHeaderActions',
  components: { BaseIcon, TButton, Link },
  props: ['internship']
})
</script>
