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
                                max-w-3xl
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
                            ><div
                                class="
                                    text-right text-3xl
                                    cursor-pointer
                                    hover:text-blue-600
                                "
                                @click="close"
                            >
                                &times
                            </div>
                            <div class="text-center py-5 px-2">
                                <h1 class="mb-3 text-3xl">サポーター会員</h1>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Quae, debitis, itaque
                                    soluta ea qui dolorem incidunt neque
                                    reprehenderit in temporibus, atque beatae.
                                    Rem aliquam autem doloremque cupiditate ipsa
                                    error eos.
                                </p>
                            </div>
                            <div
                                class="
                                    flex flex-wrap
                                    justify-center
                                    -mx-4
                                    3xl:-mx-6
                                    p-6
                                "
                            >
                                <div
                                    class="
                                        w-full
                                        lg:w-1/2
                                        3xl:w-auto
                                        px-4
                                        3xl:px-6
                                        mb-5
                                        lg:mb-0
                                    "
                                >
                                    <div
                                        class="
                                            border border-gray-200
                                            pt-12
                                            pb-16
                                            px-6
                                            sm:px-14
                                            bg-white
                                            rounded-md
                                            shadow-lg
                                        "
                                    >
                                        <div
                                            class="
                                                flex
                                                items-center
                                                justify-between
                                                mb-6
                                            "
                                        >
                                            <h5 class="font-heading text-xl">
                                                12 month
                                            </h5>
                                            <span class="text-sm text-gray-400"
                                                >Membership</span
                                            >
                                        </div>
                                        <div class="flex mb-8">
                                            <span
                                                class="
                                                    relative
                                                    top-1
                                                    self-start
                                                    text-2xl
                                                    mr-3
                                                "
                                                >&pound;</span
                                            >
                                            <span class="text-4xl">17.49</span>
                                            <span
                                                class="
                                                    self-end
                                                    text-sm text-gray-400
                                                "
                                                >/per mo</span
                                            >
                                        </div>
                                        <div
                                            class="
                                                flex flex-col flex-wrap
                                                -mx-2
                                            "
                                        >
                                            <div class="w-full px-2 mb-4">
                                                <div class="flex">
                                                    <svg
                                                        class="flex-shrink-0"
                                                        width="28"
                                                        height="28"
                                                        viewbox="0 0 28 28"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <circle
                                                            opacity="0.1"
                                                            cx="14"
                                                            cy="14"
                                                            r="14"
                                                            fill="#95A8FF"
                                                        ></circle>
                                                        <path
                                                            d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                                            fill="#95A8FF"
                                                        ></path>
                                                        <defs>
                                                            <rect
                                                                width="9"
                                                                height="7"
                                                                fill="white"
                                                                transform="translate(10 11)"
                                                            ></rect>
                                                        </defs>
                                                    </svg>
                                                    <span
                                                        class="ml-4 font-light"
                                                        >The house by the pond
                                                        cras ornare</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="w-full px-2">
                                                <div class="flex">
                                                    <svg
                                                        class="flex-shrink-0"
                                                        width="28"
                                                        height="28"
                                                        viewbox="0 0 28 28"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <circle
                                                            opacity="0.1"
                                                            cx="14"
                                                            cy="14"
                                                            r="14"
                                                            fill="#95A8FF"
                                                        ></circle>
                                                        <path
                                                            d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                                            fill="#95A8FF"
                                                        ></path>
                                                        <defs>
                                                            <rect
                                                                width="9"
                                                                height="7"
                                                                fill="white"
                                                                transform="translate(10 11)"
                                                            ></rect>
                                                        </defs>
                                                    </svg>
                                                    <span
                                                        class="ml-4 font-light"
                                                        >All options</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="
                                        w-full
                                        lg:w-1/2
                                        3xl:w-auto
                                        px-4
                                        3xl:px-6
                                    "
                                >
                                    <div
                                        class="
                                            border border-gray-200
                                            pt-12
                                            pb-16
                                            px-6
                                            sm:px-14
                                            bg-white
                                            rounded-md
                                            shadow-lg
                                        "
                                    >
                                        <div
                                            class="
                                                flex
                                                items-center
                                                justify-between
                                                mb-6
                                            "
                                        >
                                            <h5 class="font-heading text-xl">
                                                18 month
                                            </h5>
                                            <span class="text-sm text-gray-400"
                                                >Membership</span
                                            >
                                        </div>
                                        <div class="flex mb-8">
                                            <span
                                                class="
                                                    relative
                                                    top-1
                                                    self-start
                                                    text-2xl
                                                    mr-3
                                                "
                                                >&pound;</span
                                            >
                                            <span class="text-4xl">12.66</span>
                                            <span
                                                class="
                                                    self-end
                                                    text-sm text-gray-400
                                                "
                                                >/per mo</span
                                            >
                                        </div>
                                        <div class="flex flex-col -mx-2">
                                            <div class="w-full px-2 mb-4">
                                                <div class="flex">
                                                    <svg
                                                        class="flex-shrink-0"
                                                        width="28"
                                                        height="28"
                                                        viewbox="0 0 28 28"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <circle
                                                            opacity="0.1"
                                                            cx="14"
                                                            cy="14"
                                                            r="14"
                                                            fill="#95A8FF"
                                                        ></circle>
                                                        <path
                                                            d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                                            fill="#95A8FF"
                                                        ></path>
                                                        <defs>
                                                            <rect
                                                                width="9"
                                                                height="7"
                                                                fill="white"
                                                                transform="translate(10 11)"
                                                            ></rect>
                                                        </defs>
                                                    </svg>
                                                    <span
                                                        class="ml-7 font-light"
                                                        >The house by the pond
                                                        cras ornare</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="w-full px-2">
                                                <div class="flex">
                                                    <svg
                                                        class="flex-shrink-0"
                                                        width="28"
                                                        height="28"
                                                        viewbox="0 0 28 28"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <circle
                                                            opacity="0.1"
                                                            cx="14"
                                                            cy="14"
                                                            r="14"
                                                            fill="#95A8FF"
                                                        ></circle>
                                                        <path
                                                            d="M18.9172 11.914L18.1187 11.086C18.0926 11.0587 18.0615 11.0371 18.0272 11.0223C17.993 11.0076 17.9563 11 17.9192 11C17.8821 11 17.8454 11.0076 17.8111 11.0223C17.7769 11.0371 17.7458 11.0587 17.7196 11.086L13.6371 15.5552L11.297 13.1275C11.2434 13.0719 11.1706 13.0407 11.0948 13.0407C11.019 13.0407 10.9462 13.0719 10.8926 13.1275L10.0836 13.9671C10.03 14.0227 9.99988 14.0981 9.99988 14.1768C9.99988 14.2554 10.03 14.3308 10.0836 14.3865L13.4118 17.9178C13.4425 17.949 13.4798 17.9724 13.5208 17.9861C13.5618 17.9997 13.6052 18.0033 13.6478 17.9965C13.6916 18.0044 13.7366 18.0014 13.779 17.9877C13.8214 17.974 13.8601 17.9501 13.8919 17.9178L18.9172 12.3281C18.9702 12.2732 18.9999 12.1987 18.9999 12.121C18.9999 12.0434 18.9702 11.9689 18.9172 11.9139V11.914Z"
                                                            fill="#95A8FF"
                                                        ></path>
                                                        <defs>
                                                            <rect
                                                                width="9"
                                                                height="7"
                                                                fill="white"
                                                                transform="translate(10 11)"
                                                            ></rect>
                                                        </defs>
                                                    </svg>
                                                    <span
                                                        class="ml-7 font-light"
                                                        >All options</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    methods: {
        close() {
            this.$emit("close");
        },
    },
};
</script>
