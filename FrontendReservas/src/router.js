import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

import store from './store'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [{
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/asignacion/:id',
            name: 'asignacion',
            component: () =>
                import ( /* webpackChunkName: "about" */ './views/Asignacion.vue'),
            meta: { requireAuth: true }
        },
        {
            path: '/login',
            name: 'login',
            component: () =>
                import ( /* webpackChunkName: "about" */ './views/Login.vue')
        },
        {
            path: '/registro',
            name: 'registro',
            component: () =>
                import ( /* webpackChunkName: "about" */ './views/Registro.vue')
        }
    ]
})

router.beforeEach((to, from, next) => {

    const rutaProtegida = to.matched.some(record => record.meta.requireAuth)
    if (rutaProtegida && store.state.token === '') {
        next({ name: 'login' });
    } else {
        next();
    }


});


export default router;