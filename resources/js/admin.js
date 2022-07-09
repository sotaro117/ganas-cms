import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "./Shared/AdminLayout.vue";
import { InertiaProgress } from "@inertiajs/progress";

createInertiaApp({
    resolve: async (name) => {
        let page = (await import(`./Admin/${name}`)).default;
        if (page.layout === undefined) {
            page.layout = AdminLayout;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el);
    },
});

InertiaProgress.init({
    color: "green",
    showSpinner: true,
});
