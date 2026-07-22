@extends('master')
@section('title', 'Register')
@section('content')
<h1>Register Form</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{route('register.store')}}" id="register_form">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" placeholder="First Name">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" placeholder="Last Name">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="username" placeholder="Username">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Email">
    <label for="phone_number">Phone Number</label>
    <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number">
    <label for="native_language">Native Language</label>
    <input type="text" name="native_language" id="native_language" placeholder="Native Language">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="password" placeholder="Password">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
    <input type="submit" name="submit" class="submit" id="submit">
</form>
@endsection
