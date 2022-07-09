<template>
    <div class="relative">
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
            Events
        </h1>
        <ul
            class="
                mt-10
                pb-8
                px-[30vw]
                w-full
                flex
                gap-8
                snap-x
                overflow-x-auto
                self-center
            "
        >
            <li
                class="snap-center"
                v-for="event in events.data"
                :key="event.id"
            >
                <div
                    class="
                        relative
                        flex-shrink-0
                        max-w-[95vw]
                        overflow-hidden
                        rounded-xl
                    "
                >
                    <img
                        :src="'../../../storage/events/' + event.thumbnail"
                        alt=""
                        class="
                            absolute
                            inset-0
                            object-cover object-bottom
                            w-full
                            h-full
                        "
                    />
                    <div
                        class="
                            absolute
                            inset-0
                            w-full
                            h-full
                            bg-gradient-to-br
                            from-black/75
                        "
                    ></div>

                    <div
                        class="
                            relative
                            h-96
                            w-[768px]
                            p-12
                            flex flex-col
                            justify-between
                            items-start
                        "
                    >
                        <div>
                            <p class="font-medium text-stone-50">
                                締切: {{ event.deadline }}
                            </p>
                            <h2
                                class="
                                    w-2/3
                                    mt-3
                                    text-3xl
                                    font-semibold
                                    tracking-tight
                                    text-white
                                "
                            >
                                {{ event.title }}
                            </h2>
                        </div>

                        <Link
                            :href="`/events/${event.slug}`"
                            class="
                                px-4
                                py-3
                                text-sm
                                font-medium
                                bg-white
                                rounded-lg
                                text-slate-900
                                transition
                                hover:delay-75
                                hover:bg-black
                                hover:text-white
                            "
                        >
                            詳細</Link
                        >
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: { events: Object },
};
</script>
