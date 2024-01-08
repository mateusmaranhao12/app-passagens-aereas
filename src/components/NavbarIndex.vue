<template>
    <nav>
        <h3><i class="fa-solid fa-plane"></i> App Passagens Aéreas</h3>
        <div class="navbar-container">
            <ul class="nav nav-underline">
                <li class="nav-item">
                    <router-link :class="{ active: $route.path === '/' }" class="nav-link" aria-current="page" to="/">Página
                        Inicial</router-link>
                </li>
                <li class="nav-item">
                    <router-link :class="{ active: $route.path === '/login' }" class="nav-link"
                        to="/login">Login</router-link>
                </li>
                <li class="nav-item">
                    <router-link :class="{ active: $route.path === '/cadastro' }" class="nav-link"
                        to="/cadastro">Cadastro</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'

@Options({

})
export default class NavbarIndex extends Vue {



}
</script>

<style lang="scss">@import '../scss/navbars.scss';</style>