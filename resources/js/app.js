import { InertiaProgress } from '@inertiajs/progress'
import Vue from 'vue'
import { InertiaApp, plugin,Link , Head } from '@inertiajs/inertia-vue'
import vuetify from '@/plugins/vuetify'
import GuestLayout from '@/Layouts/GuestLayout'
// import VeeValidate from 'vee-validate';
import 'animate.css';
import * as VueAos from 'vue-aos'


require('./bootstrap')

InertiaProgress.init({ color: '#4B5563' });
// Vue.use(VeeValidate);
// Vue.component('ValidationProvider', ValidationProvider)
Vue.use(VueAos)
Vue.use(plugin)
Vue.component('InertiaLink', Link)
Vue.component('InertiaHead', Head)
const el = document.getElementById('app')


Vue.prototype.route = route
new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => {
                const page = require(`./Pages/${name}`).default
                page.layout = page.layout || GuestLayout
                return page
            },
        }
    }),
    vuetify
}).$mount(el)

