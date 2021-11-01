<template>
  <div>
    <div class="fixed bottom-0 inset-x-0 pb-2 sm:pb-5">
      <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="p-2 rounded-lg bg-indigo-600 shadow-lg sm:p-3">
          <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center">
              <span class="flex p-2 rounded-lg bg-indigo-800">
                <!-- Heroicon name: outline/speakerphone -->
                <svg
                  class="h-6 w-6 text-white"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  aria-hidden="true"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                  />
                </svg>
              </span>
              <p class="ml-3 font-medium text-white truncate">
                <span class="md:hidden">We announced a new product!</span>
                <span class="hidden md:inline">
                  Big news! We're excited to announce a brand new product.
                </span>
              </p>
            </div>
            <div
              class="
                order-3
                mt-2
                flex-shrink-0
                w-full
                sm:order-2 sm:mt-0 sm:w-auto
              "
            >
              <a
                href="#"
                class="
                  flex
                  items-center
                  justify-center
                  px-4
                  py-2
                  border border-transparent
                  rounded-md
                  shadow-sm
                  text-sm
                  font-medium
                  text-indigo-600
                  bg-white
                  hover:bg-indigo-50
                "
              >
                Learn more
              </a>
            </div>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
              <button
                type="button"
                class="
                  -mr-1
                  flex
                  p-2
                  rounded-md
                  hover:bg-indigo-500
                  focus:outline-none focus:ring-2 focus:ring-white
                "
              >
                <span class="sr-only">Dismiss</span>
                <!-- Heroicon name: outline/x -->
                <svg
                  class="h-6 w-6 text-white"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  aria-hidden="true"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <Head :title="title" />

    <div class="relative h-screen flex overflow-hidden bg-white">
      <sidebar />

      <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div
          class="
            relative
            z-10
            flex-shrink-0 flex
            h-16
            bg-white
            border-b border-gray-200
            lg:hidden
          "
        >
          <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
          <button
            class="
              px-4
              border-r border-gray-200
              text-gray-500
              focus:outline-none
              focus:ring-2
              focus:ring-inset
              focus:ring-purple-500
              lg:hidden
            "
          >
            <span class="sr-only">Open sidebar</span>
            <!-- Heroicon name: outline/menu-alt-1 -->
            <svg
              class="h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h8m-8 6h16"
              />
            </svg>
          </button>
          <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
            <div class="flex-1 flex">
              <form class="w-full flex md:ml-0" action="#" method="GET">
                <label for="search-field" class="sr-only">Search</label>
                <div
                  class="
                    relative
                    w-full
                    text-gray-400
                    focus-within:text-gray-600
                  "
                >
                  <div
                    class="
                      absolute
                      inset-y-0
                      left-0
                      flex
                      items-center
                      pointer-events-none
                    "
                  >
                    <!-- Heroicon name: solid/search -->
                    <svg
                      class="h-5 w-5"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </div>
                  <input
                    id="search-field"
                    name="search-field"
                    class="
                      block
                      w-full
                      h-full
                      pl-8
                      pr-3
                      py-2
                      border-transparent
                      text-gray-900
                      placeholder-gray-500
                      focus:outline-none
                      focus:ring-0
                      focus:border-transparent
                      focus:placeholder-gray-400
                      sm:text-sm
                    "
                    placeholder="Search"
                    type="search"
                  />
                </div>
              </form>
            </div>
            <div class="flex items-center">
              <!-- Profile dropdown -->
              <div class="ml-3 relative">
                <div>
                  <button
                    type="button"
                    class="
                      max-w-xs
                      bg-white
                      flex
                      items-center
                      text-sm
                      rounded-full
                      focus:outline-none
                      focus:ring-2
                      focus:ring-offset-2
                      focus:ring-purple-500
                    "
                    id="user-menu-button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <span class="sr-only">Open user menu</span>
                    <img
                      class="h-8 w-8 rounded-full"
                      src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                      alt=""
                    />
                  </button>
                </div>

                <div
                  class="
                    origin-top-right
                    absolute
                    right-0
                    mt-2
                    w-48
                    rounded-md
                    shadow-lg
                    bg-white
                    ring-1 ring-black ring-opacity-5
                    divide-y divide-gray-200
                    focus:outline-none
                  "
                  role="menu"
                  aria-orientation="vertical"
                  aria-labelledby="user-menu-button"
                  tabindex="-1"
                >
                  <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a
                      href="#"
                      class="text-gray-700 block px-4 py-2 text-sm"
                      role="menuitem"
                      tabindex="-1"
                      id="user-menu-item-0"
                    >
                      View profile
                    </a>
                    <a
                      href="#"
                      class="text-gray-700 block px-4 py-2 text-sm"
                      role="menuitem"
                      tabindex="-1"
                      id="user-menu-item-1"
                    >
                      Settings
                    </a>
                    <a
                      href="#"
                      class="text-gray-700 block px-4 py-2 text-sm"
                      role="menuitem"
                      tabindex="-1"
                      id="user-menu-item-2"
                    >
                      Notifications
                    </a>
                  </div>
                  <div class="py-1" role="none">
                    <a
                      href="#"
                      class="text-gray-700 block px-4 py-2 text-sm"
                      role="menuitem"
                      tabindex="-1"
                      id="user-menu-item-3"
                    >
                      Get desktop app
                    </a>
                    <a
                      href="#"
                      class="text-gray-700 block px-4 py-2 text-sm"
                      role="menuitem"
                      tabindex="-1"
                      id="user-menu-item-4"
                    >
                      Support
                    </a>
                  </div>
                  <div class="py-1" role="none">
                    <a
                      href="#"
                      class="text-gray-700 block px-4 py-2 text-sm"
                      role="menuitem"
                      tabindex="-1"
                      id="user-menu-item-5"
                    >
                      Logout
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <main
          class="
            flex-1
            relative
            z-0
            overflow-y-auto
            focus:outline-none
            bg-gray-100
          "
        >
          <div
            class="
              border-b border-gray-200
              px-4
              py-4
              sm:flex sm:items-center sm:justify-between sm:px-6
              lg:px-8
              bg-white
            "
          >
            <div class="flex-1 h-auto">
              <slot name="header" />
              <h1
                class="
                  pt-2
                  text-lg
                  font-medium
                  leading-6
                  text-gray-900
                  sm:truncate
                "
              >
                <slot name="header-title" />
              </h1>
            </div>
            <div class="mt-4 flex sm:mt-0 sm:ml-4">
              <slot name="header-actions" />
            </div>
          </div>
          <main>
            <flash-banner />
            <slot name="flash-banner" />
            <div class="py-10 bg-gray-50 min-h-screen">
              <slot></slot>
            </div>
          </main>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import JetApplicationMark from '@/Components/Utils/ApplicationMark.vue'
import FlashBanner from '@/Components/Utils/FlashBanner'
import TDropdown from '@/Components/Utils/Dropdown.vue'
import TDropdownItem from '@/Components/Utils/DropdownItem.vue'
import JetDropdownLink from '@/Components/Utils/DropdownItem.vue'
import JetNavLink from '@/Components/Utils/NavLink.vue'
import JetResponsiveNavLink from '@/Components/Utils/ResponsiveNavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import Navbar from '@/Components/Header/Navbar'
import Profile from '@/Components/Sidebar/Profile'
import Sidebar from '@/Components/Sidebar/Sidebar'

export default defineComponent({
  props: {
    title: String,
    message: String
  },

  components: {
    Sidebar,
    Profile,
    Navbar,
    Head,
    JetApplicationMark,
    FlashBanner,
    TDropdown,
    TDropdownItem,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    Link
  },

  data() {
    return {
      showingNavigationDropdown: false
    }
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route('current-team.update'),
        {
          team_id: team.id
        },
        {
          preserveState: false
        }
      )
    },

    logout() {
      this.$inertia.post(route('logout'))
    }
  }
})
</script>
