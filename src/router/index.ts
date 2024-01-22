import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'

//Pagina Raiz
import Index from '../views/Index.vue'
import Login from '../components/Login.vue'
import Cadastro from '../components/Cadastro.vue'

//Pagina do usuario
import PaginaUsuario from '../views/PaginaUsuario.vue'
import Voos from '../components/Voos.vue'
import MeusVoos from '../components/MeusVoos.vue'
import agendarVoo from '../components/agendarVoo.vue'

//guarda de autenticação
import { requerAutorizacao } from '../utils/authGuard'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'index',
    component: Index
  },

  {
    path: '/login',
    name: 'Login',
    component: Login
  },

  {
    path: '/cadastro',
    name: 'cadastro',
    component: Cadastro
  },

  {
    path: '/pagina-usuario',
    name: 'PaginaUsuario',
    component: PaginaUsuario,
    redirect: '/pagina-usuario/voos',
    meta: { requerAutorizacao: true },
    beforeEnter: requerAutorizacao,
    children: [
      {
        path: 'voos',
        name: 'Voos',
        component: Voos
      },

      {
        path: 'meus-voos',
        name: 'MeusVoos',
        component: MeusVoos
      },

      {
        path: 'agendar-voo/:destino',
        name: 'agendarVoo',
        component: agendarVoo
      }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
