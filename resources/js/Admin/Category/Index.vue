<template>
    <div>
        <Head title="Category" />
        <h1 class="mb-8 text-3xl font-bold">Category</h1>

        <div class="flex items-center justify-between mb-6">
            <Link
                class="
                    bg-blue-400
                    rounded-sm
                    px-3
                    py-2
                    text-white
                    hover:bg-blue-500
                "
                href="/admin/category/create"
            >
                <span>Create</span>
                <span class="hidden md:inline">&nbsp;Category</span>
            </Link>
        </div>

        <div class="bg-white rounded-sm shadow overflow-x-auto w-2/3 mx-auto">
            <div class="grid grid-cols-3">
                <ul class="" v-for="category in categories" :key="category.id">
                    <Link :href="`/admin/category/${category.id}/edit`"
                        ><li
                            class="
                                px-2
                                py-3
                                text-center
                                border
                                hover:bg-gray-200
                            "
                        >
                            {{ category.name }}
                        </li></Link
                    >
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import Icon from "../../Shared/Icon.vue";

export default {
    props: { categories: Object },
    components: { Icon },
};
</script>
