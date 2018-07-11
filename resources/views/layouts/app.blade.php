{{--<!DOCTYPE html>--}}
{{--<html lang="{{ app()->getLocale() }}">--}}
{{--<head>--}}
	{{--<meta charset="utf-8">--}}
	{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
	{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
	{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
	{{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
	{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
	{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
	{{--<div id="app">--}}
		{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
			{{--{{ csrf_field() }}--}}
		{{--</form>--}}
		{{--<!-- <app-loading></app-loading>--}}
		{{--<app-header></app-header> -->--}}
		{{--<transition name="fade" mode="out-in">--}}
			{{--<router-view></router-view>--}}
		{{--</transition>--}}
		{{--<!-- <app-footer></app-footer>--}}
		{{--<app-toast position="ne"></app-toast> -->--}}
	{{--</div>--}}
{{--</body>--}}
{{--<script>window.loggedUser = {!! auth()->user()  ? auth()->user() : ''!!}</script>--}}
{{--<script src="{{ mix('build/js/transactionApp.js') }}"></script>--}}
{{--</html>--}}

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">




	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <span class="my-0 mr-md-auto font-weight-normal">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </span>
		<nav class="my-2 my-md-0 mr-md-3">
			@guest
				<a class="p-2 text-dark" href="{{ route('login') }}">Login</a>
				<a class="p-2 text-dark" href="{{ route('register') }}">Register</a>
			@else
				Welcome {{ Auth::user()->name }}
				@if (Auth::user()->can_post())
					<a class="p-2 text-dark" href="{{ url('/new-post') }}">Add Post</a>
					<a class="p-2 text-dark" href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>
				@endif
				<a class="p-2 text-dark" href="{{ url('/drafts/')}}">My Drafts</a>
				<a class="p-2 text-dark" href="{{ url('/user/'.Auth::id()) }}">My Profile</a>
				<a class="p-2 text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			@endguest
		</nav>
		{{--<a class="btn btn-outline-primary" href="#">Sign up</a>--}}
	</div>






	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@if (Session::has('message'))
					<div class="flash alert-info">
						<p class="panel-body">
							{{ Session::get('message') }}
						</p>
					</div>
				@endif
				@if ($errors->any())
					<div class='flash alert-danger'>
						<ul class="panel-body">
							@foreach ( $errors->all() as $error )
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>
		</div>
	</div>

	@yield('content')

</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>