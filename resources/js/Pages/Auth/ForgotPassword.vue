<template>
    <Head title="パスワード忘れ | ganas" />
    <section class="flex items-center justify-center h-96">
        <main class="w-full max-w-md justify-center">
            <form
                class="rounded-xl fill-white"
                height="50"
                @submit.prevent="forgotPassword"
            >
                <div class="px-10 py-12">
                    <h1 class="text-center text-3xl font-bold">
                        Enter your email
                    </h1>

                    <div class="mt-10">
                        <label
                            class="block mb-2 uppercase font-bold text-xs mt-6"
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
                </div>
                <div class="flex px-10">
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
                        Send
                    </button>
                    <div v-if="form.sent" v-text="form.sent"></div>
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
            }),
        };
    },
    methods: {
        forgotPassword() {
            this.form.post("/forgot-password");
            this.form.email = "";
        },
    },
};
</script>
