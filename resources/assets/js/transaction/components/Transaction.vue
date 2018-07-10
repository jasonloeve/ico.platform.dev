<template>
	<div>
		<loading :loading="loading"></loading>
		<flash></flash>
		<nav-bar></nav-bar>
		<div id="transactions-list">
			<div id="list-header"></div> testing 
			<div class="container">
				<div class="list-group" v-if="transactionList.length">
					<span class="list-group-item" href="#" v-for="transaction in transactionList">
						{{ transaction.title }}
					</span>
				</div>
				<div v-else>
					<span>
						{{ noTransactionsFoundMessage }}
					</span>
				</div>
			</div>
		</div>
	</div>
</template>







<script>
	import { mapState, mapActions } from 'vuex';
	import Flash from '../../components/Flash';
	import NavBar from '../../components/NavBar';
	import Loading from '../../components/Loading';
	export default {
		name: 'Transaction',
		data() {
			return {
				//activeTransaction: '',
				currentRoute: '',
				transactionList: [],
				editingTransaction: {},
				loggedUser: {},
				loading: true,
				noTransactionsFoundMessage: null,
			}
		},
		created() {
			this.loggedUser = window.loggedUser;
		},
		mounted() {
			this.currentRoute = this.$route.query.type;
			this.get();
		},
		methods: {
			get() {
				this.getAll()
				.then(() => {
						this.setTransactionList();
						//this.toggleActiveClass();
						this.setNoTransactionMessageFound('No transactions found.');
				})
				.finally(() => this.setLoading());
			},
			...mapActions([
				'getAll',
			]),
			setLoading(status = false) {
				this.loading = status;
			},
			setTransactionList() {
				this.transactionList = this.currentRoute ? this.favouriteTransactions : this.transactions;
			},
			setNoTransactionMessageFound(message) {
				this.noTransactionsFoundMessage = ! this.transactionList.length ?  message :  this.noTransactionsFoundMessage;
			}
		},
		computed: {
			...mapState([
				'transactions',
			]),
		},
		components: {
			Flash,
			NavBar,
			Loading,
		}
	}
</script>