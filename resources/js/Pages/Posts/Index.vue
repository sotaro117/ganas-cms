<template>
    <Head title="記事一覧 | ganas" />
    <section class="max-w-5xl mx-auto mt-10">
        <div class="text-center">
            <div class="text-center">
                <span
                    class="
                        text-5xl
                        font-extrabold
                        tracking-tight
                        text-center
                        underline
                        capitalize
                        decoration-emerald-400
                    "
                    >Posts</span
                >
            </div>
            <div>
                <Filter
                    v-model="form.search"
                    @reset="reset"
                    :input="$page.component === 'Posts/Index'"
                >
                    <select
                        class="
                            flex-1
                            appearance-none
                            border border-gray-200
                            py-2
                            pl-3
                            pr-9
                            text-sm
                            font-semibold
                            rounded-xl
                        "
                        v-model="form.categories"
                    >
                        <option :value="null" disabled selected>
                            Category
                        </option>
                        <option
                            v-for="category in $page.props.category.categories"
                            :key="category.id"
                            :value="category.name"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                    <svg
                        class="
                            transform
                            -rotate-90
                            absolute
                            pointer-events-none
                        "
                        style="right: 12px"
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                    >
                        <g fill="none" fill-rule="evenodd">
                            <path
                                stroke="#000"
                                stroke-opacity=".012"
                                stroke-width=".5"
                                d="M21 1v20.16H.84V1z"
                            ></path>
                            <path
                                fill="#222"
                                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"
                            ></path>
                        </g>
                    </svg>
                </Filter>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-7 mt-10">
            <div
                class="
                    bg-white
                    transition
                    hover:translate-y-1
                    hover:duration-75
                    hover:shadow-none
                    overflow-hidden
                    rounded-md
                    shadow-sm
                    border border-gray-200
                    focus:
                    outline-none
                    focus:ring focus:ring-green-400
                "
                v-for="post in posts.data"
                :key="post.id"
            >
                <Link :href="`/posts/${post.slug}`">
                    <img
                        id="thumbnail"
                        :src="'../../../storage/thumbnails/' + post.thumbnail"
                        :alt="post.slug"
                        class="w-full h-60"
                    />
                </Link>

                <div class="py-2 px-4">
                    <div class="flex">
                        <ul
                            v-for="category in post.categories"
                            :key="category.id"
                        >
                            <li
                                class="
                                    py-1
                                    mr-2
                                    text-sm text-gray-600
                                    hover:underline
                                "
                            >
                                <Link :href="`/categories/${category.name}`"
                                    >{{ category.name }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <Link :href="`/posts/${post.slug}`">
                        <div class="md:text-md font-semibold">
                            {{ post.title }}
                        </div>
                    </Link>
                </div>
                <Link :href="`/posts/${post.slug}`">
                    <h4 class="text-sm p-2 text-gray-600">
                        published {{ post.created_at }}
                    </h4>
                </Link>
            </div>
        </div>

        <div class="text-center">
            <Pagination :links="posts.links" class="mt-6" />
        </div>
    </section>
</template>

<script>
import Filter from "../../Shared/Filter.vue";
import Pagination from "../../Shared/Pagination.vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import mapValues from "lodash/mapValues";
export default {
    components: {
        Filter,
        Pagination,
    },
    props: {
        posts: Object,
        filters: Object,
    },
    data() {
        return {
            form: {
                search: this.filters.search,
                categories: this.filters.categories,
            },
        };
    },
    watch: {
        form: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get(
                    "/posts",
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
