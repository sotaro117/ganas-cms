<template>
    <Head title="サインアップ | ganas" />
    <section class="flex items-center justify-center p-6 h-full">
        <main class="w-full max-w-md justify-center">
            <form
                action=""
                class="mt-8 fill-white"
                height="50"
                @submit.prevent="signin"
            >
                <div class="px-10 py-12">
                    <h1 class="text-center text-3xl font-bold">Sign In</h1>
                    <div class="mb-6">
                        <div class="mt-10">
                            <label
                                class="block mb-2 uppercase font-bold text-xs"
                                for="last_name"
                                >Last Name</label
                            >
                            <input
                                v-model="form.last_name"
                                type="last_name"
                                id="last_name"
                                class="border p-2 w-full rounded"
                                required
                            />
                            <div
                                v-if="form.errors.last_name"
                                v-text="form.errors.last_name"
                                class="text-red-500 text-xs mt-1"
                            ></div>
                        </div>
                        <div class="mt-6">
                            <label
                                class="block mb-2 uppercase font-bold text-xs"
                                for="first_name"
                                >First Name</label
                            >
                            <input
                                v-model="form.first_name"
                                type="first_name"
                                id="first_name"
                                class="border p-2 w-full rounded"
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
                                class="
                                    block
                                    mb-2
                                    uppercase
                                    font-bold
                                    text-xs
                                    mt-6
                                "
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
                            <div
                                v-if="form.errors.email"
                                v-text="form.errors.email"
                                class="text-red-500 text-xs mt-1"
                            ></div>
                        </div>
                        <div class="mb-6">
                            <label
                                class="
                                    block
                                    mb-2
                                    uppercase
                                    font-bold
                                    text-xs
                                    mt-6
                                "
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
                            <div
                                v-if="form.errors.password"
                                v-text="form.errors.password"
                                class="text-red-500 text-xs mt-1"
                            ></div>
                        </div>
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
                        Create account
                    </button>
                    <div class="text-center mt-5 hover:text-blue-500">
                        <Link href="/login">Already registered?</Link>
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
                last_name: "",
                first_name: "",
                email: "",
                password: "",
            }),
        };
    },
    methods: {
        signin() {
            this.form.post("/signin");
        },
    },
};
</script>
