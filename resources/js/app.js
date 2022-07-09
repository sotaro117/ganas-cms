import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/inertia-vue3";
import Layout from "./Shared/Layout.vue";
import { InertiaProgress } from "@inertiajs/progress";
import VueSocialSharing from "vue-social-sharing";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faHatWizard } from "@fortawesome/free-solid-svg-icons";
import { faFacebookSquare } from "@fortawesome/free-brands-svg-icons/faFacebookSquare";
import { faTwitterSquare } from "@fortawesome/free-brands-svg-icons/faTwitterSquare";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import VueAgile from "vue-agile";

library.add(faHatWizard, faFacebookSquare, faTwitterSquare);

createInertiaApp({
    resolve: async (name) => {
        let page = (await import(`./Pages/${name}`)).default;
        if (page.layout === undefined) {
            page.layout = Layout;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VueSocialSharing)
            .use(VueAgile)
            .component("Link", Link)
            .component("Head", Head)
            .component("font-awesome-icon", FontAwesomeIcon)
            .mount(el);
    },
});

InertiaProgress.init({
    color: "green",
    showSpinner: true,
});
