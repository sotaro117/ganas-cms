<template>
    <div>
        <Head title="Users" />
        <h1 class="mb-8 text-3xl font-bold">Users</h1>

        <div class="flex items-center justify-between mb-6">
            <Link
                class="
                    bg-blue-400
                    rounded-sm
                    px-3
                    py-2
                    text-white
                    hover:bg-blue-500
                "
                href="/admin/users/create"
            >
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;User</span>
            </Link>
            <Filter
                v-model="search"
                @reset="reset"
                :admin="$page.component === 'Users/Index'"
            ></Filter>
        </div>

        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">Name</th>
                    <th class="pb-4 pt-6 px-6">Email</th>
                    <th class="pb-4 pt-6 px-6" colspan="2">Plan</th>
                </tr>
                <tr
                    v-for="user in users.data"
                    :key="user.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <Link
                            class="
                                flex
                                items-center
                                px-6
                                py-4
                                focus:text-indigo-500
                            "
                            :href="`/admin/users/${user.id}/edit`"
                        >
                            {{ user.last_name + " " + user.first_name }}
                            <icon
                                v-if="user.deleted_at"
                                name="trash"
                                class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"
                            />
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4"
                            :href="`/admin/users/${user.id}/edit`"
                            tabindex="-1"
                        >
                            {{ user.email }}
                        </Link>
                    </td>
                    <td
                        class="border-t"
                        v-for="(subscription, i) in user.subscriptions"
                        :key="i"
                    >
                        <Link
                            class="flex items-center px-6 py-4"
                            :href="`/admin/users/${user.id}/edit`"
                            tabindex="-1"
                        >
                            {{
                                subscription.items ? subscription.name : "free"
                            }}
                        </Link>
                    </td>
                    <td class="w-px border-t">
                        <Link
                            class="flex items-center px-4"
                            :href="`/admin/users/${user.id}/edit`"
                            tabindex="-1"
                        >
                            <icon
                                name="cheveron-right"
                                class="block w-6 h-6 fill-gray-400"
                            />
                        </Link>
                    </td>
                </tr>
                <tr v-if="users.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">
                        No users found.
                    </td>
                </tr>
            </table>
        </div>
        <Pagination :links="users.links" class="mt-5 text-center" />
    </div>
</template>

<script>
import Icon from "../../Shared/Icon.vue";
import Filter from "../../Shared/Filter.vue";
import Pagination from "../../Shared/Pagination.vue";
export default {
    props: { users: Object, filters: Object },
    components: { Icon, Filter, Pagination },
    data() {
        return {
            search: this.filters.search,
        };
    },
    watch: {
        search(value) {
            this.$inertia.get(
                "/admin/users",
                { search: value },
                {
                    preserveState: true,
                    replace: true,
                }
            );
        },
    },
    methods: {
        reset() {
            this.search = null;
        },
        check(user) {
            console.log(user.subscriptions);
        },
    },
};
</script>
