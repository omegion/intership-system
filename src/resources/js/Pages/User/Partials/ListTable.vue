<template>
  <el-table
    :data="users.data"
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
              <Link :href="route('user.show', { user: scope.row.id })">
                {{ scope.row.name }}
              </Link>
            </span>
            <span class="text-gray-500 text-sm truncate">1 interns</span>
          </span>
        </span>
      </template>
    </el-table-column>
    <el-table-column prop="email" label="Email" width="" />
    <el-table-column prop="created_at" label="Created at">
      <template #default="scope">
        {{ moment(scope.row.created_at).format('MMM DD, YYYY') }}
      </template>
    </el-table-column>
    <el-table-column label="Roles">
      <template #default="scope">
        <el-tag v-for="role in scope.row.role_list" size="mini" class="mr-2">
          {{ role.name }}
        </el-tag>
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
import { BadgeCheckIcon } from '@heroicons/vue/solid'
import moment from 'moment'

export default defineComponent({
  name: 'ListTable',
  props: ['users'],

  components: {
    Link,
    BadgeCheckIcon
  },
  created() {
    this.moment = moment
  }
})
</script>
