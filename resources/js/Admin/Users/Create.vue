<template>
    <Head title="Create News" />

    <h1 class="text-3xl">Create New Users</h1>

    <form @submit.prevent="store" class="max-w-2xl mx-auto mt-8">
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
                for="password"
            >
                Password
            </label>
            <input
                v-model="form.password"
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="password"
                id="password"
                placeholder="password"
                required
            />

            <div
                v-if="form.errors.password"
                v-text="form.errors.password"
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
                Create user
            </button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                last_name: "",
                first_name: "",
                email: "",
                password: "",
            }),
        };
    },
    methods: {
        store() {
            this.form.post("/admin/users/store");
        },
    },
};
</script>
