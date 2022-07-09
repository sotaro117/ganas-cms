<template>
    <div class="">
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
            Press Release
        </h1>
        <div class="mt-8">
            <ul class="md:grid grid-cols-3 gap-3">
                <li
                    class="
                        bg-gray-100
                        border border-gray-200
                        rounded-md
                        text-center
                        px-4
                        py-2
                        mb-2
                    "
                    v-for="pressRelease in news.data"
                    :key="pressRelease.id"
                >
                    <div class="p-3">
                        {{ pressRelease.created_at }}
                    </div>
                    <div class="p-3">
                        <Link
                            class="hover:text-green-400 font-semibold text-md"
                            :href="`/news/${pressRelease.slug}`"
                            >{{ pressRelease.title }}</Link
                        >
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: { news: Object },
};
</script>
