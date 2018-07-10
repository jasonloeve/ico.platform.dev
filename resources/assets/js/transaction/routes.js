import Transaction from './components/Transaction.vue';
import Create from './components/Create.vue';

const routes = [
	{ path: '/', name: 'transaction', component: Transaction },
	{ path: '/create', name: 'create', component: Create },
	{ path: '*', redirect: '/' },
];

export default routes;