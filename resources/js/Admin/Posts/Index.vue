<template>
    <div>
        <Head title="Posts" />
        <h1 class="mb-8 text-3xl font-bold">Posts</h1>

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
                href="/admin/posts/create"
            >
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;Post</span>
            </Link>
            <Filter
                v-model="form.search"
                @reset="reset"
                :admin="$page.component === 'Posts/Index'"
            >
                <select
                    class="
                        flex
                        appearance-none
                        bg-white
                        py-2
                        pl-3
                        pr-9
                        text-sm
                        font-semibold
                        rounded-xl
                        border border-gray-400
                        mr-2
                        relative
                    "
                    v-model="form.categories"
                >
                    <option :value="null" disabled selected>Category</option>
                    <option
                        v-for="category in $page.props.category.categories"
                        :key="category.id"
                        :value="category.name"
                    >
                        {{ category.name }}
                    </option>
                </select>

                <select
                    class="
                        flex
                        appearance-none
                        bg-white
                        py-2
                        pl-3
                        pr-9
                        text-sm
                        font-semibold
                        rounded-xl
                        border border-gray-400
                        relative
                    "
                    v-model="form.user"
                >
                    <option :value="null" disabled selected>User</option>
                    <option
                        v-for="user in users"
                        :key="user.id"
                        :value="`${user.last_name}`"
                    >
                        {{ user.last_name + " " + user.first_name }}
                    </option>
                </select>
            </Filter>
        </div>

        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">Title</th>
                    <th class="pb-4 pt-6 px-6">Category</th>
                    <th class="pb-4 pt-6 px-6">Author</th>
                    <th class="pb-4 pt-6 px-6" colspan="2">Published</th>
                </tr>
                <tr
                    v-for="post in posts.data"
                    :key="post.id"
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
                            :href="`/admin/posts/${post.id}/edit`"
                        >
                            {{ post.title }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <div class="flex">
                            <ul class="flex">
                                <li
                                    v-for="category in post.categories"
                                    :key="category.id"
                                    class="
                                        mr-2
                                        border border-gray-400
                                        rounded-sm
                                        px-2
                                        py-1
                                    "
                                >
                                    {{ category.name }}
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4"
                            :href="`/admin/posts/${post.id}/edit`"
                            tabindex="-1"
                        >
                            {{
                                post.user.last_name + " " + post.user.first_name
                            }}
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4"
                            :href="`/admin/posts/${post.id}/edit`"
                            tabindex="-1"
                        >
                            {{ post.created_at }}
                        </Link>
                    </td>
                    <td class="w-px border-t">
                        <Link
                            class="flex items-center px-4"
                            :href="`/admin/posts/${post.id}/edit`"
                            tabindex="-1"
                        >
                            <icon
                                name="cheveron-right"
                                class="block w-6 h-6 fill-gray-400"
                            />
                        </Link>
                    </td>
                </tr>
                <tr v-if="posts.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">
                        No posts found.
                    </td>
                </tr>
            </table>
        </div>
        <Pagination :links="posts.links" class="mt-8 text-center" />
    </div>
</template>

<script>
import Icon from "../../Shared/Icon.vue";
import Filter from "../../Shared/Filter.vue";
import Pagination from "../../Shared/Pagination.vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";
export default {
    props: {
        posts: Object,
        filters: Object,
        TrashedPosts: Object,
        users: Object,
    },
    components: { Icon, Filter, Pagination },
    data() {
        return {
            form: {
                search: this.filters.search,
                categories: this.filters.categories,
                user: this.filters.user,
            },
        };
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get(
                    "/admin/posts",
                    pickBy(this.form),
                    { preserveState: true, replace: true },
                    150
                );
            }),
        },
    },
    methods: {
        reset() {
            this.form = mapValues(this.form, () => null);
        },
    },
};
</script>
