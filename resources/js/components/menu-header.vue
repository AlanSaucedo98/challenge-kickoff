<template>
  <div class="main">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="icon">
                <img src="https://kickoff.ar/img/logo.898137b2.svg" alt="">
                <h3>Challenge kickoff</h3>
            </div>
          <div class="btns">
              <a class="" href="#">Iniciar Sension</a>
              <a class="" href="#">Registrarse</a>
              <a href="/favoritos">Favoritos</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>


export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
<style>
.main {
  height: 10rem;
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

</style>