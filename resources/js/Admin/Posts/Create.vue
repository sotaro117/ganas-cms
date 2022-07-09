<template>
    <Head title="Create Post" />

    <h1 class="text-3xl">Create New Post</h1>

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
                    class="border border-gray-300 shadow-sm p-2 w-full"
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
                    excerpt
                </label>

                <textarea
                    v-model="form.excerpt"
                    class="border border-gray-400 p-2 w-full"
                    name="excerpt"
                    id="excerpt"
                    cols="50"
                    rows="10"
                    required
                ></textarea>

                <div
                    v-if="form.errors.excerpt"
                    v-text="form.errors.excerpt"
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

            <div class="mt-6 flex">
                <div>
                    <label
                        class="
                            block
                            mb-2
                            uppercase
                            font-bold
                            text-xs text-gray-700
                        "
                        for="user"
                    >
                        user
                    </label>
                    <select
                        class="
                            border border-gray-300
                            py-2
                            pl-3
                            pr-9
                            text-sm
                            font-semibold
                            rounded-sm
                            shadow-sm
                            mb-5
                            mr-5
                        "
                        v-model="form.user_id"
                    >
                        <option :value="null" disabled selected>Users</option>
                        <option
                            v-for="user in users"
                            :key="user.id"
                            :value="`${user.id}`"
                        >
                            {{ user.last_name + " " + user.first_name }}
                        </option>
                    </select>
                </div>
                <div class="grid grid-cols-3 gap-2 ml-3">
                    <div
                        class="
                            block
                            mb-2
                            uppercase
                            font-bold
                            text-xs text-gray-700
                        "
                    >
                        Category
                    </div>
                    <div
                        class="flex items-center"
                        v-for="category in categories"
                        :key="category.id"
                    >
                        <input
                            class="
                                w-4
                                h-4
                                text-blue-600
                                bg-gray-100
                                rounded
                                border-gray-300
                                focus:ring-blue-500
                            "
                            type="checkbox"
                            v-model="form.categories_id"
                            :value="`${category.id}`"
                        />

                        <label
                            class="ml-2 text-sm font-medium text-gray-900"
                            for="category_id"
                        >
                            {{ category.name }}
                        </label>
                    </div>
                </div>
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
                    body
                </label>
                <tiny-editor
                    name="body"
                    id="body"
                    v-model="form.body"
                    class="border border-gray-300"
                ></tiny-editor>
                <!-- <button @click="save(form.body)">save</button> -->

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
                    Create post
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import TinyEditor from "../../Shared/TinyMce.vue";
export default {
    props: { categories: Object, users: Object },
    components: { TinyEditor },
    data() {
        return {
            form: this.$inertia.form({
                title: "",
                excerpt: "",
                slug: "",
                body: "",
                thumbnail: null,
                categories_id: [],
                user_id: this.users.id,
            }),
        };
    },
    methods: {
        store() {
            this.form.post("/admin/posts");
        },

        // save(content) {
        //     tinymce.activeEditor.setProgressState(true);
        //     tinymce.activeEditor.setProgressState(false, 3000);
        //     setTimeout(() => {
        //         tinymce.activeEditor.setContent(content);
        //     }, 2000);
        // },
    },
};
</script>
