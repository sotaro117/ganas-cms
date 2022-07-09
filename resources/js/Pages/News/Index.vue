<template>
    <Head title="プレスリリース一覧 | ganas" />
    <section class="max-w-4xl mx-auto mt-10">
        <div class="text-center mb-5">
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
                >News</span
            >
        </div>
        <ul
            v-for="pressRelease in news.data"
            :key="pressRelease.id"
            class="text-center mt-8"
        >
            <li class="mt-5 bg-gray-100 py-8 px-4 rounded-lg">
                <div>
                    {{ pressRelease.created_at }}
                </div>
                <div class="mt-5">
                    <Link :href="`/news/${pressRelease.slug}`"
                        ><span class="text-lg font-semibold">{{
                            pressRelease.title
                        }}</span></Link
                    >
                </div>
            </li>
        </ul>
        <div class="text-center">
            <Pagination :links="news.links" class="mt-6" />
        </div>
    </section>
</template>

<script>
import Pagination from "../../Shared/Pagination.vue";
export default {
    props: { news: Object },
    components: { Pagination },
};
</script>
