<template>
    <NavbarIndex></NavbarIndex>
    <div class="secao-inicial d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="../assets/imgs/aviao.jpg">
                </div>
                <div class="texto-secao-inicial col-md-6 text-center mt-5">
                    <h2>Seja muito Bem Vindo(a)</h2>
                    <p>Aqui no App Passagens Aéreas, você encontra vários vôos nacionais e internacionais saindo de sua
                        cidade</p>
                </div>
            </div>
        </div>
    </div>

    <div class="secao-voos mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Vôos Nacionais</h4>
                </div>
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <div class="col" v-for="vn in voos_nacionais" :key="vn.destino">
                        <div class="card h-100">
                            <img :src="require(`../assets/imgs/${vn.imagem}.jpg`)" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ vn.destino }}</h5>
                                <p class="card-text">{{ vn.texto }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="secao-voos mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Vôos Internacionais</h4>
                </div>
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    <div class="col" v-for="vi in voos_internacionais" :key="vi.destino">
                        <div class="card h-100">
                            <img :src="require(`../assets/imgs/${vi.imagem}.jpg`)" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ vi.destino }}</h5>
                                <p class="card-text">{{ vi.texto }}</p>
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
import NavbarIndex from '@/components/NavbarIndex.vue'

@Options({

    components: {
        NavbarIndex
    }

})

export default class Index extends Vue {

    voos_nacionais = [

        { destino: 'Fortaleza - CE', imagem: 'fortal', texto: 'Lorem ipsum dolor sit amet' },
        { destino: 'Gramado - RS', imagem: 'gramado', texto: 'Lorem ipsum dolor sit amet' },
        { destino: 'Fernando de Noronha - PE', imagem: 'noronha', texto: 'Lorem ipsum dolor sit amet' },
        { destino: 'Curitiba - PR', imagem: 'curitiba', texto: 'Lorem ipsum dolor sit amet' },
        { destino: 'Porto Seguro - BA', imagem: 'porto-seguro', texto: 'Lorem ipsum dolor sit amet' }

    ]

    voos_internacionais = [

        { destino: 'Vancouver', imagem: 'vancouver', texto: 'Lorem ipsum dolor sit amet' },
        { destino: 'Paris', imagem: 'paris', texto: 'Lorem ipsum dolor sit amet' },
        { destino: 'Buenos Aires', imagem: 'buenos_aires', texto: 'Lorem ipsum dolor sit amet' },
        { destino: 'Miami', imagem: 'miami', texto: 'Lorem ipsum dolor sit amet' },
        { destino: 'Zermatt', imagem: 'zermatt', texto: 'Lorem ipsum dolor sit amet' }

    ]

}
</script>

<style lang="scss">
@import '../scss/index.scss';
</style>