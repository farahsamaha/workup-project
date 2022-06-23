import { InertiaProgress } from '@inertiajs/progress'
import Vue from 'vue'
import { InertiaApp, plugin } from '@inertiajs/inertia-vue'
import vuetify from '@/plugins/vuetify'
import Default from '@/Layouts/Default'
// import { ValidationProvider } from 'vee-validate'

require('./bootstrap')

InertiaProgress.init({ color: '#4B5563' });
Vue.use(plugin)

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



// import Vue from 'vue'
// import vuetify from '@/plugins/vuetify'
// import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue'
// import { InertiaProgress } from '@inertiajs/progress'

// Vue.config.productionTip = false
// Vue.component('Head', Head)
// Vue.component('Link', Link)

// Vue.mixin({
//   methods: {
//     route: window.route
//   }
// })

// InertiaProgress.init()

// createInertiaApp({
//   resolve: name => import('./pages/' + name),
//   setup ({ el, App, props, plugin }) {
//     Vue.use(plugin)

//     new Vue({
//       vuetify,
//       render: h => h(App, props)
//     }).$mount(el)
//   }
// })


