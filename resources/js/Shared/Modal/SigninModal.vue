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
                            <form action="" @submit.prevent="signin">
                                <div class="px-10 py-12">
                                    <h1 class="text-center text-3xl font-bold">
                                        Sign In
                                    </h1>

                                    <div class="mt-10">
                                        <label
                                            class="
                                                block
                                                mb-2
                                                uppercase
                                                font-bold
                                                text-xs
                                            "
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
                                        <label
                                            class="
                                                block
                                                mb-2
                                                uppercase
                                                font-bold
                                                text-xs
                                                mt-6
                                            "
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
                                        Create account
                                    </button>
                                    <div class="mt-5 hover:text-green-500">
                                        <Link href="/login"
                                            >already registered?</Link
                                        >
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
                last_name: "",
                first_name: "",
                email: "",
                password: "",
            }),
        };
    },
    methods: {
        close() {
            this.$emit("close");
        },
        signin() {
            this.form.post("/signin");
        },
    },
};
</script>
