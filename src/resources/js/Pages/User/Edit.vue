<template>
  <app-layout title="Company List">
    <template #header>
      <Header :user="currentUser">
        <template #breadcrumb>
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
                :href="route('user.show', { user: currentUser.id })"
              >
                {{ currentUser.name }}
              </Link>
            </el-breadcrumb-item>
            <el-breadcrumb-item>Edit</el-breadcrumb-item>
          </el-breadcrumb>
        </template>
      </Header>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <UpdateDetailsForm :user="currentUser" />
      <section-border />
      <UpdateVerificationForm :user="currentUser" />
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Header from '@/Pages/User/Partials/Header'
import UpdateDetailsForm from '@/Pages/User/Partials/Edit/UpdateDetailsForm'
import UpdateVerificationForm from '@/Pages/User/Partials/Edit/UpdateVerificationForm'
import SectionBorder from '@/Components/Utils/SectionBorder'
import HeaderActions from '@/Pages/User/Partials/HeaderActions'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  props: ['currentUser'],

  components: {
    HeaderActions,
    SectionBorder,
    UpdateVerificationForm,
    UpdateDetailsForm,
    Header,
    Link,
    AppLayout
  }
})
</script>
