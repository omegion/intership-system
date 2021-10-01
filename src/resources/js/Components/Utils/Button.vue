<template>
    <el-button
        :native-type="type"
        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition hover:tw-bg-blue-100">
        <slot></slot>
    </el-button>
</template>


<script>
import {defineComponent} from 'vue'
import {ElButton} from 'element-plus'

export default defineComponent({
    components: {ElButton},
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    },
})
</script>

<style lang="scss">
.el-button {
    min-height: inherit;
}
</style>
