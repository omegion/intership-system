<template>
  <section>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
      <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Internship Information
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
          Personal details and application.
        </p>
      </div>
      <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">User</dt>
            <dd class="mt-1 text-sm text-gray-900">
              <span class="flex min-w-0 items-center justify-between space-x-2">
                <img
                  class="w-7 h-7 bg-gray-300 rounded-full flex-shrink-0"
                  :src="internship.user.profile_photo_url"
                  :alt="internship.user.name"
                />
                <span class="flex-1 flex flex-col min-w-0">
                  <span class="text-gray-700 text-sm font-semibold truncate">
                    <Link
                      :href="route('user.show', { user: internship.user.id })"
                    >
                      {{ internship.user.name }}
                    </Link>
                  </span>
                </span>
              </span>
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Company</dt>
            <dd class="mt-1 text-sm text-gray-900">
              <span class="flex min-w-0 items-center justify-between space-x-2">
                <img
                  class="w-7 h-7 bg-gray-300 rounded-full flex-shrink-0"
                  :src="internship.company.profile_photo_url"
                  :alt="internship.company.name"
                />
                <span class="flex-1 flex flex-col min-w-0">
                  <span class="text-gray-700 text-sm font-semibold truncate">
                    <Link
                      :href="
                        route('company.show', {
                          company: internship.company.id
                        })
                      "
                    >
                      {{ internship.company.name }}
                    </Link>
                  </span>
                </span>
              </span>
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Country</dt>
            <dd class="mt-1 text-sm text-gray-900">
              <span class="flex min-w-0 items-center justify-between space-x-3">
                <img
                  class="w-6 h-4 bg-gray-300 rounded shadow-md flex-shrink-0"
                  v-if="internship.country.flag_url"
                  :src="internship.country.flag_url"
                  :alt="internship.country.name"
                />
                <span class="flex-1 flex flex-col min-w-0">
                  {{ internship.country.name }}
                </span>
              </span>
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">City</dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ internship.city.name }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Starts at</dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ moment(internship.starts_at).format('MMMM DD, YYYY') }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Ends update</dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ moment(internship.ends_at).format('MMMM DD, YYYY') }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Created at</dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ moment(internship.created_at).format('MMMM DD YYYY, HH:MM') }}
            </dd>
          </div>
          <div class="sm:col-span-1">
            <dt class="text-sm font-medium text-gray-500">Last update</dt>
            <dd class="mt-1 text-sm text-gray-900">
              {{ moment(internship.updated_at).format('MMMM DD YYYY, HH:MM') }}
            </dd>
          </div>
          <div class="sm:col-span-2">
            <dt class="text-sm font-medium text-gray-500">Attachments</dt>
            <dd class="mt-1 text-sm text-gray-900">
              <ul
                role="list"
                class="
                  border border-gray-200
                  rounded-md
                  divide-y divide-gray-200
                "
              >
                <li
                  class="
                    pl-3
                    pr-4
                    py-3
                    flex
                    items-center
                    justify-between
                    text-sm
                  "
                >
                  <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg
                      class="flex-shrink-0 h-5 w-5 text-gray-400"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    <span class="ml-2 flex-1 w-0 truncate">
                      resume_back_end_developer.pdf
                    </span>
                  </div>
                  <div class="ml-4 flex-shrink-0">
                    <a
                      href="#"
                      class="font-medium text-indigo-600 hover:text-indigo-500"
                    >
                      Download
                    </a>
                  </div>
                </li>
                <li
                  class="
                    pl-3
                    pr-4
                    py-3
                    flex
                    items-center
                    justify-between
                    text-sm
                  "
                >
                  <div class="w-0 flex-1 flex items-center">
                    <!-- Heroicon name: solid/paper-clip -->
                    <svg
                      class="flex-shrink-0 h-5 w-5 text-gray-400"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    <span class="ml-2 flex-1 w-0 truncate">
                      coverletter_back_end_developer.pdf
                    </span>
                  </div>
                  <div class="ml-4 flex-shrink-0">
                    <a
                      href="#"
                      class="font-medium text-indigo-600 hover:text-indigo-500"
                    >
                      Download
                    </a>
                  </div>
                </li>
              </ul>
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
  name: 'InternshipInformation',
  components: { Link },
  props: ['internship'],

  created() {
    this.moment = moment
  }
})
</script>
