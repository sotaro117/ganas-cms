<template>
    <transition name="fade">
        <div v-show="display">
            <slot></slot>
        </div>
    </transition>
</template>

<script>
import inViewPort from "in-viewport";
export default {
    props: ["whenHidden"],
    data() {
        return {
            display: false,
        };
    },
    mounted() {
        window.addEventListener(
            "scroll",
            () => {
                this.display = !inViewPort(
                    document.querySelector(this.whenHidden)
                );
            },
            { passive: true }
        );
    },
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
