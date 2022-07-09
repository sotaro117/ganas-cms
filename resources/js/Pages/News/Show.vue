<template>
    <Head :title="`${news.title} | ganas`" />
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6 flex">
        <article class="max-w-3xl mx-auto px-4">
            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <Link
                        @click="back"
                        class="
                            transition-colors
                            duration-300
                            relative
                            inline-flex
                            items-center
                            text-lg
                            hover:text-green-500
                        "
                    >
                        <svg
                            width="22"
                            height="22"
                            viewBox="0 0 22 22"
                            class="mr-2"
                        >
                            <g fill="none" fill-rule="evenodd">
                                <path
                                    stroke="#000"
                                    stroke-opacity=".012"
                                    stroke-width=".5"
                                    d="M21 1v20.16H.84V1z"
                                ></path>
                                <path
                                    class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"
                                ></path>
                            </g>
                        </svg>

                        戻る
                    </Link>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-5">
                    {{ news.title }}
                </h1>

                <ul class="flex mb-2 mt-5 justify-between">
                    <div class="flex">
                        <li>
                            <ShareNetwork
                                network="facebook"
                                :url="`https://localhost:8000/news/${news.id}`"
                                :title="`${news.title}`"
                            >
                                <div class="mr-2">
                                    <font-awesome-icon
                                        icon="fa-brands fa-facebook-square "
                                        class="text-3xl"
                                    />
                                </div>
                            </ShareNetwork>
                        </li>
                        <li>
                            <ShareNetwork
                                network="twitter"
                                :url="`https://localhost:8000/news/${news.id}`"
                                :title="`${news.title}`"
                            >
                                <div>
                                    <font-awesome-icon
                                        icon="fa-brands fa-twitter-square "
                                        class="text-3xl"
                                    />
                                </div>
                            </ShareNetwork>
                        </li>
                    </div>
                    <p class="block text-gray-400 text-md">
                        Published
                        <time>{{ news.created_at }}</time>
                    </p>
                </ul>

                <div
                    class="space-y-4 lg:text-lg leading-loose mt-5"
                    v-html="news.body"
                ></div>
            </div>
            <section class="max-w-4xl mx-auto mt-10">
                <div class="text-center">
                    <span
                        class="
                            text-4xl
                            font-extrabold
                            tracking-tight
                            text-center
                            underline
                            capitalize
                            decoration-emerald-400
                            shadow-md
                            border border-gray-200
                            py-3
                            px-5
                        "
                        >Related News</span
                    >
                </div>
                <div class="grid md:grid-cols-2 md:gap-10 p-6 mx-auto">
                    <div
                        class="transition overflow-hidden flex"
                        v-for="(relatedNews, i) in related"
                        :key="i"
                    >
                        <div class="py-2 px-2">
                            <time class="py-1 mr-2 text-sm text-gray-600">
                                {{ relatedNews.created_at }}
                            </time>
                            <Link :href="`/news/${relatedNews.slug}`">
                                <div
                                    class="
                                        md:text-md
                                        font-semibold
                                        hover:underline
                                        decoration-green-400
                                    "
                                >
                                    {{ relatedNews.title }}
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </section>
        </article>
        <section class="max-w-2xl">
            <SidePosts :readPosts="readPosts" />
        </section>
    </main>
</template>

<script>
import SidePosts from "../../Shared/SidePosts.vue";

export default {
    props: { news: Object, related: Object, readPosts: Object },
    components: { SidePosts },
    methods: {
        back() {
            window.history.back();
        },
    },
};
</script>
