<template>
<div class="noticeSection">
    <div class="title">
        <p>Noticias Nuevas</p>
    </div>
    
    <div class="cardNotice" v-for="item in records" :key="item.id">
        <div class="test">
            <p>{{item.title}}</p>
            <a v-on:click=addFavorite(item.id,item.title) type="button" class="btn btn-dark">Añadir a Favoritos</a>
        </div>
    </div>
    
</div>


</template>

<script>
import axios from "axios";


    export default {
        created(){
            this.getNotice()
            console.log(this.records)
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
                    //console.log(res.data);
                    res.data.forEach(element => {
                        axios.get(`https://hacker-news.firebaseio.com/v0/item/${element}.json?print=pretty`)
                        .then((res)=>{
                            //console.log(res);
                            let notice = {
                                title:res.data.title,
                                id:res.data.id
                                }
                            return this.records.push(notice)
                        })
                    });
                })
                .catch(function (e) {
                    console.log(e);
                });
            },
            addFavorite(id,title){
                axios.post(`/addOrRemoveFavorite`,{
                    notice_id:id,
                    title:title,
                    user_id:1
                }).then((res)=>{
                    let message = "The news:" + title +" " + res.data.success
                    alert(message)
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