<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <div class="card mt-5">
          <div class="card-header bg-info text-white">
            <h1>Login</h1>
          </div>
          <div class="card-body">
            <form @submit.prevent="login">
              <input
                type="email"
                placeholder="Email"
                class="form-control my-2"
                v-model="usuario.email"
              />
              <input
                type="password"
                placeholder="Contraseña"
                class="form-control my-2"
                v-model="usuario.password"
              />
              <b-button class="btn-block bnt btn-success" type="submit"
                >Acceder</b-button
              >
            </form>
          </div>
        </div>
      </div>
      <div v-if="mensaje != ''" class="col-sm-8 bg-danger text-white mt-5 p-2">
        <strong>{{ mensaje }}</strong>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      usuario: { email: "", password: "" },
      mensaje: "",
    };
  },
  methods: {
    ...mapActions(["guardarUsuario", "guardarCredenciales"]),
    login() {
      this.axios
        .post("/login", this.usuario)
        .then((res) => {
          const token = res.data.token;
          const user = res.data.user[0];
          this.guardarCredenciales(user);
          this.guardarUsuario(token);
        })
        .catch((e) => {
          this.mensaje = e.response.data.error;
        });
    },
  },
};
</script>