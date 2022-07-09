<template>
    <div class="max">
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
                Access Ranking
            </h1>
        </div>

        <ul
            class="
                bg-white
                py-7
                px-8
                mb-4
                rounded-xl
                transition
                ease-in-out
                duration-200
                hover:-translate-y-2
                hover:shadow-md
                flex flex-col
                mt-10
                border border-gray-200
            "
            v-for="(readPost, index) in readPosts"
            :key="readPost.id"
        >
            <Link :href="`/posts/${readPost.slug}`">
                <li class="flex justify-center">
                    <div class="flex flex-col text-center py-2">
                        <h1 class="text-2xl mb-4">
                            <span class="text-3xl text-green-500">{{
                                index + 1
                            }}</span
                            >位
                        </h1>
                        <div>
                            <div class="flex justify-center">
                                <ul
                                    class="flex flex-wrap shrink mr-2"
                                    v-for="category in readPost.categories"
                                    :key="category.id"
                                >
                                    <li
                                        class="
                                            border border-green-400
                                            rounded-md
                                            px-2
                                            py-1
                                            text-sm text-gray-600
                                        "
                                    >
                                        <Link
                                            :href="`/categories/${category.name}`"
                                            >{{ category.name }}</Link
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-3 text-xl font-semibold">
                                <Link
                                    :href="`/posts/${readPost.slug}`"
                                    class="hover:text-green-500"
                                    >{{ readPost.title }}</Link
                                >
                                <div>{{ readPost.withScores }}</div>
                            </div>
                        </div>
                    </div>
                </li>
            </Link>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        readPosts: Object,
    },
};
</script>
