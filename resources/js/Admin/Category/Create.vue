<template>
    <Head title="Create News" />

    <h1 class="text-3xl">Create New News</h1>

    <form @submit.prevent="store" class="max-w-2xl mx-auto mt-8">
        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="name"
            >
                Name
            </label>

            <input
                v-model="form.name"
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="name"
                id="name"
                required
            />
            <div
                v-if="form.errors.name"
                v-text="form.errors.name"
                class="text-red-500 text-xs mt-1"
            ></div>
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="
                    bg-blue-400
                    text-white
                    rounded
                    py-2
                    px-4
                    hover:bg-blue-500
                "
                :disabled="form.processing"
            >
                Create Category
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                name: "",
            }),
        };
    },
    methods: {
        store() {
            this.form.post("/admin/category/store");
        },
    },
};
</script>
