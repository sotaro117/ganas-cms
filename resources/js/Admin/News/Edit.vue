<template>
    <Head title="Edit News" />

    <h1 class="text-3xl">Edit News</h1>

    <form @submit.prevent="update" class="max-w-5xl mx-auto mt-8">
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
                    class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="title"
                    id="title"
                    :placeholder="`${news.title}`"
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
                        :placeholder="`${news.slug}`"
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
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="title"
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
                    Update news
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
                    Delete news
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import TinyEditor from "../../Shared/TinyMce.vue";

export default {
    props: { news: Object },
    components: { TinyEditor },
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                body: "",
            }),
        };
    },
    methods: {
        update() {
            this.form.put(`/admin/news/${this.news.id}`);
        },
        destroy() {
            this.form.delete(`/admin/news/${this.news.id}`);
        },
    },
};
</script>
