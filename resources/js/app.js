/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
window.Fire = new Vue();

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
import 'xe-utils'
import VXETable from 'vxe-table'
import 'vxe-table/lib/style.css'
Vue.use(VXETable)
import moment from 'moment'

Vue.use(require('vue-moment'));
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
});



Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


Vue.component('app', require('./components/App.vue').default);
Vue.component('home-page', require('./components/HomePage.vue').default);
Vue.component('about-page', require('./components/AboutPage.vue').default);
Vue.component('activity-page', require('./components/ActivityPage.vue').default);
Vue.component('gde-page', require('./components/GdePage.vue').default);
Vue.component('appointment-page', require('./components/AppointmentPage.vue').default);
Vue.component('gde-user', require('./components/GdeUser.vue').default);
Vue.component('gallery-page', require('./components/GalleryPage.vue').default);
Vue.component('contact-page', require('./components/ContactPage.vue').default);
Vue.component('info-page', require('./components/InfoPage.vue').default);
Vue.component('dashboard-page', require('./components/DashboardPage.vue').default);
Vue.component('analyse-page', require('./components/analysePage.vue').default);
Vue.component('allaccount-page', require('./components/AllaccountPage.vue').default);


// ======================= Ciprotec accounts managment ======================= //
Vue.component('createloginpage-page', require('./components/CreateloginPage.vue').default);

// ======================= Company accounts managment ======================= //
Vue.component('addusertocompany-page', require('./components/AddusertocompanyPage.vue').default);
Vue.component('listcompany-page', require('./components/ListcompanyPage.vue').default);


Vue.component('testapp-page', require('./components/TestappPage.vue').default);
Vue.component('testadmin-page', require('./components/TestadminPage.vue').default);





const app = new Vue({
    el: '#app',
});
