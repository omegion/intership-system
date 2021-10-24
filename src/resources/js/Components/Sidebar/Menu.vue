<template>
  <el-menu :default-active="$page.component" :collapse-transition="false">
    {{}}
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
    <el-sub-menu index="1" v-if="hasPermission('can-list-students')">
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
    <el-sub-menu index="2">
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
      <el-menu-item index="Company/Add" class="">
        <Link :href="route('company.add')">Add</Link>
      </el-menu-item>
    </el-sub-menu>
    <el-sub-menu index="3">
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
          Settings
        </span>
      </template>
      <el-menu-item index="Location/Country/List">
        <Link :href="route('location.country.list')">System Settings</Link>
      </el-menu-item>
      <el-menu-item index="Location/Country/List">
        <Link :href="route('location.country.list')">User Settings</Link>
      </el-menu-item>
    </el-sub-menu>
  </el-menu>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

import {
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
    LocationMarkerIcon
  }
})
</script>
