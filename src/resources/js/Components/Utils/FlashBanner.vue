<template>
  <div>
    <banner :message="message" :type="style" v-if="message !== ''" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import Banner from '@/Components/Utils/Banner'

export default defineComponent({
  components: { Banner },
  computed: {
    style() {
      return this.$page.props.jetstream.flash?.bannerStyle || 'success'
    },

    message() {
      return this.$page.props.jetstream.flash?.banner || ''
    }
  }
})
</script>
