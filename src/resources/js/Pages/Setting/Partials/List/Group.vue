<template>
  <FormSection>
    <template #title>
      <span class="capitalize">{{ group.name }}</span>
    </template>

    <template #description>{{ group.description }}</template>

    <template #form>
      <Setting v-for="(setting, index) in group.settings" :setting="setting" />
    </template>
  </FormSection>
</template>

<script>
import { defineComponent } from 'vue'
import FormActionSection from '@/Components/Utils/ActionSection'
import FormSection from '@/Components/Utils/FormSection'
import Setting from '@/Pages/Setting/Partials/List/Setting'

export default defineComponent({
  name: 'SettingGroup',
  props: ['group'],
  components: {
    Setting,
    FormSection,
    FormActionSection
  }
})
</script>
