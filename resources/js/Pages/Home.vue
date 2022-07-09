<template>
    <Head title="途上国と国際協力に特化したNPOメディア | ganas" />
    <header class="mt-10">
        <Scroll :events="events" />
    </header>
    <main class="max-w-6xl mx-auto lg:mt-20 space-y-6">
        <FeaturedPosts
            :latestPosts="latestPosts"
            :previousPosts="previousPosts"
        />
    </main>
    <div class="md:flex mt-20">
        <section class="w-2/3 mx-auto">
            <AccessRank :readPosts="readPosts" />
        </section>
        <section class="space-y-3 mx-auto">
            <img class="mx-auto" src="https://dummyimage.com/300" alt="" />
            <img class="mx-auto" src="https://dummyimage.com/300" alt="" />
            <img class="mx-auto" src="https://dummyimage.com/300" alt="" />
            <img class="mx-auto" src="https://dummyimage.com/300" alt="" />
        </section>
    </div>
    <section class="max-w-6xl mx-auto mt-20">
        <News :news="news" />
    </section>

    <section
        v-if="!$page.props.auth.user"
        class="
            bg-white
            border border-black border-opacity-5
            rounded-xl
            text-center
            py-16
            px-10
            mt-16
            max-w-3xl
            mx-auto
            shadow-md
        "
    >
        <RegistrationForm />
    </section>
</template>

<script>
import FeaturedPosts from "../Shared/FeaturedPosts.vue";
import Scroll from "../Shared/Scroll.vue";
import RegistrationForm from "../Shared/RegistrationForm.vue";
import AccessRank from "../Shared/AccessRank.vue";
import News from "../Shared/News.vue";
export default {
    components: {
        FeaturedPosts,
        Scroll,
        RegistrationForm,
        AccessRank,
        News,
    },
    props: {
        latestPosts: Object,
        previousPosts: Object,
        readPosts: Object,
        events: Object,
        news: Object,
    },
};
</script>
