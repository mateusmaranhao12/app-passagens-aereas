<template>
    <NavbarIndex></NavbarIndex>
    <div class="container">
        <div v-if="mensagem_alerta" class="mt-3 text-center" :class="mensagem_alerta.status">
            {{ mensagem_alerta.mensagem }}
        </div>
    </div>
    <div class="login d-flex justify-content-center">
        <div class="card mx-auto mt-3 mb-5">
            <div class="card-body">
                <h3 class="card-title mb-5">Cadastre-se agora mesmo!</h3>
                <div class="container">
                    <div class="row">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome <span class="text-danger">*</span></label>
                                    <input v-model="usuarios_cadastrados.nome" type="text" ref="nome" placeholder="Nome"
                                        id="nome" class="form-control mb-3 white-text" name="nome" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sobrenome">Sobrenome <span class="text-danger">*</span></label>
                                    <input v-model="usuarios_cadastrados.sobrenome" type="text" ref="sobrenome"
                                        placeholder="Sobrenome" id="sobrenome" class="form-control mb-3 white-text"
                                        name="sobrenome" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail <span class="text-danger">*</span></label>
                                <input v-model="usuarios_cadastrados.email" type="text" ref="email" placeholder="E-mail"
                                    id="email" class="form-control mb-3 white-text" name="email" />
                            </div>

                            <div class="form-group">
                                <label for="senha">Senha <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input v-model="usuarios_cadastrados.senha" :type="mostrar_senha ? 'text' : 'password'"
                                        class="form-control white-text" placeholder="Senha" name="senha" aria-label="Senha"
                                        aria-describedby="button-addon2">
                                    <button @click="alternarExibicaoSenha()" class="btn btn-outline-danger" type="button"
                                        id="senha">
                                        <i class="fa-solid"
                                            :class="{ 'fa-eye-slash': mostrar_senha, 'fa-eye': !mostrar_senha }"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cidade">Local de Origem <span class="text-danger">*</span></label>
                                <select v-model="usuarios_cadastrados.local_origem" class="form-select" aria-label="cidade"
                                    id="cidade">
                                    <option selected>Selecione uma cidade</option>
                                    <option v-for="c in cidades" :key="c.id">{{ c.cidade }}</option>
                                </select>
                            </div>

                            <div class="form-row mt-4 mb-4 text-center">
                                <div class="form-group col-md-12 d-flex justify-content-end">
                                    <button @click.prevent="enviarCadastro()" class="btn btn-danger mt-3">Cadastrar</button>
                                </div>
                            </div>

                            <div class="form-row mt-4 text-center">
                                <small>Já tem uma conta? <router-link class="text-danger" to="/login">Faça
                                        login</router-link> agora mesmo!</small>
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
import NavbarIndex from '@/components/NavbarIndex.vue'
import axios from 'axios'
import { MensagemAlerta } from '@/utils/interfaces'

@Options({

    components: {
        NavbarIndex
    }

})

export default class Login extends Vue {

    mostrar_senha = false
    senha = ''
    usuarios_cadastrados = { nome: '', sobrenome: '', email: '', senha: '', local_origem: '' }

    mensagem_alerta: MensagemAlerta | null = null

    cidades = [
        { id: 1, cidade: 'Goiânia/GO' },
        { id: 2, cidade: 'Campinas/SP' },
        { id: 3, cidade: 'Manaus/AM' },
        { id: 4, cidade: 'Campo Grande/MS' },
        { id: 5, cidade: 'Belo Horizonte/MG' },
        { id: 6, cidade: 'Belém/PA' },
        { id: 7, cidade: 'Cuiabá/MT' },
        { id: 8, cidade: 'Natal/RN' },
        { id: 9, cidade: 'São Luís/MA' },
    ]

    public alternarExibicaoSenha() { //alternar exibicao da senha
        this.mostrar_senha = !this.mostrar_senha
    }

    private cadastrarUsuario() { //cadastrar usuario

        //verificar se usuario já está cadastrado
        axios.get('http://localhost/Projetos/app-passagens-aereas/src/backend/verificar_usuario.php', {
            params: {
                email: this.usuarios_cadastrados.email
            }

        }).then((res) => {
            if (res.data.status === 'erro' && res.data.usuario_existente) {
                // Já existe um usuário com as mesmas informações
                this.mensagem_alerta = {
                    status: 'alert alert-danger',
                    mensagem: 'Já existe um usuário com o mesmo e-mail!'
                }
            } else {
                //não existe usuarios com o mesmo email, portanto pode cadastrar um novo usuario
                var cadastrar_usuario = this.toFormData(this.usuarios_cadastrados)

                axios.post(
                    'http://localhost/Projetos/app-passagens-aereas/src/backend/cadastrar_usuario.php', cadastrar_usuario
                ).then((res) => {
                    if (res.data.status === 'sucesso') {
                        this.mensagem_alerta = {
                            status: 'alert alert-success',
                            mensagem: res.data.mensagem
                        }
                        this.limparFormulario()

                    } else if (res.data.status === 'erro') {
                        this.mensagem_alerta = {
                            status: 'alert alert-danger',
                            mensagem: res.data.mensagem
                        }
                    }

                    setTimeout(() => {
                        this.mensagem_alerta = { status: '', mensagem: '' }
                    }, 5000)


                })
            }
        })
    }

    private validarFormulario() { //validar se todos os campos obrigatórios foram preenchidos

        if (this.usuarios_cadastrados.nome === '' ||
            this.usuarios_cadastrados.sobrenome === '' ||
            this.usuarios_cadastrados.email === '' ||
            this.usuarios_cadastrados.senha === '' ||
            this.usuarios_cadastrados.local_origem === '') {

            return false

        } else {
            return true
        }
    }

    public enviarCadastro() {

        if (this.validarFormulario()) {

            this.cadastrarUsuario()

        } else {
            this.mensagem_alerta = {
                status: 'alert alert-danger',
                mensagem: 'Erro! preencha todos os campos!'
            }
        }

        setTimeout(() => {
            this.mensagem_alerta = { status: '', mensagem: '' }
        }, 5000)

    }

    public limparFormulario() { //limpar formulário

        this.usuarios_cadastrados.nome = ''
        this.usuarios_cadastrados.sobrenome = ''
        this.usuarios_cadastrados.email = ''
        this.usuarios_cadastrados.senha = ''
        this.usuarios_cadastrados.local_origem = ''

    }

    toFormData(obj: Record<string, any>): FormData {
        const liveFormData = new FormData();
        for (const key in obj) {
            liveFormData.append(key, obj[key])
        }
        return liveFormData
    }

}
</script>

<style lang="scss">
@import '../scss/forms.scss';
</style>