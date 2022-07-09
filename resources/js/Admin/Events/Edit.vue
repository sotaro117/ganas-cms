<template>
    <Head title="Edit Event" />

    <h1 class="text-3xl">Edit Event</h1>

    <form @submit.prevent="update" class="max-w-5xl mx-auto mt-8">
        <div class="max-w-2xl mx-auto shadow-md p-10 bg-white">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="title"
                >
                    Title
                </label>

                <input
                    v-model="form.title"
                    class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="title"
                    id="title"
                    :placeholder="`${event.title}`"
                    required
                />
                <div
                    v-if="form.errors.title"
                    v-text="form.errors.title"
                    class="text-red-500 text-xs mt-1"
                ></div>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="deadline"
                >
                    deadline
                </label>
                <input
                    v-model="form.deadline"
                    class="border border-gray-400 p-2 w-full"
                    type="date"
                    name="deadline"
                    id="deadline"
                    required
                />

                <div
                    v-if="form.errors.deadline"
                    v-text="form.errors.deadline"
                    class="text-red-500 text-xs mt-1"
                ></div>
            </div>

            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="slug"
                >
                    slug
                </label>
                <div class="flex items-center">
                    <p class="mr-2">localhost:8000/</p>
                    <input
                        v-model="form.slug"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="slug"
                        id="slug"
                        :placeholder="`${event.slug}`"
                        required
                    />
                </div>

                <div
                    v-if="form.errors.slug"
                    v-text="form.errors.slug"
                    class="text-red-500 text-xs mt-1"
                ></div>
            </div>
        </div>
        <div class="mt-8">
            <div class="mb-6">
                <label
                    for="body"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >body</label
                >
                <tiny-editor
                    name="body"
                    id="body"
                    v-model="form.body"
                    class="border border-gray-300"
                ></tiny-editor>

                <div
                    v-if="form.errors.body"
                    v-text="form.errors.body"
                    class="text-red-500 text-xs mt-1"
                ></div>
            </div>

            <div class="mb-6 flex">
                <button
                    type="submit"
                    class="
                        bg-blue-400
                        text-white
                        rounded
                        py-2
                        px-4
                        hover:bg-blue-500
                    "
                    :disabled="form.processing"
                >
                    Update event
                </button>
                <button
                    class="
                        bg-red-400
                        ml-4
                        py-2
                        px-4
                        rounded
                        hover:bg-red-500
                        text-white
                    "
                    @click="destroy"
                >
                    Delete event
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import TinyEditor from "../../Shared/TinyMce.vue";

export default {
    props: { event: Object },
    components: { TinyEditor },
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                deadline: "",
                slug: "",
                body: "",
            }),
        };
    },
    methods: {
        update() {
            this.form.put(`/admin/events/${this.event.id}`);
        },
        destroy() {
            this.form.delete(`/admin/events/${this.event.id}`);
        },
    },
};
</script>
