import Vue from 'vue'
import Vuex from 'vuex'

import router from './router'

// para decodificar el jwt
import decode from 'jwt-decode'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        token: '',
        usuarioDB: '',
        usuario: {}
    },
    mutations: {
        obtenerUsuario(state, payload) {
            state.token = payload
            if (payload === '') {
                state.usuarioDB = ''

            } else {
                state.usuarioDB = decode(payload);
                router.push({ name: 'home' })
            }
        },
        guardarUsuario(state, payload) {
            state.usuario = payload
        },
        borrarUsuario(state, payload) {
            state.usuario = payload
        }

    },
    actions: {
        guardarUsuario({ commit }, payload) {
            localStorage.setItem('token', payload);
            commit('obtenerUsuario', payload)
        },

        guardarCredenciales({ commit }, payload) {
            localStorage.setItem('usuario', JSON.stringify(payload));
            commit('guardarUsuario', payload);
        },

        cerrarSesion({ commit }) {
            commit('obtenerUsuario', '');
            commit('borrarUsuario', '');
            localStorage.removeItem('token');
            localStorage.removeItem('usuario');
            router.push({ name: 'login' });
        },
        leerToken({ commit }) {
            const token = localStorage.getItem('token');
            const usuario = JSON.parse(localStorage.getItem('usuario'));
            if (token) {
                commit('obtenerUsuario', token);
                commit('guardarUsuario', usuario);

            } else {
                commit('obtenerUsuario', '');
                commit('borrarUsuario', '');
            }
        }

    },
    getters: {
        estaActivo: state => !!state.token
    }
})