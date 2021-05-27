<template>
    <div>
        <div class="alert alert-success" v-if="is_response">{{message}}</div>
        <div class="alert alert-danger" v-if="is_error">{{errors}}</div>
        <div class="form-style-6" align="center">
            <h1>Регистрация</h1>
            <form @submit.prevent="register" id="reg_form">
                <input type="hidden" name="_token" :value="token"/>
                <input id="name" v-model="name" class="a_input" type="text" name="name" placeholder="Введите имя" required />
                <input id="email" v-model="email" class="a_input" type="email" name="email" placeholder="Введите e-mail" required />
                <input id="password" v-model="password" class="a_input" type="password" name="password" placeholder="Придумайте пароль" required/>
                <input id="password_confirmation" class="a_input" v-model="password_confirmation" type="password" name="password_confirmation" placeholder="Подтвердите пароль" required/>
                <div class="mb-3"><a href="/login" ><!--{{ route('login') }}-->
                    Уже зарегистрированы?
                </a></div>
                <button type="submit" class="btn btn-success">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "Register",//было ModalForm
        data: () => {
            return{
                token:'',
                name:'',
                email:'',
                password:'',
                password_confirmation:'',
                errors: [],
                message:'',
                is_response:false,
                is_error:false
            }
        },
        mounted() {
            this.token = window.csrf_token
            console.log (this.token)
        },
        methods:{
            register:function(){
                let data = {
                    'X-CSRF-TOKEN': this.token,
                    name:this.name,
                    email:this.email,
                    password:this.password,
                    password_confirmation:this.password_confirmation
                }
                let config ={
                    headers: {
                        'X-CSRF-TOKEN': this.token,
                    }
                }
                axios
                    .post('/register',data,config)
                    .then(response => {
                        console.log(response)
                        this.message = 'Вы успешно зарегистрированы'
                        if (response){this.is_response = true}
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
    .title{
        padding-top: 20px;
    }
</style>
