<template>
    <div class="meus-voos container">
        <div class="row">
            <div class="col">
                <h3>Meus vôos agendados com origem em {{ localOrigem }}</h3>
                <div class="table-responsive text-center">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Destino</th>
                                <th scope="col">Ida</th>
                                <th scope="col">Volta</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Poltrona</th>
                                <th scope="col">Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(voo, index) in voos" :key="index">
                                <td>{{ voo.destino }}</td>
                                <td>{{ voo.ida }}</td>
                                <td>{{ voo.volta }}</td>
                                <td>{{ voo.horario }}</td>
                                <td>{{ voo.poltrona }}</td>
                                <td>{{ voo.categoria }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div v-if="voos.length === 0" class="alert alert-secondary" role="alert">
                        <!--Se o usuário não agendou nenhum vôo-->
                        Você ainda não agendou nenhum vôo
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import NavbarUsuario from '@/components/NavbarUsuario.vue'
import auth from '@/utils/auth'
import axios from 'axios'
import { Voo } from '@/utils/interfaces'

@Options({

    components: {
        NavbarUsuario
    }

})

export default class MeusVoos extends Vue {

    voos: Voo[] = [] //carregar array de voos

    created() {
        this.carregarVoos()
    }

    get localOrigem() { //carregar Local de Origem
        return localStorage.getItem('localOrigem') || auth.localOrigem || ''
    }

    async carregarVoos() {

        try {

            const res = await axios.get<Voo[]>(`
                http://localhost/Projetos/app-passagens-aereas/src/backend/voos_agendados.php?id_usuario=${auth.usuarioId}
            `)
            this.voos = res.data

        } catch (error) {
            console.error('Erro ao carregar os vôos do usuário', error)
        }

    }

}
</script>

<style lang="scss">
@import '../scss/pagina_usuario.scss';
</style>