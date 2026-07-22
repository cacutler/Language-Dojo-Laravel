@extends('master')
@section('title', 'Login')
@section('content')
<h1>Login Form</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{route('login.store')}}" id="login_form">
    <label for="username">Username</label>
    <input type="text" name="username" class="username" id="username" placeholder="Username">
    <label for="password">Password</label>
    <input type="password" name="password" class="password" id="password" placeholder="Password">
    <input type="submit" name="submit" class="submit" id="submit">
</form>
@endsection
