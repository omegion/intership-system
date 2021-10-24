<template>
  <div
    class="
      mt-6
      flex flex-col-reverse
      justify-stretch
      space-y-4 space-y-reverse
      sm:flex-row-reverse
      sm:justify-end
      sm:space-x-reverse
      sm:space-y-0
      sm:space-x-3
      md:mt-0 md:flex-row md:space-x-3
    "
  >
    <Link
      :href="route('user.edit', { user: user.id })"
      class="
        inline-flex
        items-center
        justify-center
        px-4
        py-2
        border border-gray-300
        shadow-sm
        text-sm
        font-medium
        rounded-md
        text-gray-700
        bg-white
        hover:bg-gray-50
        focus:outline-none
        focus:ring-2
        focus:ring-offset-2
        focus:ring-offset-gray-100
        focus:ring-indigo-500
      "
    >
      Edit
    </Link>
    <button
      v-if="!user.verified_at"
      type="button"
      class="
        inline-flex
        items-center
        justify-center
        px-4
        py-2
        border border-transparent
        text-sm
        font-medium
        rounded-md
        shadow-sm
        text-white
        bg-indigo-600
        hover:bg-indigo-700
        focus:outline-none
        focus:ring-2
        focus:ring-offset-2
        focus:ring-offset-gray-100
        focus:ring-indigo-500
      "
    >
      Verify
    </button>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'HeaderActions',
  props: ['user'],
  components: { Link }
})
</script>
