<template>
  <div class="main">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
            <div class="icon">
                <img src="https://kickoff.ar/img/logo.898137b2.svg" alt="">
                <h3><a href="/home">Challenge kickoff </a> </h3>
            </div>
          <div class="btns">
              <div v-if="this.session == 0">
              <a href="/login">Iniciar Sesion</a>
              <a href="/register">Registrarse</a>
              </div>

              <div v-else>
              <a href="/favoritos">Favoritos</a>
              <a href="#" v-on:click=logOut()>Cerrar sesion</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from "axios";

export default {
  
  data(){
    return{
      session:0,
    }
  },
  created() {
    if (this.$cookie.get('Kickoff')) {
      this.session = 1;
    }
  },
  
    methods:{
      logOut(){
        this.$cookie.delete('Kickoff');
        axios.post('/logout')
        .then(() => location.href = '/home')
      }
      
    },
    mounted(){
    }
  
};
</script>
<style>
.main {
  height: 7rem;
}
.btns{
    text-align: right;
    height: 3rem;
}
.btns a{
    position: relative;
    top: 50%;
}
.icon img{
    position: absolute;
    height: 50px;
    width: 50px;
}
.icon h3{
    position: absolute;
    left: 3rem;
    top: 1rem;
}
a{
  text-decoration: none;
  color: black;
}
a:hover {
  color: black;
}

</style>