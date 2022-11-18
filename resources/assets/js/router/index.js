import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  // {
  //   path: '*',
  //   redirect: '/',
  // },
  {
    path: '/',
    name: 'cv',
    component: () => import('../components/Cv.vue'),
  },
  {
    path: '/show',
    name: 'show',
    component: () => import('../components/CvShow.vue'),
  },
  //   {
  //   path: '*',
  //   redirect: '/',
  // },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

