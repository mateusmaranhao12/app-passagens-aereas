import { NavigationGuardNext, RouteLocationNormalized } from 'vue-router'
import auth from '@/utils/auth'

export function requerAutorizacao(to: RouteLocationNormalized, from: RouteLocationNormalized, next: NavigationGuardNext) {

    console.log('Usuário autenticado:', auth.authToken)
    if (auth.authToken) {
        console.log('Usuário autenticado, acesso permitido.')
        next() // Permite o acesso à rota
    } else {
        console.log('Usuário nao autenticado')
        next('/login') // Redireciona para a página de login se não estiver autenticado
    }
}