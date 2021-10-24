<template>
  <label class="block font-medium text-sm text-gray-700">
    <span v-if="value" class="flex">
      {{ value }}
      <el-popover
        v-if="helper"
        placement="top-start"
        :title="value"
        :width="280"
        trigger="hover"
      >
        <template #reference>
          <span>
            <QuestionMarkCircleIcon
              class="
                text-gray-400
                group-hover:text-gray-500
                mr-3
                ml-1
                flex-shrink-0
                h-4
                w-4
                mt-0.5
              "
            />
          </span>
        </template>
        <span v-html="helper" class="text-justify"></span>
      </el-popover>
    </span>
    <span v-else><slot></slot></span>
  </label>
</template>

<script>
import { defineComponent } from 'vue'
import { QuestionMarkCircleIcon } from '@heroicons/vue/solid'

export default defineComponent({
  name: 'FormLabel',
  components: { QuestionMarkCircleIcon },
  props: ['value', 'helper']
})
</script>
