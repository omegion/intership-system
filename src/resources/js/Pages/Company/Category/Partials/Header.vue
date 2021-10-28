<template>
  <div>
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
            :href="route('company.category.list')"
          >
            Category List
          </Link>
        </el-breadcrumb-item>
        <el-breadcrumb-item>{{ category.name }}</el-breadcrumb-item>
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
        {{ category.name }}
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
  name: 'CompanyCategoryHeader',
  components: { Link },
  props: ['category']
})
</script>
