<template>
    <Head title="イベント一覧 | ganas" />
    <section class="max-w-6xl mx-auto mt-10">
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
                >Events</span
            >
        </div>
        <div class="grid md:grid-cols-3 gap-7 mt-10">
            <div
                class="
                    bg-gray-200
                    transition
                    hover:duration-300
                    hover:scale-105
                    hover:opacity-80
                    overflow-hidden
                    rounded-md
                "
                v-for="event in events.data"
                :key="event.id"
            >
                <Link :href="`/events/${event.slug}`">
                    <img
                        :src="'../../../storage/events/' + event.thumbnail"
                        alt=""
                        class="w-full h-48"
                    />

                    <div class="py-10 px-4 text-center">
                        <div>{{ event.title }}</div>
                        <div>{{ event.deadline }}</div>
                    </div>
                </Link>
            </div>
        </div>
        <div class="text-center">
            <Pagination :links="events.links" class="mt-6" />
        </div>
    </section>
</template>

<script>
import Pagination from "../../Shared/Pagination.vue";
export default {
    props: { events: Object },
    components: { Pagination },
};
</script>
