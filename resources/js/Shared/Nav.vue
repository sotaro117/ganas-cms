<template>
    <div class="font-sans antialiased">
        <nav class="flex items-center justify-between flex-wrap bg-teal px-2">
            <div class="flex items-center flex-shrink text-white mr-6">
                <Link href="/">
                    <svg
                        class="fill-current h-8 w-8 mr-2"
                        width="52"
                        height="52"
                        viewBox="0 0 54 54"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"
                        />
                    </svg>
                </Link>
            </div>
            <ul
                class="flex space-x-10 mt-5 md:mt-0 order-2 md:block"
                :class="isOpen ? 'block' : 'hidden'"
                v-if="username"
            >
                <DropdownNew class="pr-10">
                    <template v-slot:trigger class="md:flex">
                        <img
                            class="rounded-full"
                            src="https://dummyimage.com/50"
                        />
                    </template>
                    <li>
                        <Link
                            v-if="username.name === 'John Doe'"
                            :href="
                                username.name === 'John Doe'
                                    ? '/admin/dashboard'
                                    : ''
                            "
                            class="
                                px-3
                                py-2
                                leading-loose
                                text-xs
                                block
                                hover:bg-gray-100
                            "
                            >Admin</Link
                        >
                    </li>
                    <li v-if="$page.props.can.supporter">
                        <Link
                            :href="`/users/${username.id}/edit`"
                            class="
                                px-3
                                py-2
                                leading-loose
                                text-xs
                                block
                                hover:bg-gray-100
                            "
                            >Profile</Link
                        >
                    </li>
                    <li v-if="!$page.props.can.supporter">
                        <Link
                            href="/subscription"
                            class="
                                px-3
                                py-2
                                leading-loose
                                text-xs
                                block
                                hover:bg-gray-100
                            "
                            >Subscribe</Link
                        >
                    </li>
                    <li v-if="$page.props.can.supporter">
                        <a
                            href="/billing-portal"
                            class="
                                px-3
                                py-2
                                leading-loose
                                text-xs
                                block
                                hover:bg-gray-100
                            "
                            >Billing Portal</a
                        >
                    </li>
                    <li v-if="$page.props.can.supporter">
                        <a
                            href="#"
                            class="
                                px-3
                                py-2
                                leading-loose
                                text-xs
                                block
                                hover:bg-gray-100
                            "
                            >Facebook group</a
                        >
                    </li>
                    <li>
                        <Link
                            href="/logout"
                            method="post"
                            class="
                                w-full
                                text-left
                                px-3
                                py-2
                                leading-loose
                                text-xs
                                hover:bg-gray-100
                            "
                            as="button"
                            >Logout</Link
                        >
                    </li>
                </DropdownNew>
                <h4 class="md:hidden font-semibold items-center mt-3">
                    {{ username.name }}
                </h4>
            </ul>
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
                        hover:text-white
                        order-1
                    "
                >
                    <Icon name="nav" v-if="!isOpen" />
                    <Icon name="close" v-if="isOpen" />
                </button>
            </div>
            <div
                :class="isOpen ? 'block' : 'hidden'"
                class="
                    w-full
                    flex-grow
                    sm:flex
                    sm:items-center
                    sm:w-auto
                    transition
                    duration-400
                "
            >
                <div class="text-md sm:flex-grow">
                    <NavLink
                        href="/events"
                        class="
                            no-underline
                            block
                            mt-4
                            sm:inline-block
                            sm:mt-0
                            text-teal-lighter
                            mr-6
                        "
                        :active="$page.component === 'Event/Index'"
                        >Events</NavLink
                    >

                    <NavLink
                        href="/news"
                        class="
                            no-underline
                            block
                            mt-4
                            sm:inline-block
                            sm:mt-0
                            text-teal-lighter
                            mr-6
                        "
                        :active="$page.component === 'News/Index'"
                        >News</NavLink
                    >
                    <NavLink
                        href="/posts"
                        :active="$page.component === 'Posts/Index'"
                        class="
                            no-underline
                            block
                            mt-4
                            sm:inline-block
                            sm:mt-0
                            text-teal-lighter
                            mr-6
                        "
                        >Posts</NavLink
                    >
                    <Link
                        class="
                            no-underline
                            block
                            mt-4
                            sm:inline-block
                            sm:mt-0
                            text-teal-lighter
                            hover:font-bold
                        "
                        @click="openPricing"
                    >
                        Pricing
                    </Link>
                </div>

                <div class="border border-b-0 border-gray-400 mt-5"></div>

                <div v-if="!username">
                    <Link
                        @click="openSignin"
                        class="
                            no-underline
                            inline-block
                            text-sm
                            px-4
                            py-2
                            leading-none
                            border
                            rounded
                            border
                            hover:border-green-400
                            hover:text-teal
                            mt-4
                            sm:mt-0
                        "
                        >Sign Up</Link
                    >
                    <Link
                        @click="openLogin"
                        class="
                            no-underline
                            inline-block
                            text-sm
                            ml-4
                            px-4
                            py-2
                            leading-none
                            border
                            rounded
                            border
                            hover:border-green-400
                            hover:text-teal
                            mt-4
                            sm:mt-0
                        "
                        >Log In</Link
                    >
                </div>
            </div>
        </nav>
        <SigninModal :open="signinOpen" @close="signinOpen = false" />
        <LoginModal :open="loginOpen" @close="loginOpen = false" />
        <PricingModal :open="pricingOpen" @close="pricingOpen = false" />
    </div>
</template>

<script>
import NavLink from "./NavLink.vue";
import DropdownNew from "./DropdownNew.vue";
import SigninModal from "./Modal/SigninModal.vue";
import LoginModal from "./Modal/LoginModal.vue";
import PricingModal from "./Modal/PricingModal.vue";
import Icon from "./Icon.vue";

export default {
    components: {
        NavLink,
        DropdownNew,
        SigninModal,
        LoginModal,
        Icon,
        PricingModal,
    },
    data() {
        return {
            isOpen: false,
            signinOpen: false,
            loginOpen: false,
            pricingOpen: false,
        };
    },
    methods: {
        openSignin() {
            this.signinOpen = true;
        },
        openLogin() {
            this.loginOpen = true;
        },
        openPricing() {
            this.pricingOpen = true;
        },
        toggle() {
            this.isOpen = !this.isOpen;
        },
    },
    computed: {
        username() {
            return this.$page.props.auth.user;
        },
    },
};
</script>
