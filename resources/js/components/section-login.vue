<template>
  <div class="container">
    <h1>Iniciar Sesion</h1>
    <form action="#" class="form">
        <div class="accsection">
            <div class="topwrap">
                    <div>
                       <input v-model="email" type="text" placeholder="Email" class="form-control"  name="email">
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                             <input v-model="password" type="password" placeholder="password" class="form-control"  name="password">
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>  
        </div>
       <button type="submit" class="btn btn-primary" @click.prevent="login">Iniciar Sesion</button>
    </form>
  </div>
</template>

<script>
import axios from "axios";

 export default {

        data () {
            return {
                email: '',
                password: '',
            }
        },
        methods: {
             login () {
                try {
                  axios.post(`/login`, {
                    email: this.email,
                    password:this.password
                  });
                } catch (e) {
                  return console.log(e);
                }
            },
        }       
    }
</script>
<style>
.login {
  display: grid;
  text-align: center;
  background-color: grey;
}
</style>