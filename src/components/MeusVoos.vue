<template>
    <h2>Meus Vôos</h2>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import NavbarUsuario from '@/components/NavbarUsuario.vue'

@Options({

    components: {
        NavbarUsuario
    }

})

export default class MeusVoos extends Vue {

}
</script>

<style lang="scss">
</style>