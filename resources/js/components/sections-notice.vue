<template>
<div class="noticeSection">
    <div class="title">
        <h4>Noticias Nuevas</h4>
    </div>
    
    <div class="cardNotice" v-for="item in records.slice(0, 15)" :key="item.id">
        <div class="test">
            <p>{{item.title}}</p>
            <a class="url" :href="item.url" target="_blank">Link</a>
            <a v-on:click=addFavorite(item.id,item.title,item.url) type="button" class="btn btn-dark">Añadir a Favoritos</a>
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
                axios.get(`https://hacker-news.firebaseio.com/v0/newstories.json?print=pretty`)
                .then((res)=>{
                    res.data.forEach(element => {
                        axios.get(`https://hacker-news.firebaseio.com/v0/item/${element}.json?print=pretty`)
                        .then((res)=>{
                            //console.log(res.data);
                            let notice = {
                                title:res.data.title,
                                id:res.data.id,
                                url:res.data.url
                                }
                            return this.records.push(notice)
                        })
                    });
                })
                .catch(function (e) {
                    console.log(e);
                });
            },
            addFavorite(id,title,url){
                axios.post(`/addOrRemoveFavorite`,{
                    notice_id:id,
                    title:title,
                    user_email:this.$cookie.get('Kickoff'),
                    url:url
                }).then((res)=>{
                    let message = "The news:" + title +" " + res.data.success
                    alert(message)
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
.url{
    background: grey;
    border-radius: 10%;
}
</style>