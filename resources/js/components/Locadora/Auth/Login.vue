<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="POST" action="" @submit.prevent="login($event)">
                        <input type="hidden" name="_token" :value="csrf_token">
                        
                        {{ this.errorMessage }}

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"  required
                                    autocomplete="email" autofocus v-model="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="current-password" v-model="password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        Lembrar-me
                                    </label>
                                    <a href="#" class="form-check-label" for="remember">
                                        Registrar-se
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>

                                <a class="btn btn-link" href="#">
                                    Esqueci a senha
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: [
        'csrf_token',
    ],
    data(){
        return {
            email: '',
            password: '',
            errorMessage: '',
        }
    },
    methods:{
        login(e){
            axios.post('http://127.0.0.1:8000/api/locadora/login', {
                email: this.email,
                password: this.password
            })
            .then(function (response) {
                
                document.cookie = 'token='+response.data.token;
                const redirectUrl = response.data.redirect_url;
                window.location.href = redirectUrl;

                e.target.submit();
            })
            .catch(error => {
                this.errorMessage = true;
            });
        },
    }
}
</script>
<style scoped>
.alert-danger{
    color: red;
}
</style>