<template>
  <div>
    <b-navbar toggleable="md" type="dark" variant="info">
      <b-navbar-brand class="text-dark" href="#"><strong> SISTEMA DE RESERVA DE BOLETAS</strong></b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav class="float-lg-right">
        <b-navbar-nav>
          <b-nav-item  class="text-dark" to="/">Home</b-nav-item>
          <b-nav-item  class="text-dark" to="/login" v-if="!estaActivo">Login</b-nav-item>
          <b-nav-item  class="text-dark" to="/registro" v-if="!estaActivo">Registro</b-nav-item>
        </b-navbar-nav>

        <b-navbar-nav class="ml-auto">
          <b-nav-item-dropdown right v-if="estaActivo">
            <template v-slot:button-content>
              <em>{{ leerUsuario }}</em>
            </template>
            <b-dropdown-item @click="cerrarSesion()"
              >Cerrar Sesión</b-dropdown-item            >
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
import { mapActions, mapGetters, mapState } from "vuex";
export default {

  data(){
    return{
       comprador: '',
    }
  },

  methods:{
    ...mapActions(['cerrarSesion', 'leerToken'])

  },
  computed:{
    ...mapState(["usuario", "usuarioDB"]),
    ...mapGetters(['estaActivo']),
    leerUsuario: function(){
      return `${this.usuario.name} ${this.usuario.last_name}`
    }
  },
  mounted() {
     this.leerToken();
  },




}
</script>