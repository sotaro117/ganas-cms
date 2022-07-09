<template>
    <Head title="Edit Category" />

    <h1 class="text-3xl">Edit Category</h1>

    <form @submit.prevent="update" class="max-w-2xl mx-auto mt-8">
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
                :placeholder="`${category.name}`"
                required
            />
            <div
                v-if="form.errors.name"
                v-text="form.errors.name"
                class="text-red-500 text-xs mt-1"
            ></div>
        </div>

        <div class="mb-6 flex">
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
                Update category
            </button>
            <button
                class="
                    bg-red-400
                    ml-4
                    py-2
                    px-4
                    rounded
                    hover:bg-red-500
                    text-white
                "
                @click="destroy"
            >
                Delete category
            </button>
        </div>
    </form>
</template>

<script>
export default {
    props: { category: Object },
    data() {
        return {
            form: this.$inertia.form({
                name: "",
            }),
        };
    },
    methods: {
        update() {
            this.form.put(`/admin/category/${this.category.id}`);
        },
        destroy() {
            this.form.delete(`/admin/category/${this.category.id}`);
        },
    },
};
</script>
