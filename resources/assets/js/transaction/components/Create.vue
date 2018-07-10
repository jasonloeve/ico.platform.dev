<template>
	<div>
		<loading :loading="loading"></loading>
		<flash></flash>
		<nav-bar></nav-bar>
		<div id="transactions-list">
			<div id="list-header">
				<h2>Create Transaction</h2>
			</div>
			<!-- render transactions in a list -->
			<div class="container">
				<div class="form-group">
					<label>transaction title</label>
					<input type="text" class="form-control" id="usr" v-model="transaction.title">
				</div>
				<div class="form-group">
					<label>transaction currency</label>
					<input type="text" class="form-control" id="currency" v-model="transaction.currency">
				</div>
				<div class="form-group">
					<label>amount_deposited</label>
					<input type="text" class="form-control" id="amount_deposited" v-model="transaction.amount_deposited">
				</div>
				<div class="form-group">
					<label>amount_received</label>
					<input type="text" class="form-control" id="amount_received" v-model="transaction.amount_received">
				</div>
				<div class="form-group">
					<label>transaction_id</label>
					<input type="text" class="form-control" id="transaction_id" v-model="transaction.transaction_id">
				</div>
				<div class="form-group">
					<label>notes</label>
					<input type="text" class="form-control" id="notes" v-model="transaction.notes">
				</div>
			</div>
		</div>
		<div style="padding-right:30px" class="cheat">
			<button class="btn-primary" @click="save(transaction)">Save</button>
		</div>
	</div>
</template>

<script>
	import { mapState } from 'vuex';
	import NavBar from '../../components/NavBar';
	import Flash from '../../components/Flash';
	import Loading from '../../components/Loading';
	export default {
		name: 'Create',
		data() {
			return {
				transaction: {
					title: '',
					currency: '',
					amount_deposited: '',
					amount_received: '',
					transaction_id: '',
					status: '',
					notes: '',
				},
				loading: false,
			}
		},
		methods: {
			save() {
				this.loading = true;
				this.$store.dispatch('save', this.transaction)
				.then(() => {
					this.$emit('flash', { message: 'Transaction Created.' });
					this.transaction.title = null;
					this.transaction.currency = null;
					this.transaction.amount_deposited = null;
					this.transaction.amount_received = null;
					this.transaction.transaction_id = null;
					this.transaction.notes = null;
					this.$router.push({ path: 'transaction' });
				})
				.catch((err) => {
					console.log(err)
				});
			}
		},
		computed: {
			...mapState(['transactions'])
		},
		components: {
			NavBar,
			Flash,
			Loading,
		},
	}
</script>