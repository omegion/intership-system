<template>
  <el-table
    :data="categories.data"
    style="width: 100%"
    header-cell-class-name="px-4 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider"
    cell-class-name="px-4"
  >
    <el-table-column label="Name">
      <template #default="scope">
        <span class="text-gray-700 text-sm font-semibold truncate">
          <Link
            :href="route('company.category.edit', { category: scope.row.id })"
            class="flex"
          >
            {{ scope.row.name }}
          </Link>
        </span>
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
import moment from 'moment'

export default defineComponent({
  name: 'CompanyCategoryTable',
  props: ['categories'],
  components: {
    AppLayout,
    Pagination,
    Link
  },
  created() {
    this.moment = moment
  },
  methods: {
    getFlagURL(url, name) {
      if (url !== null) {
        return url
      }
      return `https://ui-avatars.com/api/?name=${name}&background=ffffff00`
    }
  }
})
</script>
