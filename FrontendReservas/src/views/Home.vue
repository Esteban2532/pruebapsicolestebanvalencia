<template>

    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4 mt-3" v-for="(ticket, index) in tickets" :key="index" >
          <div class="card" style="width: 18rem" >
            <img v-bind:src="ticket.photo" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title">{{ ticket.title }}</h5>
              <p class="card-text">
                  {{ ticket.description }}
              </p>
              <router-link :to="{ name: 'asignacion', params:  { id: ticket.id} }" >
                 <button type="button" class="btn btn-primary w-100" >Comprar</button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      tickets: [],
    };
  },

  created() {
    this.listarTickets();
  },

  methods: {
    listarTickets() {
      this.axios.get("/tickets").then((res) => {
        this.tickets = res.data;
        console.log(this.tickets);
      });
    },
    },

};
</script>
