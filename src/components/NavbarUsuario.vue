<template>
    <nav class="navbar navbar-expand-lg bg-navbar">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                <h4><i class="fa-solid fa-user"></i> {{ nomeUsuario }}</h4>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <li class="nav-item">
                        <button @click="fazerLogout()" class="btn btn-danger">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </button>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <nav>
        <div class="navbar-container">
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <router-link :class="{ active: $route.name === 'Voos' }" class="nav-link" :to="{ name: 'Voos' }">Vôos
                        disponíveis</router-link>
                </li>
                <li class="nav-item">
                    <router-link :class="{ active: $route.name === 'MeusVoos' }" class="nav-link"
                        :to="{ name: 'MeusVoos' }">Meus Vôos</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>


<script lang="ts">
import auth from '@/utils/auth'
import { Options, Vue } from 'vue-class-component'

@Options({

})
export default class NavbarUsuario extends Vue {

    get nomeUsuario() {
        return localStorage.getItem('usuarioNome') || auth.usuarioNome || ''
    }

    public fazerLogout() {
        localStorage.removeItem('authToken')
        localStorage.removeItem('usuarioNome')
        auth.usuarioAutenticado = false
        auth.usuarioNome = ''
        this.$router.push('/')
    }

}
</script>

<style lang="scss">
@import '../scss/navbars.scss';
</style>