<template>
  <el-menu :default-active="$page.component">
    <el-menu-item index="Dashboard">
      <a
        :href="route('dashboard')"
        :class="getClasses('Dashboard', $page.component)"
      >
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
          ></path>
        </svg>
        Dashboard
      </a>
    </el-menu-item>
    <el-sub-menu index="1">
      <template #title>
        <span :class="getClasses(0, 1)">
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
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            />
          </svg>
          Company
        </span>
      </template>
      <el-menu-item index="Company/List" class="" active>
        <a
          :href="route('company.list')"
          :class="getClasses('Company/List', $page.component)"
        >
          List
        </a>
      </el-menu-item>
      <el-menu-item index="Company/Add" class="">
        <a
          :href="route('company.add')"
          :class="getClasses('Company/Add', $page.component)"
        >
          Add
        </a>
      </el-menu-item>
    </el-sub-menu>
  </el-menu>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 't-menu',
  components: {
    Link
  },
  methods: {
    getClasses(val, component) {
      if (val === component)
        return 'bg-gray-200 text-gray-900 group flex items-center px-3 py-2 my-1 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transition'
      else
        return 'text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 my-1 text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transition'
    }
  }
})
</script>

<style lang="scss">
.el-menu {
  background-color: inherit;
  border-right: 0;

  .el-menu-item {
    height: inherit;
    padding: inherit;

    &:hover {
      background-color: inherit;
    }
  }

  .el-sub-menu {
    .el-menu-item {
      padding: inherit;
      height: inherit;
    }
  }

  .el-sub-menu__title {
    height: inherit;
    padding: inherit;

    &:hover {
      background-color: inherit;
    }
  }
}
</style>
