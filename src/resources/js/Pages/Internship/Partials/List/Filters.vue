<template>
  <form class="hidden lg:block">
    <el-collapse v-model="activeFilters">
      <el-collapse-item title="Feedback" name="1">
        <div class="space-y-4 py-3">
          <div class="flex items-center">
            <input
              name="color[]"
              value="white"
              type="checkbox"
              class="
                h-4
                w-4
                border-gray-300
                rounded
                text-indigo-600
                focus:ring-indigo-500
              "
            />
            <label for="filter-color-0" class="ml-3 text-sm text-gray-600">
              White
            </label>
          </div>

          <div class="flex items-center">
            <input
              name="color[]"
              value="beige"
              type="checkbox"
              class="
                h-4
                w-4
                border-gray-300
                rounded
                text-indigo-600
                focus:ring-indigo-500
              "
            />
            <label for="filter-color-1" class="ml-3 text-sm text-gray-600">
              Beige
            </label>
          </div>

          <div class="flex items-center">
            <input
              name="color[]"
              value="blue"
              type="checkbox"
              checked=""
              class="
                h-4
                w-4
                border-gray-300
                rounded
                text-indigo-600
                focus:ring-indigo-500
              "
            />
            <label for="filter-color-2" class="ml-3 text-sm text-gray-600">
              Blue
            </label>
          </div>

          <div class="flex items-center">
            <input
              name="color[]"
              value="brown"
              type="checkbox"
              class="
                h-4
                w-4
                border-gray-300
                rounded
                text-indigo-600
                focus:ring-indigo-500
              "
            />
            <label for="filter-color-3" class="ml-3 text-sm text-gray-600">
              Brown
            </label>
          </div>

          <div class="flex items-center">
            <input
              id="filter-color-4"
              name="color[]"
              value="green"
              type="checkbox"
              class="
                h-4
                w-4
                border-gray-300
                rounded
                text-indigo-600
                focus:ring-indigo-500
              "
            />
            <label for="filter-color-4" class="ml-3 text-sm text-gray-600">
              Green
            </label>
          </div>

          <div class="flex items-center">
            <input
              id="filter-color-5"
              name="color[]"
              value="purple"
              type="checkbox"
              class="
                h-4
                w-4
                border-gray-300
                rounded
                text-indigo-600
                focus:ring-indigo-500
              "
            />
            <label for="filter-color-5" class="ml-3 text-sm text-gray-600">
              Purple
            </label>
          </div>
        </div>
      </el-collapse-item>
      <el-collapse-item title="Efficiency" name="3">
        <div>
          Simplify the process: keep operating process simple and intuitive;
        </div>
        <div>
          Definite and clear: enunciate your intentions clearly so that the
          users can quickly understand and make decisions;
        </div>
        <div>
          Easy to identify: the interface should be straightforward, which helps
          the users to identify and frees them from memorizing and recalling.
        </div>
      </el-collapse-item>
      <el-collapse-item title="Controllability" name="4">
        <div>
          Decision making: giving advices about operations is acceptable, but do
          not make decisions for the users;
        </div>
        <div>
          Controlled consequences: users should be granted the freedom to
          operate, including canceling, aborting or terminating current
          operation.
        </div>
      </el-collapse-item>
    </el-collapse>
  </form>
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
  name: 'InternshipFilters',
  components: {
    AppLayout,
    Pagination,
    Link,
    BadgeCheckIcon
  },
  data() {
    return {
      activeFilters: ['1', 2, 3]
    }
  }
})
</script>
