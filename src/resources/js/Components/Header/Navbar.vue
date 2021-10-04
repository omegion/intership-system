<template>
  <div class="flex">
    <!-- Logo -->
    <div class="flex-shrink-0 flex items-center">
      <Link :href="route('dashboard')">
        <jet-application-mark class="block h-9 w-auto" />
      </Link>
    </div>

    <div class="ml-3 relative"></div>

    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
      <t-nav-link
        :href="route('dashboard')"
        :active="route().current('dashboard')"
      >
        Dashboard
      </t-nav-link>
      <t-nav-link
        :href="route('company.list')"
        :active="route().current('company.*')"
      >
        <t-dropdown width="w-58" trigger="hover">
          <template #trigger>Company</template>
          <template #content>
            <div class="p-4">
              <t-dropdown-item :href="route('company.list')" class="my-2">
                <div
                  class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50"
                >
                  <base-icon name="ViewGrid" class="text-white" />
                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">List</p>
                    <p class="mt-1 text-sm text-gray-500">
                      List of all companies that you can search.
                    </p>
                  </div>
                </div>
              </t-dropdown-item>
              <t-dropdown-item :href="route('company.add')" class="my-2">
                <div
                  class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50"
                >
                  <base-icon name="ViewGridAdd" />

                  <div class="ml-4">
                    <p class="text-base font-medium text-gray-900">Add</p>
                    <p class="mt-1 text-sm text-gray-500">
                      Add new company to be listed in the system.
                    </p>
                  </div>
                </div>
              </t-dropdown-item>
            </div>
          </template>
        </t-dropdown>
      </t-nav-link>
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
  name: 'navbar',
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
