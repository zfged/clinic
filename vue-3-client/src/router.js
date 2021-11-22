import { createWebHistory, createRouter } from "vue-router";
import Home from './components/Home'
import Login from './components/Login'
import Clients from './components/pages/Clients'
import Descriptions from './components/pages/Descriptions'
import Services from './components/pages/Services'
import Collaborator from './components/pages/Collaborator'
import Salary from './components/pages/Salary'
import Settings from './components/pages/Settings'
import CashBox from './components/pages/Сashbox'

const routes = [
  {
    path: '/', component: Home,
    redirect: '/clients',
    children: [
      {
        path: 'clients',
        component: Clients
      },
      {
        path: 'descriptions',
        component: Descriptions
      },
      {
        path: 'services',
        component: Services
      },
      {
        path: 'employers',
        component: Collaborator
      },
      {
        path: 'salary',
        component: Salary
      },
      {
        path: 'cashbox',
        component: CashBox
      },
      {
        path: 'settings',
        component: Settings
      },
    ]
  },
  { path: '/login', component: Login },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  // redirect to login page if not logged in and trying to access a restricted page
  const publicPages = ['/login'];
  const authRequired = !publicPages.includes(to.path);
  const loggedIn = localStorage.getItem('user');

  if (authRequired && !loggedIn) {
    return next('/login');
  }

  next();
})

export default router;
