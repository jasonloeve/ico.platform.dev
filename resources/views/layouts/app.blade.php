<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
		<!-- <app-loading></app-loading>
		<app-header></app-header> -->
		<transition name="fade" mode="out-in">
			<router-view></router-view>
		</transition>
		<!-- <app-footer></app-footer>
		<app-toast position="ne"></app-toast> -->
	</div>
</body>
<script>window.loggedUser = {!! auth()->user()  ? auth()->user() : ''!!}</script>
<script src="{{ mix('build/js/transactionApp.js') }}"></script>
</html>