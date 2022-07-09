<template>
    <Head title="Edit User" />

    <h1 class="text-3xl">Edit User</h1>

    <form @submit.prevent="update" class="max-w-2xl mx-auto mt-8">
        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="last_name"
            >
                Last Name
            </label>

            <input
                v-model="form.last_name"
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="last_name"
                id="last_name"
                :placeholder="`${user.last_name}`"
                required
            />
            <div
                v-if="form.errors.last_name"
                v-text="form.errors.last_name"
                class="text-red-500 text-xs mt-1"
            ></div>
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="first_name"
            >
                First Name
            </label>
            <input
                v-model="form.first_name"
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="first_name"
                id="first_name"
                :placeholder="`${user.first_name}`"
                required
            />

            <div
                v-if="form.errors.first_name"
                v-text="form.errors.first_name"
                class="text-red-500 text-xs mt-1"
            ></div>
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="email"
            >
                Email
            </label>
            <input
                v-model="form.email"
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="email"
                id="email"
                :placeholder="`${user.email}`"
                required
            />

            <div
                v-if="form.errors.email"
                v-text="form.errors.email"
                class="text-red-500 text-xs mt-1"
            ></div>
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="description"
            >
                Description
            </label>
            <textarea
                v-model="form.description"
                class="p-3 w-full border border-gray-200"
                name="description"
                id="description"
                rows="7"
                :placeholder="`${user.description}`"
                required
            ></textarea>

            <div
                v-if="form.errors.description"
                v-text="form.errors.description"
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
                Update user
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
                Delete user
            </button>
        </div>
    </form>
</template>

<script>
export default {
    props: { user: Object },
    data() {
        return {
            form: this.$inertia.form({
                last_name: "",
                first_name: "",
                email: "",
                description: "",
            }),
        };
    },
    methods: {
        update() {
            this.form.put(`/admin/users/${this.user.id}`);
        },
        destroy() {
            this.form.delete(`/admin/users/${this.user.id}`);
        },
    },
};
</script>
