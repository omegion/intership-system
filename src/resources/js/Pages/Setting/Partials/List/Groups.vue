<template>
  <div v-for="(group, index) in groups">
    <SettingGroup :group="group" />
    <SectionBorder v-if="index + 1 !== groups.length" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import FormActionSection from '@/Components/Utils/ActionSection'
import FormSection from '@/Components/Utils/FormSection'
import Setting from '@/Pages/Setting/Partials/List/Setting'
import SettingGroup from '@/Pages/Setting/Partials/List/Group'
import SectionBorder from '@/Components/Utils/SectionBorder'

export default defineComponent({
  name: 'SettingGroups',
  props: ['groups'],
  components: {
    SectionBorder,
    SettingGroup,
    Setting,
    FormSection,
    FormActionSection
  }
})
</script>
