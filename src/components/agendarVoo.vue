<template>
    <div class="login d-flex justify-content-center">
        <div class="card mx-auto mt-5 mb-5">
            <div class="card-body">
                <div v-if="mensagem_alerta" class="mt-3 text-center" :class="mensagem_alerta.status">
                    <i :class="mensagem_alerta.icone"></i> {{ mensagem_alerta.mensagem }}
                </div>
                <h3 class="card-title mb-5">Agendar vôo: {{ localOrigem }} - {{ $route.params.destino }}</h3>
                <div class="container">
                    <div class="row">
                        <form @submit.prevent="enviarDados">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="ida">Ida <span class="text-danger">*</span></label>
                                    <input v-model="voos.ida" type="date" ref="ida" id="ida"
                                        class="form-control mb-3 white-text" name="ida" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="volta">Volta </label>
                                    <input v-model="voos.volta" type="date" ref="volta" id="volta"
                                        class="form-control mb-3 white-text" name="volta" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cidade">Horário do Vôo: <span class="text-danger">*</span></label>
                                <select v-model="voos.horario" class="form-select" aria-label="horario" id="horario">
                                    <option selected>Selecione o horário do vôo</option>
                                    <option v-for="h in horarios" :key="h.id">{{ h.horario }}</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="cidade">Poltrona: <span class="text-danger">*</span></label>
                                <select v-model="voos.poltrona" class="form-select" aria-label="poltrona" id="poltrona">
                                    <option selected>Selecione a poltrona</option>
                                    <option v-for="p in poltronas" :key="p.id">{{ p.poltrona }}</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="cidade">Categoria: <span class="text-danger">*</span></label>
                                <select v-model="voos.categoria" class="form-select" aria-label="categoria" id="categoria">
                                    <option selected>Selecione sua categoria</option>
                                    <option v-for="c in categorias" :key="c.id">{{ c.descricao }}</option>
                                </select>
                            </div>

                            <div class="form-row mt-4 mb-4 text-center">
                                <div class="form-group col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger mt-3">Agendar
                                        Vôo</button>
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
import auth from '@/utils/auth'
import axios from 'axios'
import { MensagemAlerta } from '@/utils/interfaces'

@Options({

    components: {
        NavbarUsuario
    }

})

export default class agendarVoo extends Vue {

    horarios = [
        { id: 0, horario: '00:00' },
        { id: 1, horario: '01:00' },
        { id: 2, horario: '02:00' },
        { id: 3, horario: '03:00' },
        { id: 4, horario: '04:00' },
        { id: 5, horario: '05:00' },
        { id: 6, horario: '06:00' },
        { id: 7, horario: '07:00' },
        { id: 8, horario: '08:00' },
        { id: 9, horario: '09:00' },
        { id: 10, horario: '10:00' },
        { id: 11, horario: '11:00' },
        { id: 12, horario: '12:00' },
        { id: 13, horario: '13:00' },
        { id: 14, horario: '14:00' },
        { id: 15, horario: '15:00' },
        { id: 16, horario: '16:00' },
        { id: 17, horario: '17:00' },
        { id: 18, horario: '18:00' },
        { id: 19, horario: '19:00' },
        { id: 20, horario: '20:00' },
        { id: 21, horario: '21:00' },
        { id: 22, horario: '22:00' },
        { id: 23, horario: '23:00' }
    ]

    poltronas = [
        { id: 1, poltrona: 'Corredor' },
        { id: 2, poltrona: 'Meio' },
        { id: 3, poltrona: 'Janela' },
    ]

    categorias = [
        { id: 1, descricao: 'Econômico' },
        { id: 2, descricao: 'Executiva' },
        { id: 3, descricao: 'Premium' },
    ]

    voos = {
        id_usuario: '',
        destino: '',
        ida: '',
        volta: '',
        horario: '',
        poltrona: '',
        categoria: ''
    }

    destino: string | null = null
    mensagem_alerta: MensagemAlerta | null = null

    created() { //exibir nome do destino
        this.destino = String(this.$route.params.destino || '')
    }

    get localOrigem() { //exibir nome do local de origem
        return localStorage.getItem('localOrigem') || auth.localOrigem || ''
    }

    get usuarioId() { //exibir nome do local de origem
        return localStorage.getItem('usuarioId') || auth.usuarioId || ''
    }

    public agendarPassagem() { //agendar passagem

        // Certifique-se de que this.voos está preenchido antes de chamar toFormData
        this.voos.id_usuario = String(this.usuarioId)
        this.voos.destino = String(this.$route.params.destino || '')

        console.log('Dados a serem enviados:', this.voos)
        console.log('ID do Usuário a ser enviado:', this.usuarioId)

        var agendar_passagem = this.toFormData(this.voos)

        axios.post(
            'http://localhost/Projetos/app-passagens-aereas/src/backend/agendar_voo.php', agendar_passagem
        ).then((res) => {

            if (res.data.status === 'sucesso') { //enviado com sucesso

                this.mensagem_alerta = {
                    icone: 'fa-solid fa-check',
                    status: 'alert alert-success',
                    mensagem: res.data.mensagem
                }

                this.limparFormulario()

            } else if (res.data.status === 'erro') { //erro ao enviar

                this.mensagem_alerta = {
                    icone: 'fa-solid fa-triangle-exclamation',
                    status: 'alert alert-danger',
                    mensagem: res.data.mensagem
                }

            } else if (res.data.status === 'warning') { //conflito entre datas

                this.mensagem_alerta = {
                    icone: 'fa-solid fa-info-circle',
                    status: 'alert alert-warning',
                    mensagem: res.data.mensagem
                }

            }

            setTimeout(() => {
                this.mensagem_alerta = { icone: '', status: '', mensagem: '' }
            }, 5000)

        }).catch((error) => {
            console.error('Erro ao enviar a solicitação:', error)
        })
    }

    private validarFormulario() { //validar se todos os campos obrigatórios foram preenchidos

        if (this.voos.ida === '' ||
            this.voos.volta === '' ||
            this.voos.horario === '' ||
            this.voos.poltrona === '' ||
            this.voos.categoria === '' ||
            this.voos.ida > this.voos.volta) {

            return false

        } else {
            return true
        }
    }

    public enviarDados() { //enviar dados para o banco de dados

        if (this.validarFormulario()) {

            this.agendarPassagem()

        } else if (this.voos.ida > this.voos.volta) { //data de ida precisa ser menor que a data de volta

            this.mensagem_alerta = {
                icone: 'fa-solid fa-circle-info',
                status: 'alert alert-warning',
                mensagem: 'A data de ida precisa ser anterior a data da volta'
            }

        } else {

            this.mensagem_alerta = {
                icone: 'fa-solid fa-triangle-exclamation',
                status: 'alert alert-danger',
                mensagem: 'Erro, preencha todos os campos!'
            }

        }

        setTimeout(() => {
            this.mensagem_alerta = { icone: '', status: '', mensagem: '' }
        }, 5000)

    }

    private limparFormulario() { //limpar formulario

        this.voos.ida = '',
            this.voos.volta = '',
            this.voos.horario = '',
            this.voos.poltrona = '',
            this.voos.categoria = ''

    }

    toFormData(obj: Record<string, any>): FormData {
        const formData = new FormData()

        Object.keys(obj).forEach(key => {
            formData.append(key, obj[key])
        })

        return formData
    }


}
</script>

<style lang="scss">
@import '../scss/forms.scss';
</style>