<template>
  <el-table
    :data="activities.data"
    header-cell-class-name="px-4 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider"
    cell-class-name="px-4"
  >
    <el-table-column prop="name" label="Name">
      <template #default="scope">
        {{ scope.row.name }}
      </template>
    </el-table-column>
    <el-table-column prop="description" label="Description" />
    <el-table-column prop="user" label="User">
      <template #default="scope">
        <span class="flex min-w-0 items-center justify-between space-x-2">
          <img
            class="w-7 h-7 bg-gray-300 rounded-full flex-shrink-0"
            :src="scope.row.user.profile_photo_url"
            :alt="scope.row.user.name"
          />
          <span class="flex-1 flex flex-col min-w-0">
            <Link
              class="text-gray-700 text-sm font-semibold truncate"
              :href="route('user.show', { user: scope.row.user.id })"
            >
              {{ scope.row.user.name }}
            </Link>
          </span>
        </span>
      </template>
    </el-table-column>
    <el-table-column prop="created_at" label="Created at">
      <template #default="scope">
        {{ moment(scope.row.created_at).format('MMMM DD, YYYY - HH:mm') }}
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import moment from 'moment'

export default defineComponent({
  name: 'ListTable',
  props: ['activities'],
  components: {
    Link
  },
  created() {
    this.moment = moment
  }
})
</script>
