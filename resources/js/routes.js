import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
export default new Router({
	routes: [
		{
			path: '/twitter/public/',
			name: 'home',
			component: require('./views/home').default
		},
		{
			path: '/twitter/public/show/:id',
			name: 'show',
			component: require('./views/user').default,
			props: true
		},
		{
			path: '/twitter/public/edit/:tweet',
			name: 'edit',
			component: require('./views/edit').default,
			props: true
		}
	],
	mode: 'history'
})
