<template>
  <section aria-labelledby="recent-hires-title">
    <div class="rounded-lg bg-white overflow-hidden shadow">
      <div class="p-6">
        <h2 class="text-base font-medium text-gray-900" id="recent-hires-title">
          Activities
        </h2>
        <div class="flow-root mt-6">
          <div class="block">
            <el-timeline>
              <el-timeline-item
                v-for="(activity, index) in activities"
                :key="index"
                :icon="activity.icon"
                :type="activity.type"
                :timestamp="moment(activity.created_at).fromNow()"
              >
                <p class="text-sm font-medium text-gray-900 truncate">
                  {{ activity.name }}
                </p>
                <p class="text-sm text-gray-500 truncate">
                  {{ activity.description }}
                </p>
              </el-timeline-item>
            </el-timeline>
          </div>
        </div>
        <div class="mt-6">
          <Link
            :href="route('company.activity.list', { company: companyId })"
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
          </Link>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import { ElBreadcrumb, ElBreadcrumbItem } from 'element-plus'
import { Link } from '@inertiajs/inertia-vue3'
import moment from 'moment'

export default defineComponent({
  name: 'ActivityTimeline',
  components: { ElBreadcrumb, ElBreadcrumbItem, Link },
  props: ['activities', 'companyId'],
  data() {
    return {
      form: this.$inertia.form({
        _method: 'GET'
      })
    }
  },
  created() {
    this.moment = moment
  }
})
</script>
