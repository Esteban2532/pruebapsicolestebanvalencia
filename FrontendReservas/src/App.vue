<template>
  <div id="app">
    <Navbar />
    <div style="min-height: 85vh">
      <router-view />
    </div>
    <Footer/>
  </div>
</template>

<script>
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";
import { mapActions, mapGetters } from "vuex";
export default {
  components: {
    Navbar,
    Footer,
  },
  methods: {
    ...mapActions(["cerrarSesion", "leerToken"]),
  },
  computed: {
    ...mapGetters(["estaActivo"]),
  },
  created() {
    this.leerToken();
  },
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
