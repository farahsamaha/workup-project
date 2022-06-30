import { InertiaProgress } from '@inertiajs/progress'
import Vue from 'vue'
import { InertiaApp, plugin,Link , Head } from '@inertiajs/inertia-vue'
import vuetify from '@/plugins/vuetify'
import Default from '@/layouts/Default'
// import { ValidationProvider } from 'vee-validate'

require('./bootstrap')

InertiaProgress.init({ color: '#4B5563' });
Vue.use(plugin)
Vue.component('InertiaLink', Link)
Vue.component('InertiaHead', Head)
const el = document.getElementById('app')

// Vue.component('ValidationProvider', ValidationProvider)
Vue.prototype.route = route
new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => {
                const page = require(`./Pages/${name}`).default
                page.layout = page.layout || Default
                return page
            },
        }
    }),
    vuetify
}).$mount(el)

