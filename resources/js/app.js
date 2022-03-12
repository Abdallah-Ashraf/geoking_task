require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import  VueGoogleMaps from '@fawmi/vue-google-maps'
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';


// Import Bootstrap an BootstrapVue CSS files (order is important)
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueGoogleMaps, {
                load: {
                    key: 'AIzaSyDqaRfa1C3MYqadnPN9OAyAuZMQGRS00QM',
                },
            })
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });

