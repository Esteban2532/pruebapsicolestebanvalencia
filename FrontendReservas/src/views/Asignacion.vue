<template>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-4 mt-5">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <h3>Datos Personales</h3>
          </div>
          <div class="card-body">
            <h5 class="card-title">
              <strong>Nombre: </strong><br />
              {{ usuario.name }} {{ usuario.last_name }}
            </h5>
            <p class="card-text">
              <strong>Correo eléctronico: </strong> {{ usuario.email }}
            </p>
            <p class="card-text">
              <strong>Teléfono:</strong> {{ usuario.phone }}
            </p>
            <p class="card-text">
              <Strong> Dirección: </Strong>{{ usuario.address }}
            </p>
          </div>
        </div>
        <div class="card mt-5">
          <div class="card-header bg-info text-white">
            <h3>Comprar Boleta</h3>
          </div>
          <div class="card-body">
            <form @submit.prevent="guardaAsignacion()">
              <input
                type="text"
                v-model="asignacion.codigoU"
                class="form-control"
                hidden
              />
              <input
                type="text"
                v-model="asignacion.codigoT"
                class="form-control"
                hidden
              />
              <div class="form-group">
                <label for="cantidad" class="float-left">Cantidad</label>
                <input
                  id="cantidad"
                  class="form-control"
                  type="number"
                  v-model="asignacion.cantidad"
                />
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-info d-block">
                  PAGAR
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-8 mt-5">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-12">
              <img v-bind:src="ticket.photo" alt="" class="w-100" />
            </div>
            <div class="col-md-12">
              <div class="card-body">
                <h5 class="card-title">{{ ticket.title }}</h5>
                <p class="card-text">
                  {{ ticket.description }}
                </p>
                <p class="card-text">
                  <strong class="text-muted"
                    >Precio Bolet:a {{ ticket.price }}</strong
                  >
                </p>
                <p class="card-text">
                  <strong class="text-muted"
                    >Duración:{{ ticket.duration }}</strong
                  >
                </p>
                <p class="card-text">
                  <strong class="text-muted">Lugar: {{ ticket.place }}</strong>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
import router from "../router";
import Swal from 'sweetalert2'


export default {
  data() {
    return {
      usuario: {},
      ticket: {},
      asignacion: {
        codigoU: 0,
        codigoT: 0,
        cantidad: 1,
      },
    };
  },
  computed: {
    ...mapState(["token", "usuarioDB"]),
  },
  created() {
    this.listarInformacion();
  },
  methods: {
    listarInformacion() {
      let config = {
        headers: {
          Authorization: "Bearer " + this.token,
        },
      };

      console.log(config);
      const { id } = this.$route.params;
      const idUsuario = this.usuarioDB.sub;

      this.axios
        .get(`/user/${idUsuario}`, config)
        .then((res) => {
          this.usuario = res.data.usuario;
          this.asignacion.codigoU = this.usuario.id;
        })
        .catch((e) => console.log(e.response));

      this.axios
        .get(`/tickets/${id}`, config)
        .then((res) => {
          this.ticket = res.data.ticket;
          this.asignacion.codigoT = this.ticket.id;
        })
        .catch((e) => console.log(e.response));
    },

    guardaAsignacion() {
      let config = {
        headers: {
          Authorization: "Bearer " + this.token,
        },
      };

      if (this.asignacion.cantidad > 0) {
        this.axios
          .post("/compra", this.asignacion, config)
          .then((res) => {

            Swal.fire({
              position: "top-botton",
              icon: "success",
              title: res.data.mensaje,
              showConfirmButton: false,
              timer: 2000,
            });
            router.push({ name: "home" });
          })
          .catch((e) => {
            console.log(e.response);
          });
      } else {
        Swal.fire({
              position: "top-botton",
              icon: "error",
              title: "La cantidad ingresada no es valida",
              showConfirmButton: false,
              timer: 2000,
        });
      }
    },
  },
};
</script>