/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


require('./scripts/colors')



require('waypoints/lib/jquery.waypoints')

require('slicknav/jquery.slicknav');

require('./scripts/scrollup')
require('./scripts/onepage-nav.min')


require('./scripts/active') // can be removed...




$('.menu').slicknav({
    prependTo:".mobile-nav",
    duration:300,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    closeOnClick:true,
});

jQuery(window).on('scroll', function() {
    if ($(this).scrollTop() > 200) {
        $('.header').addClass("sticky");
    } else {
        $('.header').removeClass("sticky");
    }
});


$('.top-search a').on( "click", function(){
    $('.search-top').toggleClass('active');
});

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


export const EventBus = new Vue();
Vue.component('cart-component', require('./components/CartComponent').default);
Vue.component('trending-products-list', require('./components/TrendingProductsList').default);


new Vue({el: '#trendingListContainer'});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#cartContainer',
});
