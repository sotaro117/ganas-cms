<template>
    <div>
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="(link, key) in links"
            :key="key"
            :href="link.url"
            v-html="link.label"
            class="px-2 py-2 border border-gray-100 rounded-sm mr-1"
            :class="{
                'text-gray-300': !link.url,
                'font-bold border-gray-500  bg-white shadow-md  ': link.active,
            }"
        />
    </div>
</template>

<script>
export default {
    props: {
        links: Array,
    },
};
</script>
