<template>
  <app-layout title="Setting List">
    <template #header-title>Setting List</template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <SettingGroups :groups="settingGroups"></SettingGroups>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import SettingGroups from '@/Pages/Setting/Partials/List/Groups'

export default defineComponent({
  props: ['settingGroups'],

  components: {
    SettingGroups,
    AppLayout
  }
})
</script>
