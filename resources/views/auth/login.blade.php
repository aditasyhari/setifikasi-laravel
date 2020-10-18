@extends('layouts.master')
@section('content')

	<div class="box">
		<input type="checkbox" id="toggle" class="box__toggle" hidden>
		<img src="{{ asset('public/img/bg2.jpg') }}" alt="" class="box__image">
		<form class="form form--register" method="POST" action="{{ route('register') }}">
			@csrf
			<h1 class="form__title">Sign up</h1>

			<div class="form__helper">
				<input type="text" name="name" id="name" placeholder="Name" class="form__input @error('name') is-invalid @enderror" value="{{ old('name') }}" />
				<label class="form__label" for="name">Name</label>

				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="form__helper">
				<input type="email" name="email" id="email" placeholder="Email" class="form__input @error('email') is-invalid @enderror" value="{{ old('email') }}" />
				<label class="form__label" for="email">Email</label>

				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="form__helper">
				<input type="password" name="password" id="password" placeholder="Password" class="form__input @error('password') is-invalid @enderror" />
				<label class="form__label" for="password">Password</label>

				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="form__helper">
				<input type="password" name="password_confirmation" id="password-confirm" Placeholder="Confirm password" class="form__input" />
				<label class="form__label" for="confirm-password">Confirm password</label>
			</div>

			<button type="submit" class="form__button">Register</button>

			<p class="form__text">Already have an account? <label for="toggle" class="form__link">Sign in!</label>
		</form>

		<form class="form form--login" method="POST" action="{{ route('login') }}">
			@csrf
			<h1 class="form__title">Sign in</h1>

			<div class="form__helper">
				<input type="email" name="email" id="email" placeholder="Email" class="form__input @error('email') is-invalid @enderror" value="{{ old('email') }}" />
				<label class="form__label" for="email">Email</label>

				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="form__helper">
				<input type="password" name="password" id="password" placeholder="Password" class="form__input @error('password') is-invalid @enderror" />
				<label class="form__label" for="password">Password</label>

				@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<button type="submit" class="form__button">Login</button>

			<p class="form__text">Don't have an account? <label for="toggle" class="form__link">Sign up!</label>
		</form>
	</div>

@endsection