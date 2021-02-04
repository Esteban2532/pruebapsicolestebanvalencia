<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="div col-sm-8">
        <div class="card mt-5">
          <div class="card-header bg-info">
            <h1>Registro de compradores</h1>
          </div>
          <div class="card-body">
            <form @submit.prevent="guardarRegistro()">
              <div class="form-group">
                <small for="name" class="float-left">Nombres</small>
                <input
                  id="name"
                  class="form-control"
                  type="text"
                  name="name"
                  required
                  v-model="registro.name"
                />
              </div>
              <div class="form-group">
                <small for="last_name" class="float-left">Apellidos</small>
                <input
                  id="last_name"
                  class="form-control"
                  type="text"
                  name="last_name"
                  required
                  v-model="registro.last_name"
                />
              </div>
              <div class="form-group">
                <small for="email" class="float-left">Correo Eléctronico</small>
                <input
                  id="email"
                  class="form-control"
                  type="email"
                  name="email"
                  required
                  v-model="registro.email"
                />
              </div>
              <div class="form-group">
                <small for="phone" class="float-left">Teléfono</small>
                <input
                  id="phone"
                  class="form-control"
                  type="text"
                  name="phone"
                  required
                  v-model="registro.phone"
                />
              </div>
              <div class="form-group">
                <small for="address" class="float-left">Dirección</small>
                <input
                  id="address"
                  class="form-control"
                  type="text"
                  name="address"
                  required
                  v-model="registro.address"
                />
              </div>
              <div class="form-group">
                <small for="password" class="float-left">Password</small>
                <input
                  id="password"
                  class="form-control"
                  type="password"
                  name="password"
                  required
                  v-model="registro.password"
                />
              </div>
              <div class="form-group">
                <small for="passwordc" class="float-left"
                  >Confirmacion Password</small
                >
                <input
                  id="passwordc"
                  class="form-control"
                  type="password"
                  name="passwordc"
                  required
                  v-model="confirmacion"
                />
              </div>

              <div class="form-group">
                <button class="btn btn-info d-block w-100" type="submit">
                  Guardar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState, mapActions } from "vuex";
import Swal from "sweetalert2";

export default {
  data() {
    return {
      registro: {
        name: "",
        last_name: "",
        email: "",
        phone: "",
        address: "",
        password: "",
      },
      confirmacion: "",
    };
  },

  computed: {
    ...mapState(["token", "usuarioDB"]),
  },

  methods: {
    ...mapActions(["guardarUsuario", "guardarCredenciales"]),
    guardarRegistro() {
      if (
        this.registro.password === this.confirmacion &&
        this.confirmacion !== ""
      ) {
        this.axios
          .post("/register", this.registro)
          .then((res) => {
            console.log(res.data.mensaje);
            const token = res.data.token;
            const user = res.data.user;
            this.guardarCredenciales(user);
            Swal.fire({
              position: "top-botton",
              icon: "success",
              title: "Usuario guardado con exito",
              showConfirmButton: false,
              timer: 2000,
            });
            this.guardarUsuario(token);
          })
          .catch((e) => {
            Swal.fire({
              position: "top-botton",
              icon: "error",
              title: e.response.data,
              showConfirmButton: false,
              timer: 2000,
            });
          });
      } else {
        Swal.fire({
          position: "top-botton",
          icon: "error",
          title: `Las verificación de la contraseña no es valida`,
          showConfirmButton: false,
          timer: 2000,
        });
      }
    },
  },
};
</script>