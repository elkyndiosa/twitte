import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
export default new Router({
	routes: [
		{
			path: '/twitter/public/',
			name: 'home',
			component: require('./views/home').default
		}
		// {
		// 	path: '/tienda-prueba/public/add-store',
		// 	name: 'add-store',
		// 	component: require('./views/add-store').default
		// },
		// {
		// 	path: '/tienda-prueba/public/store/:id',
		// 	name: 'store',
		// 	component: require('./views/store').default,
		// 	props: true
		// },
		// {
		// 	path: '/tienda-prueba/public/add-product/:id',
		// 	name: 'add-product',
		// 	component: require('./views/add-product').default,
		// 	props: true
		// }
	],
	mode: 'history'
})
