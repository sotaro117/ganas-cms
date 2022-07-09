<template>
    <section class="p-6 bg-white" id="nav">
        <header><Nav /></header>
    </section>
    <section class="bg-black">
        <CategoryNav />
    </section>
    <section class="bg-white">
        <div class="max-w-full">
            <slot></slot>
            <Visible when-hidden="#nav">
                <button
                    @click.prevent="scroll()"
                    class="
                        bg-white
                        hover-bg-blue-200
                        shadow-md
                        rounded-full
                        border border-gray-500
                        text-gray-800
                        px-4
                        py-4
                        fixed
                        text-lg
                        z-10
                        right-0
                        bottom-0
                        mr-4
                        mb-4
                    "
                >
                    <Icon name="cheveron-up" />
                </button>
            </Visible>
        </div>
    </section>

    <section class="max-w-full bg-black border-2 border-green-400 py-10">
        <Footer />
    </section>
</template>

<script>
import Nav from "./Nav.vue";
import Visible from "./Visible.vue";
import Footer from "./Footer.vue";
import Icon from "./Icon.vue";
import CategoryNav from "./CategoryNav.vue";
export default {
    components: { Nav, Visible, Footer, Icon, CategoryNav },
    methods: {
        scroll() {
            window.scroll({ top: 0, left: 0, behavior: "smooth" });
        },
    },
};
</script>
