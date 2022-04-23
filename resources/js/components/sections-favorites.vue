<template>
<div class="noticeSection">
    <div class="title">
        <p>Mis Noticias Favoritas</p>
    </div>
    <div v-if="this.records.lenght == 0">
        <h3>No tiene favoritos agregado</h3>
    </div>


    <div v-else class="cardNotice"  v-for="item in records" :key="item.id">
        <div class="test">
            <p>{{item.title}}</p>
            <a class="url" :href="item.url" target="_blank">Link</a>
           <a v-on:click=removeFavorite(item.id,item.title,item.url)  type="button" class="btn btn-dark">Remover Favorito</a>
        </div>
    </div>
    
</div>


</template>

<script>
import axios from "axios";


    export default {
        created(){
            this.getNotice()
        },
        
        data(){
            return{
                records:[]
            }
        },
        methods:{
            getNotice(){
                let user_email = this.$cookie.get('Kickoff')
                axios.post(`/allFavoritesNotice`,{
                    user_email:user_email,
                })
                .then((res)=>{
                    res.data.forEach(element => {
                        let notice = {
                            title:element.title,
                            id:element.notice_id,
                            url:element.url
                            }
                        return this.records.push(notice)
                    });
                }).catch((e)=>{
                    console.log(e);
                })
            },

            removeFavorite(id,title){
                axios.post(`/addOrRemoveFavorite`,{
                    notice_id:id,
                    title:title,
                    user_email:this.$cookie.get('Kickoff')
                }).then((res)=>{
                    let message = "The news:" + title +" " + res.data.success
                    alert(message)
                    this.records = []
                    this.getNotice();
                }).catch((e)=>{
                    console.log(e);
                })
            }
        },
    }
</script>
<style>

.cardNotice{
    background-color: aqua;
    width: 100%;
    display: inherit;
    border: 1px solid gray;
    border-radius: 5px;
    text-align: center;
    height: 5rem;
    margin-left: 10px;
    margin-bottom: 1rem;
    justify-content: center;

}
.title{
    text-align: center;
}
</style>