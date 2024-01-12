<template>
    <div class="login d-flex justify-content-center">
        <div class="card mx-auto mt-5 mb-3">
            <div class="card-body">
                <h3 class="card-title mb-5">Agendar vôo: Goiânia/GO - Fortaleza/CE</h3>
                <div class="container">
                    <div class="row">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Ida <span class="text-danger">*</span></label>
                                    <input type="date" ref="data_ida" id="data_ida" class="form-control mb-3 white-text"
                                        name="nome" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sobrenome">Volta </label>
                                    <input type="date" ref="data_volta" id="data_volta" class="form-control mb-3 white-text"
                                        name="sobrenome" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cidade">Horário do Vôo: <span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="horario" id="horario">
                                    <option selected>Selecione o horário do vôo</option>
                                    <option v-for="h in horarios" :key="h.id">{{ h.horario }}</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="cidade">Poltrona: <span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="poltrona" id="poltrona">
                                    <option selected>Selecione a poltrona</option>
                                    <option v-for="p in poltronas" :key="p.id">{{ p.poltrona }}</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="cidade">Categoria: <span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="categoria" id="categoria">
                                    <option selected>Selecione sua categoria</option>
                                    <option v-for="c in categorias" :key="c.id">{{ c.descricao }}</option>
                                </select>
                            </div>

                            <div class="form-row mt-4 mb-4 text-center">
                                <div class="form-group col-md-12 d-flex justify-content-end">
                                    <button class="btn btn-danger mt-3">Agendar Vôo</button>
                                </div>
                            </div>
                        </form>
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

export default class agendarVoo extends Vue {

    horarios = [
        {id: 0, horario: '00:00'},
        {id: 1, horario: '01:00'},
        {id: 2, horario: '02:00'},
        {id: 3, horario: '03:00'},
        {id: 4, horario: '04:00'},
        {id: 5, horario: '05:00'},
        {id: 6, horario: '06:00'},
        {id: 7, horario: '07:00'},
        {id: 8, horario: '08:00'},
        {id: 9, horario: '09:00'},
        {id: 10, horario: '10:00'},
        {id: 11, horario: '11:00'},
        {id: 12, horario: '12:00'},
        {id: 13, horario: '13:00'},
        {id: 14, horario: '14:00'},
        {id: 15, horario: '15:00'},
        {id: 16, horario: '16:00'},
        {id: 17, horario: '17:00'},
        {id: 18, horario: '18:00'},
        {id: 19, horario: '19:00'},
        {id: 20, horario: '20:00'},
        {id: 21, horario: '21:00'},
        {id: 22, horario: '22:00'},
        {id: 23, horario: '23:00'}
    ]

    poltronas = [
        {id: 1, poltrona: 'Corredor'},
        {id: 2, poltrona: 'Meio'},
        {id: 3, poltrona: 'Janela'},
    ]

    categorias = [
        {id: 1, descricao: 'Econômico'},
        {id: 2, descricao: 'Executiva'},
        {id: 3, descricao: 'Premium'},
    ]

}
</script>

<style lang="scss">
@import '../scss/forms.scss';
</style>