<template>
    <div>
        <div class="alert alert-success" v-if="is_response">{{message}}</div>
        <div class="alert alert-danger" v-if="is_error">{{errors}}</div>
        <div class="form-style-6" align="center">
            <h1>Вход</h1>
            <form @submit.prevent="login" id="reg_form">
                <input id="email" v-model="email" class="a_input" type="email" name="email" placeholder="Введите e-mail" required />
                <input id="password" v-model="password" class="a_input" type="password" name="password" placeholder="Введите пароль" required/>
                <button type="submit" class="btn btn-success">Войти</button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "Login",//было Auth
        data: () => {
            return{
                email:'',
                password:'',
                errors: [],
                message:'',
                is_response:false,
                is_error:false
            }
        },
        methods:{
            login:function(){
                axios
                    .post('/login',{
                        email:this.email,
                        password:this.password,
                    })
                    .then(response => {
                        this.message = 'вы вошли'
                        console.log(response)
                        if (response.statusText === 'OK'){this.is_response = true}
                    })
                    .catch(error=>{
                        this.is_error = true
                        this.errors = error
                        console.log(error)
                    })
            }
        }
    }
</script>

<style scoped>

</style>
