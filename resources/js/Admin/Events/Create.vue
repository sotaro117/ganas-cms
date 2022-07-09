<template>
    <Head title="Create Event" />

    <h1 class="text-3xl">Create New Event</h1>

    <form @submit.prevent="store" class="max-w-5xl mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white shadow-md p-10">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="title"
                >
                    Title
                </label>

                <input
                    v-model="form.title"
                    class="border border-gray-300 p-2 w-full"
                    type="text"
                    name="title"
                    id="title"
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
                    for="excerpt"
                >
                    deadline
                </label>
                <input
                    v-model="form.deadline"
                    class="border border-gray-300 p-2 w-full"
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
                        required
                    />
                </div>

                <div
                    v-if="form.errors.slug"
                    v-text="form.errors.slug"
                    class="text-red-500 text-xs mt-1"
                ></div>
            </div>

            <div class="mb-6">
                <label
                    for="thumbnail"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                >
                    image
                </label>
                <input
                    id="thumbnail"
                    name="thumbnail"
                    type="file"
                    @input="form.thumbnail = $event.target.files[0]"
                />
                <progress
                    v-if="form.progress"
                    :value="form.progress.percentage"
                    max="100"
                >
                    {{ form.progress.percentage }}%
                </progress>
            </div>
        </div>
        <div class="mt-8">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="body"
                >
                    Body
                </label>
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

            <div class="mb-6">
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
                    Create event
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import TinyEditor from "../../Shared/TinyMce.vue";
export default {
    components: { TinyEditor },
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                deadline: "",
                slug: "",
                thumbnail: null,
                body: "",
            }),
        };
    },
    methods: {
        store() {
            this.form.post("/admin/events");
        },
    },
};
</script>
