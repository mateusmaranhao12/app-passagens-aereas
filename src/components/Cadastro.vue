<template>
    <NavbarIndex></NavbarIndex>
    <div class="login d-flex justify-content-center">
        <div class="card mx-auto mt-5 mb-3">
            <div class="card-body">
                <h3 class="card-title mb-5">Cadastre-se agora mesmo!</h3>
                <div class="container">
                    <div class="row">
                        <form>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome <span class="text-danger">*</span></label>
                                    <input type="text" ref="nome" placeholder="Nome" id="nome"
                                        class="form-control mb-3 white-text" name="nome" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sobrenome">Sobrenome <span class="text-danger">*</span></label>
                                    <input type="text" ref="sobrenome" placeholder="Sobrenome" id="sobrenome"
                                        class="form-control mb-3 white-text" name="sobrenome" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail <span class="text-danger">*</span></label>
                                <input type="text" ref="email" placeholder="E-mail" id="email"
                                    class="form-control mb-3 white-text" name="email" />
                            </div>

                            <div class="form-group">
                                <label for="senha">Senha <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input :type="mostrar_senha ? 'text' : 'password'" class="form-control white-text"
                                        placeholder="Senha" name="senha" aria-label="Senha"
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
                                <select class="form-select" aria-label="cidade" id="cidade">
                                    <option selected>Selecione uma cidade</option>
                                    <option v-for="c in cidades" :key="c.id">{{ c.cidade }}</option>
                                </select>
                            </div>

                            <div class="form-row mt-4 mb-4 text-center">
                                <div class="form-group col-md-12 d-flex justify-content-end">
                                    <button class="btn btn-danger mt-3">Cadastrar</button>
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

@Options({

    components: {
        NavbarIndex
    }

})

export default class Login extends Vue {

    mostrar_senha = false

    cidades = [
        {id: 1, cidade: 'São Paulo - SP'},
        {id: 2, cidade: 'Rio de Janeiro - RJ'},
        {id: 3, cidade: 'Salvador - BA'},
        {id: 4, cidade: 'Recife - PE'},
        {id: 5, cidade: 'Brasília - DF'}
    ]

    public alternarExibicaoSenha() {
        this.mostrar_senha = !this.mostrar_senha
    }

}
</script>

<style lang="scss">
@import '../scss/forms.scss';
</style>