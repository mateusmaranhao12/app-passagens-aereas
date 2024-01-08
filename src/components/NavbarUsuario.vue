<template>
    <nav>
        <h3><i class="fa-solid fa-plane"></i> App Passagens Aéreas</h3>
        <div class="navbar-container">
            <ul class="nav nav-underline mt-auto">
                <li class="nav-item">
                    <router-link :class="{ active: $route.name === 'Voos' }" class="nav-link" :to="{ name: 'Voos' }">Vôos
                        disponíveis</router-link>
                </li>
                <li class="nav-item">
                    <router-link :class="{ active: $route.name === 'MeusVoos' }" class="nav-link"
                        :to="{ name: 'MeusVoos' }">Meus Vôos</router-link>
                </li>

                <li class="nav-item">
                    <button @click="fazerLogout()" class="btn btn-danger">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Encerrar sessão
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</template>


<script lang="ts">
import { Options, Vue } from 'vue-class-component'

@Options({

})
export default class NavbarUsuario extends Vue {

    public fazerLogout() {
        this.$router.push('/')
    }

}
</script>

<style lang="scss">
@import '../scss/navbars.scss';
</style>