<template>
    <navbar-usuario></navbar-usuario>
    <RouterView></RouterView>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import NavbarUsuario from '@/components/NavbarUsuario.vue'

@Options({

    components: {
        NavbarUsuario
    }

})

export default class PaginaUsuario extends Vue {

}
</script>

<style lang="scss">
</style>