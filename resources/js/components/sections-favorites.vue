<template>
<div class="noticeSection">
    <div class="title">
        <p>Mis Noticias Favoritas</p>
    </div>
    
    <div class="cardNotice" v-for="item in records" :key="item.id">
        <div class="test">
            <p>{{item.title}}</p>
            <a v-on:click=removeFavorite(item.id,item.title) type="button" class="btn btn-dark">Remover Favorito</a>
        </div>
    </div>
    
</div>


</template>

<script>
import axios from "axios";


    export default {
        created(){
            this.getNotice()
            //console.log(this.records)
        },
        
        data(){
            return{
                records:[]
            }
        },
        methods:{
            getNotice(){
                let user_id = 1
                axios.get(`/allFavoritesNotice/${user_id}`)
                .then((res)=>{
                    res.data.forEach(element => {
                        let notice = {
                            title:element.title,
                            id:element.notice_id
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
                    user_id:1
                }).then((res)=>{
                    let message = "The news:" + title +" " + res.data.success
                    alert(message)
                    this.records = []
                    this.getNotice();
                    console.log(title,res.data.success);
                }).catch((e)=>{
                    console.log(e);
                })
            }
        },
    }
</script>
<style>
.noticeSection{
    background-color: grey;
}
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