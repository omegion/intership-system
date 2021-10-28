<template>
  <section>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Company Information
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
          Personal details and application.
        </p>
      </div>
      <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Full name</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ company.name }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Email address</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ company.email }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Phone number</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ company.phone }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Address</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ company.address }}</dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Country</dt>
            <dd class="mt-1 text-sm text-gray-900">
              <span class="flex min-w-0 items-center justify-between space-x-3">
                <img
                  class="w-6 h-4 bg-gray-300 rounded shadow-md flex-shrink-0"
                  v-if="company.country.flag_url"
                  :src="company.country.flag_url"
                  :alt="company.country.name"
                />
                <span class="flex-1 flex flex-col min-w-0">
                  {{ company.country.name }}
                </span>
              </span>
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">City</dt>
            <dd class="mt-1 text-sm text-gray-900">{{ company.city.name }}</dd>
          </div>

          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Created at</dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ moment(company.created_at).format('MMMM DD, YYYY') }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Last update</dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ moment(company.updated_at).format('MMMM DD, YYYY') }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Business</dt>
            <dd class="mt-1 text-sm text-gray-900">
              <el-tag
                v-for="category in company.categories"
                size="small"
                class="mr-1 mb-1"
              >
                {{ category.name }}
              </el-tag>
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import moment from 'moment'

export default defineComponent({
  name: 'CompanyInformation',
  components: { Link },
  props: ['company'],

  created() {
    this.moment = moment
  }
})
</script>
