<template>
    <div>
        <Head title="Users" />
        <h1 class="mb-8 text-3xl font-bold">News</h1>

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
                href="/admin/news/create"
            >
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;News</span>
            </Link>
            <Filter
                v-model="search"
                @reset="reset"
                :admin="$page.component === 'News/Index'"
            ></Filter>
        </div>

        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="pb-4 pt-6 px-6">Title</th>
                    <th class="pb-4 pt-6 px-6" colspan="2">Published</th>
                </tr>
                <tr
                    v-for="pressRelease in news.data"
                    :key="pressRelease.id"
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
                            :href="`/admin/news/${pressRelease.id}/edit`"
                        >
                            {{ pressRelease.title }}
                        </Link>
                    </td>

                    <td class="border-t">
                        <Link
                            class="flex items-center px-6 py-4"
                            :href="`/admin/newss/${pressRelease.id}/edit`"
                            tabindex="-1"
                        >
                            {{ pressRelease.created_at }}
                        </Link>
                    </td>
                    <td class="w-px border-t">
                        <Link
                            class="flex items-center px-4"
                            :href="`/admin/news/${pressRelease.id}/edit`"
                            tabindex="-1"
                        >
                            <icon
                                name="cheveron-right"
                                class="block w-6 h-6 fill-gray-400"
                            />
                        </Link>
                    </td>
                </tr>
                <tr v-if="news.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">
                        No news found.
                    </td>
                </tr>
            </table>
        </div>
        <Pagination :links="news.links" class="mt-8 text-center" />
    </div>
</template>

<script>
import Icon from "../../Shared/Icon.vue";
import Pagination from "../../Shared/Pagination.vue";
import Filter from "../../Shared/Filter.vue";

export default {
    props: { news: Object, filters: Object },
    components: { Icon, Filter, Pagination },
    data() {
        return {
            search: this.filters.search,
        };
    },
    watch: {
        search(value) {
            this.$inertia.get(
                "/admin/news",
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
    },
};
</script>
