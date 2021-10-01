<template>
  <div class="flex">
    <!-- Logo -->
    <div class="flex-shrink-0 flex items-center">
      <Link :href="route('dashboard')">
        <jet-application-mark class="block h-9 w-auto" />
      </Link>
    </div>

    <!-- Navigation Links -->
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
      <jet-nav-link
        :href="route('dashboard')"
        :active="route().current('dashboard')"
      >
        Dashboard
      </jet-nav-link>
      <jet-nav-link
        :href="route('company.list')"
        :active="route().current('company.list')"
      >
        Company
      </jet-nav-link>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'
import JetBanner from '@/Jetstream/Banner.vue'
import JetNavLink from '@/Jetstream/NavLink.vue'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'navbar',
  components: {
    Head,
    JetApplicationMark,
    JetBanner,
    JetNavLink,
    JetResponsiveNavLink,
    Link
  },

  data() {
    return {
      showingNavigationDropdown: false
    }
  },

  methods: {}
})
</script>
