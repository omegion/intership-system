<template>
  <div>
    <nav class="sm:hidden" aria-label="Back">
      <a
        href="#"
        class="
          flex
          items-center
          text-sm
          font-medium
          text-gray-500
          hover:text-gray-700
        "
      >
        <!-- Heroicon name: solid/chevron-left -->
        <svg
          class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-400"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          aria-hidden="true"
        >
          <path
            fill-rule="evenodd"
            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
            clip-rule="evenodd"
          />
        </svg>
        Back
      </a>
    </nav>
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
      <slot name="breadcrumb" />
      <el-breadcrumb
        v-if="!$slots.breadcrumb"
        separator-class="el-icon-arrow-right"
      >
        <el-breadcrumb-item>Company</el-breadcrumb-item>
        <el-breadcrumb-item>
          <Link
            class="font-medium text-gray-500 hover:text-gray-700"
            :href="route('company.list')"
          >
            List
          </Link>
        </el-breadcrumb-item>
        <el-breadcrumb-item>{{ company.name }}</el-breadcrumb-item>
      </el-breadcrumb>
    </nav>
  </div>
  <div class="mt-2 md:flex md:items-center md:justify-between">
    <div class="flex-1 min-w-0">
      <h2
        class="
          text-2xl
          font-bold
          leading-7
          text-gray-900
          sm:text-3xl sm:truncate
        "
      >
        {{ company.name }}
      </h2>
    </div>
    <div class="mt-4 flex-shrink-0 flex md:mt-0 md:ml-4">
      <slot name="actions"></slot>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'Header',
  components: { Link },
  props: ['company']
})
</script>
