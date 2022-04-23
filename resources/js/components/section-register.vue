<template>
  <div class="container">
    <h1>Registrarse</h1>
    <form action="#" class="form">
      <div class="accsection">
        <div class="topwrap">
          <div>
            <input
              v-model="username"
              type="text"
              placeholder="Username"
              class="form-control"
              name="username"
            />
          </div>
          <div>
            <input
              v-model="email"
              type="text"
              placeholder="Email"
              class="form-control"
              name="email"
            />
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <input
                v-model="password"
                type="password"
                placeholder="password"
                class="form-control"
                name="password"
              />
            </div>
            <div class="col-lg-6 col-md-6">
              <input
                v-model="password_confirmation"
                type="password"
                placeholder="Confirm password"
                class="form-control"
                name="password_confirmation"
              />
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" @click.prevent="register">
        Registrarse
      </button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      username: "",
      email: "",
      password: "",
      password_confirmation: "",
    };
  },

  methods: {
    register() {
      if (this.password != this.password_confirmation) {
       alert("Las contraseñas no coinciden");
      }

      axios
        .post(`/register`, {
          name: this.username,
          email: this.email,
          password: this.password,
        })
        .then(() => {
          this.$cookie.set('Kickoff', this.email,1);
          return window.location.href = '/home';
        })
        .catch(function (error) {
          console.log(error.message);
        });
    },
  },
};
</script>
<style>
.register {
  display: grid;
  text-align: center;
  background-color: grey;
}
</style>