<template>
    <div class="meus-voos container">
        <div class="row">
            <div class="col">
                <h3>Meus vôos agendados com origem em {{ localOrigem }}</h3>
                <div class="table-responsive">
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
                            <tr>
                                <td>Fortaleza/CE</td>
                                <td>24/02/2024</td>
                                <td>29/02/2024</td>
                                <td>14:00</td>
                                <td>Janela</td>
                                <td>Premium</td>
                            </tr>
                            <tr>
                                <td>Buenos Aires</td>
                                <td>25/03/2024</td>
                                <td>29/03/2024</td>
                                <td>15:00</td>
                                <td>Corredor</td>
                                <td>Normal</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component'
import NavbarUsuario from '@/components/NavbarUsuario.vue'
import auth from '@/utils/auth'

@Options({

    components: {
        NavbarUsuario
    }

})

export default class MeusVoos extends Vue {

    get localOrigem() {
        return localStorage.getItem('localOrigem') || auth.localOrigem || ''
    }

}
</script>

<style lang="scss">
@import '../scss/pagina_usuario.scss';
</style>