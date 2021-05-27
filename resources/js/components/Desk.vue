<template>
    <div class="album items">
        <div class="container">
            <div class="row" style="justify-content: center;">


                <div v-for="thread in threads" class="items-row">
                    <div class="wrapper">
                        <ul class="d-flex w-100">
                            <div>
                                <li class="google flex-fill" v-on:click="tabs={show_message:thread.id,show_file:0}">
                                    <a><i class="fa fa-comment fa-2x" aria-hidden="true"></i></a>
                                </li>
                            </div>
                            <div>
                                <li class="google flex-fill" v-on:click="tabs={show_message:0,show_file:thread.id}">
                                    <a><i class="fa fa-image fa-2x" aria-hidden="true"></i></a>
                                </li>
                            </div>
                            <a v-bind:href="'/desks/desk_'+desk_id+'/threads/thread_'+thread.id">
                                <li class="google flex-fill">
                                        <i class="fa fa-share-square fa-2x" aria-hidden="true"></i>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <div>
                        <div class="items-text w-100 text-uppercase text-justify text-white">{{thread.name}}</div>
                        <div class="items-text w-100 text-uppercase text-justify text-white">Ответов - {{com_number[thread.id]}}</div>
                        <div v-if="tabs.show_message===thread.id" class="items-text">{{thread.message}}</div>
                        <div v-if="tabs.show_file===thread.id" class="items-text">
                            <img class="img" v-bind:src="thread.file" alt="no file" v-on:click="popups.show_pic = thread.file">
                        </div>
                        <div v-if="popups.show_pic===thread.file" class="popup" v-on:click="popups.show_pic=0">
                            <div class="popup_body">
                                <div class="popup_content">
                                    <img v-bind:src="thread.file" alt="no file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "Desk",
        data: ()=>{
            return{
                desk_id:String(window.location).split('_').reverse()[0],
                tabs:{
                    show_message:0,
                    show_file:0,
                },
                popups:{
                    show_pic:0
                },
                toggle_status:'',
                threads:{},
                com_number:'',
                thread_name:'',
                thread_id:'',
                thread_message:'',
                thread_file:'',
                is_sent:false,
            }
        },
        mounted(){
            axios
                .post('/desks/desk/show',{
                    desk_id:this.desk_id
                })
                .then(response => {
                    this.threads=response.data.data.threads
                    this.com_number=response.data.data.com_counter
                })
                .catch(error=>{
                    console.log(error)
                })
        },
        methods:{
            set_active(){
                this.isActive = this.isActive === false;
            }
        }
    }
</script>

<style scoped>
.img{
    max-width: 100px;
    max-height: 100px;
}
.items{

}
.items-row{
    background: #2a2a2a;
    border-radius: 10px;
    margin: 10px 5px 0 5px;
    width: 300px;
    /*height: max-content;*/
    float: left;
    padding: 20px;
}
.items-text{
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: justify;
    font-weight: bold;
    color: #dd4b39;
    margin: 20px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
}
/*Дизайн вкладок*/

.wrapper {
    /*width: 100%;*/
    margin: 0;
    padding: 0;
}

.wrapper ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.wrapper ul li {
    width: 50px;
    height: 50px;
    line-height: 45px;
    text-align: center;
    cursor: pointer;
    border-radius: 50%;
    border: 5px solid #D8E2DC;
    margin-left: 18px;
    margin-right: 18px;
    transition: all 0.5s ease;
}

.wrapper ul li .fa {
    color: #D8E2DC;
    transition: all 0.5s ease;
}

.wrapper ul li:hover.google {
    border: 5px solid #dd4b39;
    box-shadow: 0 0 15px #dd4b39;
    transition: all 0.5s ease;
}

.wrapper ul li:hover .fa-comment {
    color: #D8E2DC;
    transition: all 0.5s ease;
}
.fa-2x{
    font-size: 1.5em;
}

    /*Всплывающее окно*/

    .popup{
        position: fixed;
        z-index: 50;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.1);
        top: 0;
        left:0;
    }
    .popup_body{
        min-height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 10px;
    }
    .popup_content{
        background-color: #fff;
        color: #000;
        width: max-content;
        height: max-content;
        padding: 30px;
    }

</style>
