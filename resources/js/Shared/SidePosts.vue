<template>
    <div>
        <div class="space-y-3">
            <div>
                <img
                    src="https://dummyimage.com/300/000/fff"
                    class="md:ml-auto mx-auto"
                    alt=""
                />
            </div>
            <div>
                <img
                    src="https://dummyimage.com/300/000/fff"
                    class="md:ml-auto mx-auto"
                    alt=""
                />
            </div>
            <div>
                <img
                    src="https://dummyimage.com/300/000/fff"
                    class="md:ml-auto mx-auto"
                    alt=""
                />
            </div>
            <div>
                <img
                    src="https://dummyimage.com/300/000/fff"
                    class="md:ml-auto mx-auto"
                    alt=""
                />
            </div>
        </div>

        <ul class="mt-10 justify-end">
            <div
                class="
                    font-bold
                    text-3xl text-center
                    mb-3
                    underline
                    decoration-green-400
                "
            >
                Access Rank
            </div>
            <li v-for="(readPost, i) in readPosts" :key="i">
                <Link :href="`/posts/${readPost.slug}`">
                    <div
                        class="
                            bg-gray-100
                            py-2
                            px-3
                            mb-3
                            border border-gray-200
                            shadow-sm
                        "
                    >
                        <span
                            v-text="i + 1"
                            class="mr-4 text-3xl text-green-400"
                        ></span>
                        <h3 class="font-semibold">
                            {{ readPost.title }}
                        </h3>
                    </div>
                </Link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: { readPosts: Object },
};
</script>
