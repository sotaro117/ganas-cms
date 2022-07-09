<template>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative flex lg:inline-flex items-center rounded-xl">
            <slot />
        </div>

        <!-- Search -->
        <div
            class="relative flex lg:inline-flex items-center"
            :class="{
                'bg-white rounded-xl border border-gray-200': input,
                'border border-gray-400 rounded-md bg-white': admin,
            }"
        >
            <input
                type="text"
                name="search"
                placeholder="Search..."
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                class="
                    bg-transparent
                    placeholder-gray-400
                    font-semibold
                    text-sm
                    px-4
                    py-2
                    rounded-xl
                "
            />
        </div>
        <button
            class="bg-transparent px-2 py-4 hover:text-blue-500"
            type="button"
            @click="$emit('reset')"
        >
            reset
        </button>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: String,
        input: Boolean,
        admin: Boolean,
    },
    emits: ["update:modelValue", "reset"],
};
</script>
