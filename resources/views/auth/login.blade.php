@extends('backend.master')

@section('title', 'Login')

@section('content')

<main class="container">
    <div class="row">
        <form action="{{ route('login') }}" method="POST" class="col s12">
            @csrf
            <div class="row">
                <h3>Login</h3>
                <div class="input-field col s12">
                    <input value="{{ old('email') }}" id="email" name="email" type="text" class="validate{{ $errors->has('email') ? ' invalid' : '' }}" autofocus>
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                        <span class="helper-text">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="input-field col s12">
                    <input value="{{ old('password') }}" id="password" name="password" type="password" class="validate{{ $errors->has('password') ? ' invalid' : '' }}" autofocus>
                    <label for="password">Password</label>
                    @if ($errors->has('password'))
                        <span class="helper-text">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="input-field col s12">
                    <button type="submit" class="waves-effect waves-light btn right">Login</button>
                </div>
            </div>
        </form>
    </div>
</main>

@endsection