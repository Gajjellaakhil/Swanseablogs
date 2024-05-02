@extends('app')

<div class="login-page">
    <div>
      <img src="{{url('images/logo.jpg')}}" alt="logo" class="logo">
    </div>
    <div class="login-container">
            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf
                <h2 class="login">Login</h2>
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
                <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
            </form>
        </div>
</div>