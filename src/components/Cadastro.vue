<template>
    <NavbarIndex></NavbarIndex>
    <h1>Cadastro</h1>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import NavbarIndex from '@/components/NavbarIndex.vue'

@Options({

    components: {
        NavbarIndex
    }

})

export default class Cadastro extends Vue {

  

}
</script>