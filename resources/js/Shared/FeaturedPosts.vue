<template>
    <div>
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
                Articles
            </h1>
        </div>
        <article
            class="
                py-6
                px-5
                lg:flex
                duration-300
                hover:bg-gray-50
                border border-black border-opacity-0
                hover:border-opacity-5
                mt-8
                transition
                hover:scale-105
            "
        >
            <div class="flex-none lg:mr-8">
                <Link :href="`/posts/${latestPosts.slug}`">
                    <img
                        :src="
                            '../../../storage/thumbnails/' +
                            latestPosts.thumbnail
                        "
                        id="latest_thumbnail"
                        alt=""
                /></Link>
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <header class="mt-8 lg:mt-0">
                    <div class="flex">
                        <ul
                            v-for="category in latestPosts.categories"
                            :key="category.id"
                        >
                            <li
                                class="
                                    px-3
                                    py-1
                                    rounded-full
                                    text-xs text-gray-500
                                    uppercase
                                    font-semibold
                                    mr-2
                                "
                            >
                                <Link :href="`/categories/${category.name}`">{{
                                    category.name
                                }}</Link>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <Link
                            :href="`/posts/${latestPosts.slug}`"
                            class="text-3xl hover:text-green-500"
                            >{{ latestPosts.title }}</Link
                        >
                        <span class="mt-2 block text-gray-600 text-xs"
                            >Published
                            <time>{{ latestPosts.created_at }}</time></span
                        >
                        <Link :href="`/posts/${latestPosts.slug}`">
                            <p class="mt-8 text-lg">
                                {{ latestPosts.excerpt }}
                            </p></Link
                        >
                    </div>
                </header>
                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <img
                            id="avatar"
                            :src="
                                '../../../storage/avatars/' +
                                latestPosts.user.avatar
                            "
                            alt="Lary avatar"
                            class="rounded-full"
                        />

                        <div class="ml-3">
                            <h5 class="font-bold">
                                {{
                                    latestPosts.user.first_name +
                                    " " +
                                    latestPosts.user.last_name
                                }}
                            </h5>
                        </div>
                    </div>

                    <div>
                        <Link
                            :href="`/posts/${latestPosts.slug}`"
                            class="
                                transition-colors
                                duration-300
                                text-xs
                                font-semibold
                                bg-gray-200
                                hover:bg-gray-300
                                rounded-full
                                py-2
                                px-8
                                md:
                                inline-block
                            "
                        >
                            続きを読む
                        </Link>
                    </div>
                </footer>
            </div>
        </article>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-2">
        <article
            class="
                transition-colors
                duration-300
                bg-white
                border border-black border-opacity-0
                hover:border-opacity-5
                rounded-xl
                overflow-hidden
            "
            v-for="previousPost in previousPosts"
            :key="previousPost.id"
        >
            <div class="py-6 px-5">
                <div>
                    <img
                        :src="
                            '../../../storage/thumbnails/' +
                            previousPost.thumbnail
                        "
                        id="previous_thumbnail"
                        alt="Blog Post illustration"
                        class="rounded-xl mx-auto w-full"
                    />
                </div>

                <div class="mt-8 flex flex-col justify-between">
                    <header>
                        <div class="flex">
                            <ul
                                class="
                                    px-3
                                    py-1
                                    rounded-full
                                    text-gray-600 text-xs
                                    uppercase
                                    font-semibold
                                    mr-2
                                "
                                style="font-size: 10px"
                                v-for="category in previousPost.categories"
                                :key="category.id"
                            >
                                <li>
                                    <Link
                                        :href="`/categories/${category.name}`"
                                        >{{ category.name }}</Link
                                    >
                                </li>
                            </ul>
                        </div>

                        <div class="mt-4">
                            <Link
                                class="text-3xl hover:text-green-400"
                                :href="`/posts/${previousPost.slug}`"
                            >
                                {{ previousPost.title }}
                            </Link>

                            <span class="mt-2 block text-gray-600 text-xs">
                                Published
                                <time>{{ previousPost.created_at }}</time>
                            </span>
                        </div>
                    </header>

                    <div class="text-lg mt-4">
                        <p class="mt-4">
                            {{ previousPost.excerpt }}
                        </p>
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm">
                            <img
                                id="avatar"
                                :src="
                                    '../../../storage/avatars/' +
                                    previousPost.user.avatar
                                "
                                alt="Lary avatar"
                                class="rounded-full"
                            />

                            <div class="ml-3">
                                <h5 class="font-bold">
                                    {{
                                        previousPost.user.first_name +
                                        " " +
                                        previousPost.user.last_name
                                    }}
                                </h5>
                            </div>
                        </div>

                        <div>
                            <Link
                                :href="`/posts/${previousPost.slug}`"
                                class="
                                    transition-colors
                                    duration-300
                                    text-xs
                                    font-semibold
                                    bg-gray-200
                                    hover:bg-gray-300
                                    rounded-full
                                    py-2
                                    px-8
                                    md:
                                    inline-block
                                "
                            >
                                続きを読む
                            </Link>
                        </div>
                    </footer>
                </div>
            </div>
        </article>
    </div>
    <div class="text-center">
        <Link
            href="/posts"
            class="bg-gray-300 hover:bg-gray-200 px-5 py-2 text-lg"
        >
            記事一覧へ
        </Link>
    </div>
</template>

<script>
export default {
    components: {},
    props: {
        latestPosts: Object,
        previousPosts: Object,
    },
    methods: {
        check(value) {
            console.log(value);
        },
    },
};
</script>
<style scoped>
#avatar {
    width: 50px;
    height: 50px;
}
#previous_thumbnail {
    width: 500px;
    height: 300px;
}
#latest_thumbnail {
    width: 400px;
    height: 300px;
}
</style>
