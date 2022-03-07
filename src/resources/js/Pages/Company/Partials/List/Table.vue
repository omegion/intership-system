<template>
  <el-table
    :data="companies.data"
    style="width: 100%"
    header-cell-class-name="px-4 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider"
    cell-class-name="px-4"
  >
    <el-table-column label="Name">
      <template #default="scope">
        <span class="flex min-w-0 items-center justify-between space-x-3">
          <img
            class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
            :src="scope.row.profile_photo_url"
            :alt="scope.row.name"
          />
          <span class="flex-1 flex flex-col min-w-0">
            <span class="text-gray-700 text-sm font-semibold truncate">
              <Link
                :href="route('company.show', { company: scope.row.id })"
                class="flex"
              >
                {{ scope.row.name }}
                <el-tooltip
                  content="This company is verified."
                  placement="bottom-start"
                  effect="dark"
                  class="ml-1"
                  v-if="scope.row.is_verified"
                >
                  <span>
                    <CheckCircleIcon class="h-5 w-5 text-green-500" />
                  </span>
                </el-tooltip>
              </Link>
            </span>
            <span class="text-gray-500 text-sm truncate">1 interns</span>
          </span>
        </span>
      </template>
    </el-table-column>
    <el-table-column label="Location">
      <template #default="scope">
        {{ scope.row.city?.name }}, {{ scope.row.country?.code }}
      </template>
    </el-table-column>
    <el-table-column prop="updated_at" label="Updated at">
      <template #default="scope">
        {{ moment(scope.row.created_at).fromNow() }}
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@/Components/Utils/Pagination'
import { Link } from '@inertiajs/inertia-vue3'
import { CheckCircleIcon } from '@heroicons/vue/solid'
import moment from 'moment'

export default defineComponent({
  name: 'CompanyTable',
  props: ['companies'],
  components: {
    AppLayout,
    Pagination,
    Link,
    CheckCircleIcon
  },
  created() {
    this.moment = moment
  }
})
</script>
