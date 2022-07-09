<template>
    <Link class="text-black hover:font-bold" :class="{ 'font-bold ': active }">
        <slot></slot>
    </Link>
</template>

<script>
export default {
    props: { active: Boolean },
};
</script>
