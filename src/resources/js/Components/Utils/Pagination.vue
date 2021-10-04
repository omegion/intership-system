<template>
  <el-pagination
    background
    layout="prev, pager, next"
    :total="total"
    :page-size="perPage"
    v-model:currentPage="currentPage"
    @current-change="handleCurrentChange"
  ></el-pagination>
</template>

<script>
import { ElPagination } from 'element-plus'
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default {
  components: { ElPagination, Link },
  props: {
    links: Array,
    path: String,
    total: Number,
    perPage: Number,
    currentPage: Number
  },
  setup(props, root) {
    const handleCurrentChange = (val) => {
      Inertia.replace(`${props.path}?page=${val}`)
    }

    return {
      handleCurrentChange
    }
  }
}
</script>
