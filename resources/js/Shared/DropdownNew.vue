<template>
    <div class="dropdown relative">
        <div
            class="dropdown trigger"
            @click.prevent="isOpen = !isOpen"
            aria-haspopup="true"
            :aria-expanded="isOpen"
        >
            <slot name="trigger"></slot>
        </div>

        <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <ul
                v-show="isOpen"
                class="
                    origin-top-right
                    absolute
                    bg-white
                    lg:right-0
                    w-40
                    mt-2
                    py-2
                    rounded
                    shadow
                    z-10
                "
            >
                <slot></slot>
            </ul>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false,
        };
    },
    watch: {
        isOpen(isOpen) {
            if (isOpen) {
                document.addEventListener("click", this.isClose);
            }
        },
    },
    methods: {
        isClose(event) {
            if (!event.target.closest(".dropdown")) {
                this.isOpen = false;

                document.addEventListener("click", this.isClose);
            }
        },
    },
};
</script>

<style scoped>
/* .pop-out-quick-enter-active,
.pop-out-quick-leave-active {
    transition: all 0.4s;
}
.pop-out-quick-enter,
.pop-out-quick-leave-active {
    opacity: 0;
    transform: translateY(-7px);
} */
</style>
