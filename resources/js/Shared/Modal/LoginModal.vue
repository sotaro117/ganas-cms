<template>
    <TransitionRoot appear :show="open" as="template">
        <Dialog as="div" @close="close" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="
                        flex
                        min-h-full
                        items-center
                        justify-center
                        p-4
                        text-center
                    "
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="
                                w-full
                                max-w-lg
                                transform
                                overflow-hidden
                                rounded-2xl
                                bg-white
                                p-6
                                text-left
                                align-middle
                                shadow-xl
                                transition-all
                            "
                        >
                            <div
                                class="
                                    text-right text-3xl
                                    cursor-pointer
                                    hover:text-green-400
                                "
                                @click="close"
                            >
                                &times
                            </div>
                            <form action="" height="50" @submit.prevent="login">
                                <div class="px-10 py-12">
                                    <h1 class="text-center text-3xl font-bold">
                                        Login
                                    </h1>

                                    <div class="mt-10 items-center">
                                        <label
                                            class="
                                                block
                                                mb-2
                                                uppercase
                                                font-bold
                                                text-xs
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
                                <div class="flex-col text-center">
                                    <button
                                        type="submit"
                                        class="
                                            mx-auto
                                            shadow-xl
                                            rounded
                                            py-3
                                            px-5
                                            text-white
                                            bg-green-500
                                            hover:bg-green-400
                                            transition
                                        "
                                        :disabled="form.processing"
                                        @click="close"
                                    >
                                        Login
                                    </button>
                                    <div class="mt-5 hover:text-green-500">
                                        <Link href="/forgot-password"
                                            >forgot your password?</Link
                                        >
                                    </div>
                                    <div class="mt-5 hover:text-green-500">
                                        <Link href="/signin">Signin</Link>
                                    </div>
                                </div>
                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
export default {
    props: { open: Boolean },
    components: {
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogPanel,
        DialogTitle,
    },
    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
            }),
        };
    },
    methods: {
        close() {
            this.$emit("close");
        },
        login() {
            this.form.post("/login");
        },
    },
};
</script>
