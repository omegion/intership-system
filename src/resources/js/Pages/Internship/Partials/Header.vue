<template>
  <div class="pb-4">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
      <slot name="breadcrumb" />
      <el-breadcrumb
        v-if="!$slots.breadcrumb"
        separator-class="el-icon-arrow-right"
      >
        <el-breadcrumb-item>Internship</el-breadcrumb-item>
        <el-breadcrumb-item>
          <Link
            class="font-medium text-gray-500 hover:text-gray-700"
            :href="route('internship.list')"
          >
            List
          </Link>
        </el-breadcrumb-item>
      </el-breadcrumb>
    </nav>
  </div>
  <div class="md:flex md:items-center md:justify-between md:space-x-5">
    <div class="flex items-center py-2">
      <div class="grid grid-cols-2 gap-4">
        <div class="col-start-1 col-end-3">
          <div class="min-w-0 flex-1 flex items-center">
            <div class="flex-shrink-0">
              <img
                class="h-12 w-12 rounded-full"
                :src="internship.user.profile_photo_url"
                :alt="internship.user.name"
              />
            </div>
            <div class="min-w-0 flex-1 px-4 grid grid-cols-1 gap-1">
              <div>
                <p class="font-medium text-gray-900 truncate">
                  {{ internship.user.name }}
                </p>

                <p class="mt-2 flex items-center text-sm text-gray-500">
                  <CheckCircleIcon
                    :class="[
                      'flex-shrink-0 mr-1.5 h-5 w-5',
                      { 'text-green-400': internship.user.verified_at },
                      { 'text-gray-400': !internship.user.verified_at }
                    ]"
                  />
                  <span v-if="internship.user.verified_at" class="truncate">
                    Verified
                  </span>
                  <span v-else class="truncate">Not verified</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-2">
          <div class="min-w-0 flex-1 flex items-center text-center">
            <div class="list-none pt-2">
              <div class="relative px-8">
                <div class="absolute inset-0 flex items-center">
                  <div
                    class="h-0.5 w-full bg-green-500"
                    :class="[
                      { 'bg-green-500': internship.verified_at },
                      { 'bg-yellow-500': !internship.verified_at }
                    ]"
                  ></div>
                </div>
                <el-tooltip
                  v-if="internship.verified_at"
                  :content="
                    'Verified at ' +
                    moment(internship.verified_at).format('MMMM DD, YYYY LT')
                  "
                  placement="bottom"
                >
                  <div
                    class="
                      relative
                      w-8
                      h-8
                      flex
                      items-center
                      justify-center
                      rounded-full
                      bg-green-500
                    "
                  >
                    <CheckIcon class="w-5 h-5 text-white" />
                  </div>
                </el-tooltip>
                <el-tooltip
                  v-else
                  content="Not yet verified"
                  placement="bottom"
                >
                  <div
                    class="
                      relative
                      w-8
                      h-8
                      flex
                      items-center
                      justify-center
                      rounded-full
                      bg-yellow-500
                    "
                  >
                    <DotsHorizontalIcon class="w-5 h-5 text-white" />
                  </div>
                </el-tooltip>
              </div>
            </div>
          </div>
        </div>
        <div class="col-end-7 col-span-2 ...">
          <div class="min-w-0 flex-1 flex items-center">
            <div class="flex-shrink-0">
              <img
                class="h-12 w-12 rounded-full"
                :src="internship.company.profile_photo_url"
                :alt="internship.company.name"
              />
            </div>
            <div class="min-w-0 flex-1 px-4 grid grid-cols-1 gap-1">
              <div>
                <p class="font-medium text-gray-900 truncate">
                  {{ internship.company.name }}
                </p>
                <p class="mt-2 flex items-center text-sm text-gray-500">
                  <CheckCircleIcon
                    :class="[
                      'flex-shrink-0 mr-1.5 h-5 w-5',
                      { 'text-green-400': internship.company.verified_at },
                      { 'text-gray-400': !internship.company.verified_at }
                    ]"
                  />
                  <span v-if="internship.company.verified_at" class="truncate">
                    Verified
                  </span>
                  <span v-else class="truncate">Not verified</span>
                </p>
              </div>
            </div>
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
import {
  CheckCircleIcon,
  ClockIcon,
  CheckIcon,
  DotsHorizontalIcon
} from '@heroicons/vue/solid'
import moment from 'moment'

export default defineComponent({
  name: 'InternshipHeader',
  components: {
    Link,
    CheckCircleIcon,
    ClockIcon,
    CheckIcon,
    DotsHorizontalIcon
  },
  props: ['internship'],
  created() {
    this.moment = moment
  }
})
</script>
