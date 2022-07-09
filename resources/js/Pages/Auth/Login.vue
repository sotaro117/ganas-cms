<template>
    <Head title="ログイン | ganas" />
    <section class="flex items-center justify-center p-10 h-full">
        <main class="w-full max-w-md">
            <form
                action=""
                class="mt-8 fill-white"
                height="50"
                @submit.prevent="login"
            >
                <div class="px-10 py-12">
                    <h1 class="text-center text-3xl font-bold">Login</h1>

                    <div class="mt-10">
                        <label
                            class="block mb-2 uppercase font-bold text-xs"
                            for="email"
                            >Email</label
                        >
                        <input
                            v-model="form.email"
                            type="email"
                            id="email"
                            class="border p-2 w-full rounded"
                            required
                        />

                        <label
                            class="block mb-2 uppercase font-bold text-xs mt-6"
                            for="password"
                            >Password</label
                        >
                        <input
                            v-model="form.password"
                            type="password"
                            id="password"
                            class="border p-2 w-full rounded"
                            required
                        />
                    </div>
                </div>
                <div class="flex flex-col">
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
                        Login
                    </button>
                    <div
                        v-if="form.errors.email"
                        v-text="form.errors.email"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                    <div class="text-center mt-5 hover:text-blue-500">
                        <Link href="/forgot-password">
                            Forgot your password?
                        </Link>
                    </div>
                    <div class="text-center mt-5 hover:text-blue-500">
                        <Link href="/signin"> Not registered yet? </Link>
                    </div>
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
                email: "",
                password: "",
            }),
        };
    },
    methods: {
        login() {
            this.form.post("/login");
        },
    },
};
</script>
