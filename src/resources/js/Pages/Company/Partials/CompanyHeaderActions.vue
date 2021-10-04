<template>
  <span class="hidden sm:block">
    <t-button secondary>Edit</t-button>
    <t-button primary>Claim Intership</t-button>
  </span>

  <!-- Dropdown -->
  <span class="ml-3 relative sm:hidden">
    <button
      type="button"
      class="
        inline-flex
        items-center
        px-4
        py-2
        border border-gray-300
        rounded-md
        shadow-sm
        text-sm
        font-medium
        text-gray-700
        bg-white
        hover:bg-gray-50
        focus:outline-none
        focus:ring-2
        focus:ring-offset-2
        focus:ring-indigo-500
      "
      id="mobile-menu-button"
      aria-expanded="false"
      aria-haspopup="true"
    >
      More
      <!-- Heroicon name: solid/chevron-down -->
      <svg
        class="-mr-1 ml-2 h-5 w-5 text-gray-500"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20"
        fill="currentColor"
        aria-hidden="true"
      >
        <path
          fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"
        />
      </svg>
    </button>

    <div
      class="
        origin-top-right
        absolute
        right-0
        mt-2
        -mr-1
        w-48
        rounded-md
        shadow-lg
        py-1
        bg-white
        ring-1 ring-black ring-opacity-5
        focus:outline-none
      "
      role="menu"
      aria-orientation="vertical"
      aria-labelledby="mobile-menu-button"
      tabindex="-1"
    >
      <!-- Active: "bg-gray-100", Not Active: "" -->
      <a
        href="#"
        class="block px-4 py-2 text-sm text-gray-700"
        role="menuitem"
        tabindex="-1"
        id="mobile-menu-item-0"
      >
        Edit
      </a>
      <a
        href="#"
        class="block px-4 py-2 text-sm text-gray-700"
        role="menuitem"
        tabindex="-1"
        id="mobile-menu-item-1"
      >
        View
      </a>
    </div>
  </span>
</template>

<script>
import { defineComponent } from 'vue'
import TButton from '@/Components/Utils/Button'
import BaseIcon from '@/Components/Utils/BaseIcon'

export default defineComponent({
  components: { BaseIcon, TButton },
  props: ['company']
})
</script>
