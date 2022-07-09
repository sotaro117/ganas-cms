import { createSSRApp, h } from "vue";
import { renderToString } from "@vue/server-renderer";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import createServer from "@inertiajs/server";

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        resolve: async (name) => {
            let page = (await import(`./Pages/${name}`)).default;
            if (page.layout === undefined) {
                page.layout = Layout;
            }

            return page;
        },
        setup({ app, props, plugin }) {
            return createSSRApp({
                render: () => h(app, props),
            })
                .use(plugin)
                .use(VueSocialSharing)
                .use(VueAgile)
                .component("Link", Link)
                .component("Head", Head)
                .component("font-awesome-icon", FontAwesomeIcon)
                .mount(el);
        },
    })
);
