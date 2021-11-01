<template>
  <el-table
    :data="internships.data"
    style="width: 100%"
    header-cell-class-name="px-4 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider"
    cell-class-name="px-4"
    :default-sort="{
      prop: route().params?.sortColumn,
      order: route().params?.sortDirection
    }"
    @sort-change="sort"
  >
    <el-table-column label="User">
      <template #default="scope">
        <span class="flex min-w-0 items-center justify-between space-x-3">
          <img
            class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
            :src="scope.row.user.profile_photo_url"
            :alt="scope.row.user.name"
          />
          <span class="flex-1 flex flex-col min-w-0">
            <span class="text-gray-700 text-sm font-semibold truncate">
              <Link
                :href="route('internship.show', { internship: scope.row.id })"
                class="flex"
              >
                {{ scope.row.user.name }}
              </Link>
            </span>
            <span class="text-gray-500 text-sm truncate">
              {{ moment(scope.row.created_at).fromNow() }}
            </span>
          </span>
        </span>
      </template>
    </el-table-column>
    <el-table-column label="Company">
      <template #default="scope">
        {{ scope.row.company.name }}
      </template>
    </el-table-column>
    <el-table-column prop="created_at" label="Created at" sortable="custom">
      <template #default="scope">
        {{ moment(scope.row.created_at).fromNow() }}
      </template>
    </el-table-column>
    <el-table-column prop="verified_at" label="Status" sortable="custom">
      <template #default="scope">
        <el-tag
          v-if="scope.row.verified_at"
          size="small"
          type="success"
          class="font-semibold"
        >
          Approved
        </el-tag>
        <el-tag v-else size="small" type="warning" class="font-semibold">
          Pending
        </el-tag>
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@/Components/Utils/Pagination'
import { Link } from '@inertiajs/inertia-vue3'
import { BadgeCheckIcon } from '@heroicons/vue/solid'
import moment from 'moment'
import { Inertia } from '@inertiajs/inertia'

export default defineComponent({
  name: 'InternshipTable',
  props: ['internships'],
  components: {
    AppLayout,
    Pagination,
    Link,
    BadgeCheckIcon
  },
  created() {
    this.moment = moment
  },
  methods: {
    sort(column) {
      Inertia.get(
        this.route(this.route().current(), {
          sortColumn: column.prop,
          sortDirection: column.order
        })
      )
    }
  }
})
</script>
