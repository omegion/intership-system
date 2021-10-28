<template>
  <el-menu :default-active="$page.component" :unique-opened="true">
    <el-menu-item index="Dashboard">
      <Link :href="route('dashboard')">
        <HomeIcon
          class="
            text-gray-400
            group-hover:text-gray-500
            mr-3
            flex-shrink-0
            h-6
            w-6
          "
        />
        Dashboard
      </Link>
    </el-menu-item>
    <el-sub-menu index="1">
      <template #title>
        <span class="sub-menu-item">
          <UsersIcon
            class="
              text-gray-400
              group-hover:text-gray-500
              mr-3
              flex-shrink-0
              h-6
              w-6
            "
          />
          Internship
        </span>
      </template>
      <el-menu-item index="Internship/Create">
        <Link :href="route('internship.create')">Create</Link>
      </el-menu-item>
    </el-sub-menu>
    <el-sub-menu index="2" v-if="hasPermission('can-list-students')">
      <template #title>
        <span class="sub-menu-item">
          <UsersIcon
            class="
              text-gray-400
              group-hover:text-gray-500
              mr-3
              flex-shrink-0
              h-6
              w-6
            "
          />
          User
        </span>
      </template>
      <el-menu-item index="User/List">
        <Link :href="route('user.list')">List</Link>
      </el-menu-item>
    </el-sub-menu>
    <el-sub-menu index="3">
      <template #title>
        <span class="sub-menu-item">
          <OfficeBuildingIcon
            class="
              text-gray-400
              group-hover:text-gray-500
              mr-3
              flex-shrink-0
              h-6
              w-6
            "
          />
          Company
        </span>
      </template>
      <el-menu-item index="Company/List">
        <Link :href="route('company.list')">List</Link>
      </el-menu-item>
      <el-menu-item index="Company/Add">
        <Link :href="route('company.add')">Add</Link>
      </el-menu-item>
      <el-menu-item index="Company/Category/List">
        <Link :href="route('company.category.list')">Category</Link>
      </el-menu-item>
    </el-sub-menu>
    <el-sub-menu index="4">
      <template #title>
        <span class="sub-menu-item">
          <LocationMarkerIcon
            class="
              text-gray-400
              group-hover:text-gray-500
              mr-3
              flex-shrink-0
              h-6
              w-6
            "
          />
          Location
        </span>
      </template>
      <el-menu-item index="Location/Country/List">
        <Link :href="route('location.country.list')">Countries</Link>
      </el-menu-item>
      <el-menu-item index="Location/City/List">
        <Link :href="route('location.city.list')">Cities</Link>
      </el-menu-item>
    </el-sub-menu>
    <el-sub-menu index="5" v-if="hasPermission('can-list-setting')">
      <template #title>
        <span class="sub-menu-item">
          <AdjustmentsIcon
            class="
              text-gray-400
              group-hover:text-gray-500
              mr-3
              flex-shrink-0
              h-6
              w-6
            "
          />
          Settings
        </span>
      </template>
      <el-menu-item index="Setting/List">
        <Link :href="route('setting.list')">System</Link>
      </el-menu-item>
    </el-sub-menu>
  </el-menu>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

import {
  AdjustmentsIcon,
  HomeIcon,
  LocationMarkerIcon,
  OfficeBuildingIcon,
  UsersIcon
} from '@heroicons/vue/outline'

export default defineComponent({
  name: 't-menu',
  components: {
    Link,
    UsersIcon,
    HomeIcon,
    OfficeBuildingIcon,
    LocationMarkerIcon,
    AdjustmentsIcon
  }
})
</script>
