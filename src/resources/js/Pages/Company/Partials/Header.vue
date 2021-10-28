<template>
  <div class="pb-4">
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
  <div class="md:flex md:items-center md:justify-between md:space-x-5">
    <div class="flex items-start space-x-5">
      <div class="flex-shrink-0">
        <div class="relative">
          <img
            class="h-16 w-16 rounded-full"
            :src="company.profile_photo_url"
            :alt="company.name"
          />
          <span
            class="absolute inset-0 shadow-inner rounded-full"
            aria-hidden="true"
          ></span>
        </div>
      </div>
      <div class="pt-1.5">
        <h1 class="text-2xl font-bold text-gray-900">{{ company.name }}</h1>
        <div class="mt-6 flex flex-col sm:mt-1 sm:flex-row sm:flex-wrap">
          <div
            class="
              flex
              items-center
              text-sm text-gray-500
              font-medium
              capitalize
              sm:mr-6
            "
          >
            <ClockIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" />
            <p class="text-sm font-medium">
              Created on
              <time datetime="2020-08-25">
                {{ moment(company.created_at).format('MMMM DD, YYYY') }}
              </time>
            </p>
          </div>
          <div
            class="
              mt-3
              flex
              items-center
              text-sm
              font-medium
              sm:mr-6 sm:mt-0
              capitalize
            "
          >
            <CheckCircleIcon
              :class="[
                'flex-shrink-0 mr-1.5 h-5 w-5',
                { 'text-green-400': company.verified_at },
                { 'text-gray-400': !company.verified_at }
              ]"
            />
            <p class="text-sm font-medium text-gray-500">
              <span v-if="company.verified_at">
                <el-tooltip
                  :content="
                    'Verified at ' +
                    moment(company.verified_at).format('MMMM DD, YYYY LT')
                  "
                  placement="bottom"
                >
                  <span>Verified</span>
                </el-tooltip>
              </span>

              <span v-else>Not verified</span>
            </p>
          </div>
        </div>
      </div>
    </div>
    <slot name="actions" />
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import moment from 'moment'
import { CheckCircleIcon, ClockIcon } from '@heroicons/vue/solid'

export default defineComponent({
  name: 'Header',
  components: { Link, CheckCircleIcon, ClockIcon },
  props: ['company'],
  created() {
    this.moment = moment
  }
})
</script>
