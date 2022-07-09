<template>
    <Head title="パスワードリセット | ganas" />
    <section class="flex items-center justify-center p-6 h-full">
        <main class="w-full max-w-md justify-center">
            <form
                action=""
                class="mt-8 fill-white"
                height="50"
                @submit.prevent="resetPassword"
            >
                <div class="px-10 py-12">
                    <h1 class="text-center text-3xl font-bold">
                        Reset Password
                    </h1>

                    <div class="mt-10">
                        <!-- <label
                            class="block mb-2 uppercase font-bold text-xs mt-6"
                            for="email"
                            >Email</label
                        >
                        <input
                            v-model="form.email"
                            type="email"
                            id="email"
                            class="border p-2 w-full rounded"
                            autocomplete="email"
                            required
                        /> -->
                        <label
                            class="block mb-2 uppercase font-bold text-xs mt-6"
                            for="password"
                            >Password
                        </label>
                        <input
                            v-model="form.password"
                            type="password"
                            id="password"
                            class="border p-2 w-full rounded"
                            autocomplete="password"
                            required
                        />
                        <label
                            class="block mb-2 uppercase font-bold text-xs mt-6"
                            for="password_confirmation"
                            >Password Confirmation</label
                        >
                        <input
                            v-model="form.password_confirmation"
                            type="password"
                            id="password_confirmation"
                            class="border p-2 w-full rounded"
                            autocomplete="password_confirmation"
                            required
                        />
                    </div>
                    <div v-if="form.hasErrors" class="text-red-500 mt-3">
                        <ul v-for="(error, key) in form.errors" :key="key">
                            <li>{{ error }}</li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col px-10 py-4">
                    <button
                        type="submit"
                        class="
                            mx-auto
                            shadow-xl
                            rounded
                            py-3
                            px-5
                            text-white
                            bg-blue-500
                            hover:bg-blue-400
                            transition
                        "
                        :disabled="form.processing"
                    >
                        Reset Password
                    </button>
                </div>
            </form>
        </main>
    </section>
</template>

<script>
export default {
    data() {
        return {
            form: this.$inertia.form({
                email: new URLSearchParams(window.location.search).get("email"),
                password: "",
                password_confirmation: "",
                token: new URLSearchParams(window.location.search).get("token"),
            }),
        };
    },
    methods: {
        resetPassword() {
            this.form.post("/reset-password");
        },
    },
};
</script>
