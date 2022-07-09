<template>
    <div class="block sm:hidden">
        <button
            @click="toggle"
            class="
                flex
                items-center
                px-3
                py-2
                rounded
                text-teal-lighter
                border-teal-light
                w-full
                shadow-lg
                z-10
                justify-center
            "
        >
            <Icon name="nav" :stroke="true" v-if="!isOpen" />
            <Icon name="close" v-if="isOpen" :stroke="true" />
        </button>
    </div>
    <ul
        :class="isOpen ? 'block' : 'hidden'"
        class="
            sm:flex
            sm:w-auto
            text-center
            justify-evenly
            pt-2
            pb-5
            bg-white-100
            font-semibold
            border-green-400 border-y-2
            text-white
        "
        id="nav-list"
    >
        <!-- <li 
        class="w-full flex-grow sm:flex sm:items-center sm:w-auto shadow-lg"></li> -->
        <li
            v-for="category in $page.props.category.categories"
            :key="category.id"
            class="pt-3"
        >
            <Link
                class="hover:text-green-400"
                :href="`/categories/${category.name}`"
                >{{ category.name }}</Link
            >
        </li>
    </ul>
</template>

<script>
import Icon from "./Icon.vue";
export default {
    components: {
        Icon,
    },
    data() {
        return {
            isOpen: false,
        };
    },
    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
        },
    },
};
</script>

<style scoped>
@keyframes nav-down {
    from {
        transform: translateY(0px);
    }
    to {
        transform: translateY(20px);
    }
}
#nav-list {
    animation-name: "nav-down";
    animation-duration: 5s;
}
</style>
