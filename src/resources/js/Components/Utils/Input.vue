<template>
    <el-input
        ref="input"
        v-model="value"
        @input="$emit('update:modelValue', $event)"
        :placeholder="placeholder"
        type="text"
        class="
            border-gray-300
            focus:border-indigo-300
            focus:ring
            focus:ring-indigo-200
            focus:ring-opacity-50
            rounded-md
            shadow-sm
        "
    >
    </el-input>
</template>

<script>
import { defineComponent, onMounted, ref } from "vue";
import { ElInput } from "element-plus";

export default defineComponent({
    components: { ElInput },
    name: "input",
    props: ["modelValue", "placeholder"],
    emits: ["update:modelValue"],
    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
    setup(props) {
        const value = ref(props.modelValue);
        const input = ref(null);

        onMounted(() => {
            input.value.$el.classList.forEach((entry) => {
                input.value.input.classList.add(entry);
            });
        });

        return {
            value,
            input,
        };
    },
});
</script>
