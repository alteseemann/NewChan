import VueRouter from "vue-router";
import Login from "./components/Login";
import Register from "./components/Register";
import Desk from "./components/Desk";
import Thread from "./components/Thread";

export default new VueRouter({routes:[
    //Авторизация
    {
        path:'/login',
        component:Login
    },
    {
        path:'/register',
        component:Register
    },

        //отображение элементов

    {
        path:'/desks/:desk_id',
        name:'enter_desk',
        component:Desk
    },
    {
        path:'/desks/desk_*/threads/:thread_id',
        name:'enter_thread',
        component:Thread
    },

    ],
    mode: 'history'
})
