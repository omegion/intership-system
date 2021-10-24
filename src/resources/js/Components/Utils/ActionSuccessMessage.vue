<template>
  <div class="mt-3 flex items-center text-sm font-medium sm:mt-0 capitalize">
    <CheckCircleIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" />
    <p class="text-sm font-medium text-gray-500">Saved</p>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { CheckCircleIcon } from '@heroicons/vue/solid'

export default defineComponent({
  name: 'ActionSuccessMessage',
  components: { CheckCircleIcon },
  props: ['on']
})
</script>
