require('./bootstrap')

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import ElementPlus from 'element-plus'

const appName =
  window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'

const hasPermission = function (permission) {
  return this.$page.props.user.permissions.includes(permission)
}

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => require(`./Pages/${name}.vue`),
  setup({ el, app, props, plugin }) {
    return createApp({ render: () => h(app, props) })
      .use(plugin)
      .use(ElementPlus)
      .mixin({
        methods: {
          route,
          hasPermission
        }
      })
      .mount(el)
  }
})

InertiaProgress.init({ color: '#4B5563' })
