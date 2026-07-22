@extends('master')
@section('title', 'Login')
@section('content')
<h1>Login Form</h1>
<form method="POST" action="{{route('api.login')}}" id="login_form">
    <label for="username">Username</label>
    <input type="text" name="username" class="username" placeholder="Username">
    <label for="password">Password</label>
    <input type="password" name="password" class="password" placeholder="Password">
    <input type="submit" name="submit" class="submit">
</form>
@endsection
