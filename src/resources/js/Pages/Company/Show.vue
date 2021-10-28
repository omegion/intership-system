<template>
  <app-layout title="Company List">
    <template #header>
      <Header :company="company">
        <template #actions>
          <HeaderActions :company="company" />
        </template>
      </Header>
    </template>
    <template #flash-banner>
      <banner
        v-if="!company.is_verified"
        message="This company is not verified, therefore you cannot claim internship."
        type="warning"
      />
    </template>
    <div
      class="
        max-w-3xl
        mx-auto
        grid grid-cols-1
        gap-6
        sm:px-6
        lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3
      "
    >
      <div class="space-y-6 lg:col-start-1 lg:col-span-2">
        <CompanyInformation :company="company" />
        <CompanyComments :company="company" />
      </div>
      <!-- Right column -->
      <div class="lg:col-start-3 lg:col-span-1 space-y-6">
        <section aria-labelledby="recent-hires-title">
          <div class="rounded-lg bg-white overflow-hidden shadow">
            <div class="p-6">
              <h2
                class="text-base font-medium text-gray-900"
                id="recent-hires-title"
              >
                Recent Interns
              </h2>
              <div class="flow-root mt-6">
                <ul class="-my-5 divide-y divide-gray-200">
                  <li class="py-4">
                    <div class="flex items-center space-x-4">
                      <div class="flex-shrink-0">
                        <img
                          class="h-8 w-8 rounded-full"
                          src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                          alt=""
                        />
                      </div>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">
                          Leonard Krasner
                        </p>
                        <p class="text-sm text-gray-500 truncate">
                          @leonardkrasner
                        </p>
                      </div>
                      <div>
                        <a
                          href="#"
                          class="
                            inline-flex
                            items-center
                            shadow-sm
                            px-2.5
                            py-0.5
                            border border-gray-300
                            text-sm
                            leading-5
                            font-medium
                            rounded-full
                            text-gray-700
                            bg-white
                            hover:bg-gray-50
                          "
                        >
                          View
                        </a>
                      </div>
                    </div>
                  </li>

                  <li class="py-4">
                    <div class="flex items-center space-x-4">
                      <div class="flex-shrink-0">
                        <img
                          class="h-8 w-8 rounded-full"
                          src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                          alt=""
                        />
                      </div>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">
                          Floyd Miles
                        </p>
                        <p class="text-sm text-gray-500 truncate">
                          @floydmiles
                        </p>
                      </div>
                      <div>
                        <a
                          href="#"
                          class="
                            inline-flex
                            items-center
                            shadow-sm
                            px-2.5
                            py-0.5
                            border border-gray-300
                            text-sm
                            leading-5
                            font-medium
                            rounded-full
                            text-gray-700
                            bg-white
                            hover:bg-gray-50
                          "
                        >
                          View
                        </a>
                      </div>
                    </div>
                  </li>

                  <li class="py-4">
                    <div class="flex items-center space-x-4">
                      <div class="flex-shrink-0">
                        <img
                          class="h-8 w-8 rounded-full"
                          src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                          alt=""
                        />
                      </div>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">
                          Emily Selman
                        </p>
                        <p class="text-sm text-gray-500 truncate">
                          @emilyselman
                        </p>
                      </div>
                      <div>
                        <a
                          href="#"
                          class="
                            inline-flex
                            items-center
                            shadow-sm
                            px-2.5
                            py-0.5
                            border border-gray-300
                            text-sm
                            leading-5
                            font-medium
                            rounded-full
                            text-gray-700
                            bg-white
                            hover:bg-gray-50
                          "
                        >
                          View
                        </a>
                      </div>
                    </div>
                  </li>

                  <li class="py-4">
                    <div class="flex items-center space-x-4">
                      <div class="flex-shrink-0">
                        <img
                          class="h-8 w-8 rounded-full"
                          src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                          alt=""
                        />
                      </div>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">
                          Kristin Watson
                        </p>
                        <p class="text-sm text-gray-500 truncate">
                          @kristinwatson
                        </p>
                      </div>
                      <div>
                        <a
                          href="#"
                          class="
                            inline-flex
                            items-center
                            shadow-sm
                            px-2.5
                            py-0.5
                            border border-gray-300
                            text-sm
                            leading-5
                            font-medium
                            rounded-full
                            text-gray-700
                            bg-white
                            hover:bg-gray-50
                          "
                        >
                          View
                        </a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="mt-6">
                <a
                  href="#"
                  class="
                    w-full
                    flex
                    justify-center
                    items-center
                    px-4
                    py-2
                    border border-gray-300
                    shadow-sm
                    text-sm
                    font-medium
                    rounded-md
                    text-gray-700
                    bg-white
                    hover:bg-gray-50
                  "
                >
                  View all
                </a>
              </div>
            </div>
          </div>
        </section>

        <ActivityTimeline
          :activities="company.activities"
          :company-id="company.id"
        />
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import CompanyInformation from '@/Pages/Company/Partials/Show/CompanyInformation'
import Banner from '@/Components/Utils/Banner'
import ActivityTimeline from '@/Pages/Company/Partials/Show/ActivityTimeline'
import Header from '@/Pages/Company/Partials/Header'
import HeaderActions from '@/Pages/Company/Partials/HeaderActions'
import CompanyComments from '@/Pages/Company/Partials/Show/Comments'

export default defineComponent({
  props: ['company'],

  components: {
    CompanyComments,
    HeaderActions,
    Header,
    ActivityTimeline,
    Banner,
    CompanyInformation,
    AppLayout
  }
})
</script>
