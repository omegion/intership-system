<template>
  <span class="hidden sm:block">
    <Link :href="route('company.edit', { company: company.id })" class="px-2">
      <t-button secondary type="href">Edit</t-button>
    </Link>
    <t-button primary>Claim Intership</t-button>
  </span>
</template>

<script>
import { defineComponent } from 'vue'
import TButton from '@/Components/Utils/Button'
import BaseIcon from '@/Components/Utils/BaseIcon'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'HeaderActions',
  components: { BaseIcon, TButton, Link },
  props: ['company']
})
</script>
