<template>
  <div
    class="fixed inset-0 flex z-40 lg:hidden"
    role="dialog"
    aria-modal="true"
  >
    <div
      class="fixed inset-0 bg-gray-600 bg-opacity-75"
      aria-hidden="true"
    ></div>

    <div
      class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white"
    >
      <div class="absolute top-0 right-0 -mr-12 pt-2">
        <button
          class="
            ml-1
            flex
            items-center
            justify-center
            h-10
            w-10
            rounded-full
            focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white
          "
        >
          <span class="sr-only">Close sidebar</span>
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

      <div class="flex-shrink-0 flex items-center px-4">
        <img
          class="h-8 w-auto"
          src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg"
          alt="Workflow"
        />
      </div>
      <div class="mt-5 flex-1 h-0 overflow-y-auto">
        <nav class="px-2">
          <div class="space-y-1">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
            <a
              href="#"
              class="
                bg-gray-100
                text-gray-900
                group
                flex
                items-center
                px-2
                py-2
                text-base
                leading-5
                font-medium
                rounded-md
              "
              aria-current="page"
            >
              <svg
                class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6"
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
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                />
              </svg>
              Home
            </a>

            <a
              href="#"
              class="
                text-gray-600
                hover:text-gray-900 hover:bg-gray-50
                group
                flex
                items-center
                px-2
                py-2
                text-base
                leading-5
                font-medium
                rounded-md
              "
            >
              <!-- Heroicon name: outline/view-list -->
              <svg
                class="
                  text-gray-400
                  group-hover:text-gray-500
                  mr-3
                  flex-shrink-0
                  h-6
                  w-6
                "
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
                  d="M4 6h16M4 10h16M4 14h16M4 18h16"
                />
              </svg>
              My tasks
            </a>

            <a
              href="#"
              class="
                text-gray-600
                hover:text-gray-900 hover:bg-gray-50
                group
                flex
                items-center
                px-2
                py-2
                text-base
                leading-5
                font-medium
                rounded-md
              "
            >
              <!-- Heroicon name: outline/clock -->
              <svg
                class="
                  text-gray-400
                  group-hover:text-gray-500
                  mr-3
                  flex-shrink-0
                  h-6
                  w-6
                "
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
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              Recent
            </a>
          </div>
          <div class="mt-8">
            <h3
              class="
                px-3
                text-xs
                font-semibold
                text-gray-500
                uppercase
                tracking-wider
              "
              id="teams-headline"
            >
              Teams
            </h3>
            <div
              class="mt-1 space-y-1"
              role="group"
              aria-labelledby="teams-headline"
            >
              <a
                href="#"
                class="
                  group
                  flex
                  items-center
                  px-3
                  py-2
                  text-base
                  leading-5
                  font-medium
                  text-gray-600
                  rounded-md
                  hover:text-gray-900 hover:bg-gray-50
                "
              >
                <span
                  class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full"
                  aria-hidden="true"
                ></span>
                <span class="truncate">Engineering</span>
              </a>

              <a
                href="#"
                class="
                  group
                  flex
                  items-center
                  px-3
                  py-2
                  text-base
                  leading-5
                  font-medium
                  text-gray-600
                  rounded-md
                  hover:text-gray-900 hover:bg-gray-50
                "
              >
                <span
                  class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full"
                  aria-hidden="true"
                ></span>
                <span class="truncate">Human Resources</span>
              </a>

              <a
                href="#"
                class="
                  group
                  flex
                  items-center
                  px-3
                  py-2
                  text-base
                  leading-5
                  font-medium
                  text-gray-600
                  rounded-md
                  hover:text-gray-900 hover:bg-gray-50
                "
              >
                <span
                  class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full"
                  aria-hidden="true"
                ></span>
                <span class="truncate">Customer Success</span>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
      <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div class="hidden lg:flex lg:flex-shrink-0">
    <div
      class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100"
    >
      <div class="flex items-center flex-shrink-0 px-6">
        <img
          class="h-8 w-auto"
          src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg"
          alt="Workflow"
        />
      </div>
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="h-0 flex-1 flex flex-col overflow-y-auto">
        <!-- User account dropdown -->
        <profile />

        <!-- Sidebar Search -->
        <div class="px-3 mt-5">
          <label for="search" class="sr-only">Search</label>
          <div class="mt-1 relative rounded-md shadow-sm">
            <div
              class="
                absolute
                inset-y-0
                left-0
                pl-3
                flex
                items-center
                pointer-events-none
              "
              aria-hidden="true"
            >
              <!-- Heroicon name: solid/search -->
              <svg
                class="mr-3 h-4 w-4 text-gray-400"
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
              type="text"
              name="search"
              id="search"
              class="
                focus:ring-indigo-500 focus:border-indigo-500
                block
                w-full
                pl-9
                sm:text-sm
                border-gray-300
                rounded-md
              "
              placeholder="Search"
            />
          </div>
        </div>
        <!-- Navigation -->
        <nav class="pr-3 mt-6">
          <div class="space-y-1">
            <t-menu />
          </div>
          <div class="mt-8">
            <!-- Secondary navigation -->
            <h3
              class="
                px-3
                text-xs
                font-semibold
                text-gray-500
                uppercase
                tracking-wider
              "
              id="teams-headline"
            >
              Teams
            </h3>
            <div
              class="mt-1 space-y-1"
              role="group"
              aria-labelledby="teams-headline"
            >
              <a
                href="#"
                class="
                  group
                  flex
                  items-center
                  px-3
                  py-2
                  text-sm
                  font-medium
                  text-gray-700
                  rounded-md
                  hover:text-gray-900 hover:bg-gray-50
                "
              >
                <span
                  class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full"
                  aria-hidden="true"
                ></span>
                <span class="truncate">Engineering</span>
              </a>

              <a
                href="#"
                class="
                  group
                  flex
                  items-center
                  px-3
                  py-2
                  text-sm
                  font-medium
                  text-gray-700
                  rounded-md
                  hover:text-gray-900 hover:bg-gray-50
                "
              >
                <span
                  class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full"
                  aria-hidden="true"
                ></span>
                <span class="truncate">Human Resources</span>
              </a>

              <a
                href="#"
                class="
                  group
                  flex
                  items-center
                  px-3
                  py-2
                  text-sm
                  font-medium
                  text-gray-700
                  rounded-md
                  hover:text-gray-900 hover:bg-gray-50
                "
              >
                <span
                  class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full"
                  aria-hidden="true"
                ></span>
                <span class="truncate">Customer Success</span>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import JetApplicationMark from '@/Components/Utils/ApplicationMark.vue'
import TNavLink from '@/Components/Utils/NavLink.vue'
import JetResponsiveNavLink from '@/Components/Utils/ResponsiveNavLink.vue'
import TDropdown from '@/Components/Utils/Dropdown.vue'
import TDropdownItem from '@/Components/Utils/DropdownItem.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import BaseIcon from '@/Components/Utils/BaseIcon'
import Profile from '@/Components/Sidebar/Profile'
import Menu from '@/Components/Sidebar/Menu'
import TMenu from '@/Components/Sidebar/Menu'

export default defineComponent({
  components: {
    TMenu,
    Menu,
    Head,
    JetApplicationMark,
    TNavLink,
    JetResponsiveNavLink,
    TDropdown,
    TDropdownItem,
    BaseIcon,
    Link,
    Profile
  }
})
</script>
