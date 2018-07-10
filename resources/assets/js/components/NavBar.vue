<template>
	<header>
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
			<div class="container-fluid">
				<div v-if="loggedUser">
					<ul class="nav navbar-nav">
						<li :class="{ active: activeLink === 'transaction' }">
							<a href="transaction" @click="activeLink = 'transaction'">My transactions</a>
						</li>
					</ul>
					<ul class="nav navbar-nav">
						<li :class="{ active: activeLink === 'create' }">
							<a href="transaction#/create">Create</a>
						</li>
					</ul>
				</div>
				<ul class="nav navbar-nav active">
					<li :class="{ active: activeLink === 'user' }">
						<a href="user">Users</a>
					</li>
				</ul>
				<ul class="nav navbar-nav pull-right" @click="logout">
					<li>
						<a href="#">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
			<div class="container">
				<router-link class="navbar-brand" to="/">DACXI ICO</router-link>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<ul class="navbar-nav mr-auto"></ul>
					<ul class="navbar-nav ml-auto" v-if="me">
						<router-link tag="li" to="/profile" active-class="active" class="nav-item">
							<a class="nav-link">Profile</a>
						</router-link>
						<router-link tag="li" to="/invest" active-class="active" class="nav-item">
							<a class="nav-link">Buy Tokens</a>
						</router-link>
						<router-link tag="li" to="/logout" active-class="active" class="nav-item">
							<a class="nav-link">Logout</a>
						</router-link>
						<button class="btn btn-outline-success" type="button">Main button</button>
					</ul>
					<ul class="navbar-nav ml-auto" v-else>
						<router-link tag="li" to="/login" active-class="active" class="nav-item">
							<a class="nav-link">Login</a>
						</router-link>
						<router-link tag="li" to="/register" active-class="active" class="nav-item">
							<a class="nav-link">Register</a>
						</router-link>
					</ul>
				</div>
			</div>
		</nav> -->
	</header>
</template>

<script>
	import axios from 'axios';
	import Flash from '../components/Flash';

	export default{
		name: 'Navbar',

		components: {
			Flash,
		},

		data() {
			return {
				loggedUser: {},
				activeLink: null,
			}
		},

		mounted() {
			this.loggedUser = window.loggedUser;
			this.activeRoute(this.$route.name);
			if (!this.loggedUser) {
				const windowLocation = window.location;
				windowLocation.href = `${windowLocation.origin}/login`;
			}
		},

		methods: {

			logout() {
				axios.post('/logout')
				.then(() => {
					window.location.href = window.location.origin + '/login';
					this.$emit('flash', { message: 'You have been logged out.' });
				});
			},

			changeTransactionRoute() {
				this.$emit('transaction-route-changed');
			},

			activeRoute(route) {
				this.activeLink = route;
			}

		},

		watch: {
			'$route' () {
				this.activeRoute(this.$route.name);
			}
		}
	}
</script>