<template>
    <Head :title="`${post.title} | ganas`" />
    <article class="max-w-full mr-auto flex flex-col">
        <div class="bg-white md:grid grid-cols-2 gap-6 h-min overflow-hidden">
            <img
                id="thumbnail"
                :src="'../../../storage/thumbnails/' + post.thumbnail"
                alt=""
                class="w-full h-full"
            />

            <div class="px-2 py-5">
                <div class="hidden lg:flex justify-between mb-6">
                    <div class="flex">
                        <ul
                            class="mr-2"
                            v-for="category in post.categories"
                            :key="category.id"
                        >
                            <li class="py-1 px-2 rounded-md text-gray-600">
                                {{ category.name }}
                            </li>
                        </ul>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ post.title }}
                </h1>
                <div class="flex justify-between">
                    <ul class="flex mb-3">
                        <li>
                            <ShareNetwork
                                network="facebook"
                                :url="`https://localhost:8000/posts/${post.id}`"
                                :title="`${post.title}`"
                            >
                                <div class="mr-2">
                                    <font-awesome-icon
                                        icon="fa-brands fa-facebook-square "
                                        class="
                                            text-3xl
                                            transition
                                            hover:delay-75
                                            hover:text-blue-600
                                        "
                                    />
                                </div>
                            </ShareNetwork>
                        </li>
                        <li>
                            <ShareNetwork
                                network="twitter"
                                :url="`https://localhost:8000/posts/${post.id}`"
                                :title="`${post.title}`"
                            >
                                <div>
                                    <font-awesome-icon
                                        icon="fa-brands fa-twitter-square "
                                        class="
                                            text-3xl
                                            transition
                                            hover:delay-75
                                            hover:text-blue-400
                                        "
                                    />
                                </div>
                            </ShareNetwork>
                        </li>
                    </ul>
                    <p class="block text-gray-600 text-md">
                        Published
                        <time>{{ post.created_at }}</time>
                    </p>
                </div>
                <div class="flex items-center lg:justify-start text-sm mt-4">
                    <img
                        :src="'../../../storage/avatars/' + post.user.avatar"
                        id="avatar"
                        alt="Lary avatar"
                        class="rounded-full"
                    />
                    <div class="ml-3 text-left">
                        {{ post.user.last_name + " " + post.user.first_name }}
                    </div>
                </div>
                <div class="mt-3">
                    {{ post.user.description }}
                </div>
            </div>
        </div>
        <div class="md:flex mx-auto max-w-6xl mt-14 text-center md:text-left">
            <div
                class="space-y-5 lg:text-lg leading-loose max-w-4xl px-5 mr-10"
                v-html="post.body"
            ></div>
            <div class="w-full mx-auto">
                <SidePosts :readPosts="readPosts" />
            </div>
        </div>
    </article>
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
                >関連記事</span
            >
        </div>
        <div class="grid md:grid-cols-2 md:gap-8 mt-10 p-6 mx-auto">
            <div
                class="transition overflow-hidden flex"
                v-for="(relatedPost, i) in related"
                :key="i"
            >
                <Link :href="`/posts/${relatedPost.slug}`">
                    <img
                        id="thumbnail"
                        :src="
                            '../../../storage/thumbnails/' +
                            relatedPost.thumbnail
                        "
                        :alt="relatedPost.slug"
                        class="w-full h-25"
                    />
                </Link>

                <div class="py-2 px-4">
                    <div class="flex">
                        <ul
                            v-for="category in relatedPost.categories"
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
                    <Link :href="`/posts/${relatedPost.slug}`">
                        <div
                            class="
                                md:text-md
                                font-semibold
                                hover:underline
                                decoration-green-400
                            "
                        >
                            {{ relatedPost.title }}
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-black max-w-full mt-10 relative p-10">
        <div class="text-center">
            <span
                class="
                    text-white text-5xl
                    font-extrabold
                    tracking-tight
                    text-center
                    underline
                    capitalize
                    decoration-emerald-400
                "
                >新着記事</span
            >
        </div>
        <agile
            :options="carouselOption"
            class="text-left mt-10 overflow-hidden"
            ref="carousel"
        >
            <div v-for="(latestPost, index) in latest" :key="index">
                <Link :href="`/posts/${latestPost.slug}`">
                    <img
                        :src="
                            '../../../storage/thumbnails/' +
                            latestPost.thumbnail
                        "
                        alt=""
                        id="sub"
                        class="
                            mx-auto
                            transition
                            hover:scale-110
                            hover:delay-75
                        "
                    />
                </Link>
                <ul class="flex text-sm mt-3 text-gray-300">
                    <li
                        v-for="(category, i) in latestPost.categories"
                        :key="i"
                        class="mr-2"
                    >
                        {{ category.name }}
                    </li>
                </ul>

                <h3 class="text-white">
                    <Link :href="`/posts/${latestPost.slug}`">{{
                        latestPost.title
                    }}</Link>
                </h3>
            </div>
        </agile>
        <button
            @click="$refs.carousel.goToNext()"
            class="absolute inset-y-0 right-0"
        >
            <Icon name="chevron-right" />
        </button>
        <button
            @click="$refs.carousel.goToPrev()"
            class="absolute inset-y-0 left-0"
        >
            <Icon name="chevron-left" />
        </button>
    </section>
</template>

<script>
import SidePosts from "../../Shared/SidePosts.vue";
import Icon from "../../Shared/Icon.vue";

export default {
    props: {
        post: Object,
        related: Object,
        latest: Object,
        readPosts: Object,
    },
    components: { SidePosts, Icon },

    data() {
        return {
            carouselOption: {
                navButtons: false,

                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            },
        };
    },
};
</script>

<style>
h1 {
    font-size: 3rem;
}
h2 {
    font-size: 2rem;
    font-weight: 600;
}
h3 {
    font-size: 1rem;
}
h4 {
    font-size: 0.75rem;
}
h5 {
    font-size: 0.5rem;
}
</style>
<style scoped>
#avatar {
    width: 50px;
    height: 50px;
}
#sub {
    width: 300px;
    height: 200px;
}
</style>
