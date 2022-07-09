<template>
    <Head :title="`${name} | ganas`" />
    <section class="max-w-5xl mx-auto mt-10">
        <div class="text-center">
            <h1
                class="
                    text-5xl
                    font-extrabold
                    tracking-tight
                    text-center
                    underline
                    capitalize
                    decoration-emerald-400
                "
            >
                {{ name }}
            </h1>
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
import Pagination from "../../Shared/Pagination.vue";
export default {
    components: {
        Pagination,
    },
    props: {
        posts: Object,
        name: String,
    },
    methods: {
        category(value) {
            console.log(value);
        },
    },
};
</script>
