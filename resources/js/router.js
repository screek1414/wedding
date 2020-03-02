import Vue from 'vue';
import Router from 'vue-router';
const Main = () => import(/* webpackChunkName: "CourseFormTable" */ './components/MainPageComponent.vue');
const Orders = () => import(/* webpackChunkName: "CoursesFormEdit" */ './components/OrdersPageComponent.vue');

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Main,
        },
        {
            path: '/orders',
            component: Orders,
        },
    ],
});
