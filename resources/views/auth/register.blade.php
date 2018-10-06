@extends('backend.master')

@section('title', 'Register')

@section('content')

<main class="container">
    <div class="row">
        <form action="{{ route('register') }}" method="POST" class="col s12">
            @csrf
            <div class="row">
                <h3>Register</h3>
                <div class="input-field col s6">
                    <input value="{{ old('first_name') }}" id="first_name" name="first_name" type="text" class="validate{{ $errors->has('first_name') ? ' invalid' : '' }}">
                    <label for="first_name">First Name</label>
                    @if ($errors->has('first_name'))
                        <span class="helper-text">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="input-field col s6">
                    <input value="{{ old('last_name') }}" id="last_name" name="last_name" type="text" class="validate{{ $errors->has('last_name') ? ' invalid' : '' }}">
                    <label for="last_name">Last Name</label>
                    @if ($errors->has('last_name'))
                        <span class="helper-text">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="input-field col s6">
                    <input value="{{ old('username') }}" id="username" name="username" type="text" class="validate{{ $errors->has('username') ? ' invalid' : '' }}">
                    <label for="username">Username</label>
                    @if ($errors->has('username'))
                        <span class="helper-text">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="input-field col s6">
                    <input value="{{ old('email') }}" id="email" name="email" type="text" class="validate{{ $errors->has('email') ? ' invalid' : '' }}">
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                        <span class="helper-text">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="input-field col s6">
                    <input id="password" name="password" type="password" class="validate{{ $errors->has('password') ? ' invalid' : '' }}">
                    <label for="password">Password</label>
                     @if ($errors->has('password'))
                        <span class="helper-text">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="input-field col s6">
                    <input id="password" name="password_confirmation" type="password" class="validate{{ $errors->has('password_confirmation') ? ' invalid' : '' }}">
                    <label for="password">Confirm Password</label>
                     @if ($errors->has('password_confirmation'))
                        <span class="helper-text">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <div class="input-field col s12">
                    <button class="waves-effect waves-light btn right">Register</button>
                </div>
            </div>
        </form>
    </div>
</main>

@endsection