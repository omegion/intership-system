<template>
  <div class="px-3 mt-6 relative inline-block text-left">
    <div>
      <t-dropdown placement="bottom" width="w-56" trigger="click" class="block">
        <template #trigger>
          <button
            type="button"
            class="
              group
              w-full
              bg-gray-100
              rounded-md
              px-3.5
              py-2
              text-sm text-left
              font-medium
              text-gray-700
              hover:bg-gray-200
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-offset-gray-100
              focus:ring-purple-500
            "
            id="options-menu-button"
            aria-expanded="false"
            aria-haspopup="true"
          >
            <span class="flex w-full justify-between items-center">
              <span class="flex min-w-0 items-center justify-between space-x-3">
                <img
                  class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                  :src="$page.props.user.profile_photo_url"
                  :alt="$page.props.user.name"
                />
                <span class="flex-1 flex flex-col min-w-0">
                  <span class="text-gray-900 text-sm font-medium truncate">
                    {{ $page.props.user.name }}
                  </span>
                  <span class="text-gray-500 text-sm truncate">
                    @jessyschwarz
                  </span>
                </span>
              </span>
              <svg
                class="
                  flex-shrink-0
                  h-5
                  w-5
                  text-gray-400
                  group-hover:text-gray-500
                "
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </span>
          </button>
        </template>
        <template #content>
          <t-dropdown-item :href="route('profile.show')">
            View profile
          </t-dropdown-item>
          <t-dropdown-item :href="route('company.list')">
            View profile
          </t-dropdown-item>
        </template>
      </t-dropdown>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import JetApplicationMark from '@/Components/Utils/ApplicationMark.vue'
import JetBanner from '@/Components/Utils/Banner.vue'
import TNavLink from '@/Components/Utils/NavLink.vue'
import JetResponsiveNavLink from '@/Components/Utils/ResponsiveNavLink.vue'
import TDropdown from '@/Components/Utils/Dropdown.vue'
import TDropdownItem from '@/Components/Utils/DropdownItem.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import BaseIcon from '@/Components/Utils/BaseIcon'

export default defineComponent({
  components: {
    Head,
    JetApplicationMark,
    JetBanner,
    TNavLink,
    JetResponsiveNavLink,
    TDropdown,
    TDropdownItem,
    BaseIcon,
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
