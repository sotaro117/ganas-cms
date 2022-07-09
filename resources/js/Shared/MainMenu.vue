<template>
    <div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/admin/dashboard">
                <icon
                    name="dashboard"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('admin/dashboard')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('admin/dashboard')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Dashboard
                </div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/admin/posts">
                <icon
                    name="posts"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('admin/posts')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('admin/posts')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Posts
                </div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/admin/users">
                <icon
                    name="users"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('admin/users')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('admin/users')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Users
                </div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/admin/events">
                <icon
                    name="events"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('admin/events')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('admin/events')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Events
                </div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/admin/news">
                <icon
                    name="news"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('admin/news')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('admin/news')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    News
                </div>
            </Link>
        </div>
        <div class="mb-4">
            <Link class="group flex items-center py-3" href="/admin/category">
                <icon
                    name="category"
                    class="mr-2 w-4 h-4"
                    :class="
                        isUrl('admin/category')
                            ? 'fill-white'
                            : 'fill-indigo-400 group-hover:fill-white'
                    "
                />
                <div
                    :class="
                        isUrl('admin/category')
                            ? 'text-white'
                            : 'text-indigo-300 group-hover:text-white'
                    "
                >
                    Category
                </div>
            </Link>
        </div>
    </div>
</template>

<script>
import Icon from "./Icon.vue";

export default {
    components: {
        Icon,
    },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1);
            if (urls[0] === "") {
                return currentUrl === "";
            }
            return urls.filter((url) => currentUrl.startsWith(url)).length;
        },
    },
};
</script>
