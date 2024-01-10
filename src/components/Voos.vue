<template>
    <div class="secao-boas-vindas-usuario">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Bem vindo (a), Mateus, aqui temos vôos nacionais e internacionais saindo de sua cidade: Goiânia - GO
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="voos">
        <div class="container">
            <div class="row">
                <div class="col-12 text">
                    <h5><i class="fa-solid fa-plane"></i> Vôos nacionais saindo de Goiânia - GO</h5>
                </div>

                <div v-for="vn in voos_nacionais" :key="vn.destino" class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Goiânia/GO - {{ vn.destino }}</h6>
                            <p class="card-text">{{ vn.texto }}</p>

                            <div class="text-center">
                                <div class="form-group col-md-12 d-flex justify-content-end">
                                    <button class="btn btn-danger mt-3">Agendar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 text">
                    <h5><i class="fa-solid fa-plane"></i> Vôos internacionais saindo de Goiânia - GO</h5>
                </div>

                <div v-for="vi in voos_internacionais" :key="vi.destino" class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Goiânia/GO - {{ vi.destino }}</h6>
                            <p class="card-text">{{ vi.texto }}</p>

                            <div class="text-center">
                                <div class="form-group col-md-12 d-flex justify-content-end">
                                    <button class="btn btn-danger mt-3">Agendar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    voos_nacionais = [

        { destino: 'Fortaleza - CE', texto: 'Conexão em Recife/PE > Fortaleza/CE' },
        { destino: 'Gramado - RS', texto: 'Conexão em São Paulo/SP > Porto Alegre/RS (Terá que pegar transporte até o destino final)' },
        { destino: 'Fernando de Noronha - PE', texto: 'Conexão em São Paulo/SP > Conexão em Recife/PE > Fernando de Noronha/PE' },
        { destino: 'Curitiba - PR', texto: 'Conexão em São Paulo/SP > Curitiba/PR' },
        { destino: 'Rio de Janeiro/RJ', texto: 'Vôo direto' },
        { destino: 'Florianópolis - SC', texto: 'Conexão em São Paulo/SP > Florianópolis/SC' },
        { destino: 'João Pessoa/PB', texto: 'Conexão em São Paulo/SP > Conexão em Recife/PE > João Pessoa/PB' },
        { destino: 'Aracaju/SE', texto: 'Conexão em São Paulo/SP > Aracaju/SE' },
        { destino: 'Maceió/AL', texto: 'Conexão em Salvador/BA > Maceió/AL' }

    ]

    voos_internacionais = [

        { destino: 'Buenos Aires', texto: 'Conexão em São Paulo/SP > Buenos Aires' },
        { destino: 'Vancouver', texto: 'Conexão em São Paulo/SP > Conexão em Toronto > Vancouver' },
        { destino: 'Miami', texto: 'Conexão em São Paulo/SP > Conexão em Bogotá > Miami' },
        { destino: 'Zermatt', texto: 'Conexão em São Paulo/SP > Conexão em Milão (terá que pegar transporte até o destino final)' },
        { destino: 'Paris', texto: 'Conexão em São Paulo/SP > Conexão em Lisboa > Paris' },
        { destino: 'Dublin', texto: 'Conexão em São Paulo/SP > Conexão em Madrid > Dublin' },
        { destino: 'Londres', texto: 'Conexão em São Paulo/SP > Londres' },
        { destino: 'Barcelona', texto: 'Conexão em São Paulo/SP > Barcelona' },
        { destino: 'Nova Iorque', texto: 'Conexão em São Paulo/SP > Nova Iorque' }

    ]

}
</script>

<style lang="scss">
@import '../scss/pagina_usuario.scss';
</style>