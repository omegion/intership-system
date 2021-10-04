<template>
  <component :is="currentIcon" class="flex-shrink-0 h-6 w-6 text-indigo-600" />
</template>

<script>
import { defineComponent, shallowRef } from 'vue'

export default defineComponent({
  props: {
    name: {
      type: String,
      required: true
    }
  },
  setup(props) {
    const currentIcon = shallowRef('')

    import(`./Icons/${props.name}Icon.vue`).then((val) => {
      currentIcon.value = val.default
    })

    return {
      currentIcon
    }
  }
})
</script>
