<template>
    <h2>Vôos</h2>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import NavbarUsuario from '@/components/NavbarUsuario.vue'

@Options({

    components: {
        NavbarUsuario
    }

})

export default class Voos extends Vue {

}
</script>

<style lang="scss">
</style>