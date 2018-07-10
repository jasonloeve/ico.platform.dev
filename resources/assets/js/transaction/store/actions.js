import axios from 'axios';
import RESOURCE_TRANSACTION from '../api';

export default {

	getAll({commit}) {
		return axios.get(RESOURCE_TRANSACTION)
		.then((response) => {
			commit('GET', response.data);
		})
		.catch();
	},

	save({commit}, transaction) {
		transaction.user_id = window.loggedUser.id;
		return axios.post(RESOURCE_TRANSACTION, transaction)
		.then((response) => {})
		.catch((err) => {
			console.log(err);
		});
	},

	// update({ commit } ,transactionDetails) {
	// 	axios.put(`${RESOURCE_TRANSACTION}/${transactionDetails.transactionId}`, transactionDetails.updatedTransaction)
	// 	.then(resp => console.log(resp));
	// },

	// deleteTransaction({commit}, transaction) {
	// 	return axios.delete(`${RESOURCE_TRANSACTION}/${transaction.id}`)
	// 	.then(resp => console.log(resp));
	// },
}