<template>
  <div class="pb-4">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
      <el-breadcrumb separator-class="el-icon-arrow-right">
        <el-breadcrumb-item>User</el-breadcrumb-item>
        <el-breadcrumb-item>
          <Link
            class="font-medium text-gray-500 hover:text-gray-700"
            :href="route('user.list')"
          >
            List
          </Link>
        </el-breadcrumb-item>
        <el-breadcrumb-item>
          <Link
            class="font-medium text-gray-500 hover:text-gray-700"
            :href="route('user.show', { user: user.id })"
          >
            {{ user.name }}
          </Link>
        </el-breadcrumb-item>
        <el-breadcrumb-item>Edit</el-breadcrumb-item>
      </el-breadcrumb>
    </nav>
  </div>
  <div class="md:flex md:items-center md:justify-between md:space-x-5">
    <div class="flex items-start space-x-5">
      <div class="pt-1.5">
        <h1 class="text-2xl font-bold text-gray-900">{{ user.name }}</h1>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import HeaderActions from '@/Pages/User/Partials/HeaderActions'
import moment from 'moment'
import { CheckCircleIcon, ClockIcon } from '@heroicons/vue/solid'

export default defineComponent({
  name: 'Header',
  props: ['user'],
  components: {
    ClockIcon,
    CheckCircleIcon,
    HeaderActions,
    Link
  },
  created() {
    this.moment = moment
  }
})
</script>
