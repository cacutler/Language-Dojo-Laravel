@extends('master')
@section('title', 'Register')
@section('content')
<h1>Register Form</h1>
<form method="POST" action="{{route('api.register')}}" id="register_form">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" placeholder="First Name">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" placeholder="Last Name">
    <label for="username">Username</label>
    <input type="text" name="username" class="username" placeholder="Username">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Email">
    <label for="phone_number">Phone Number</label>
    <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number">
    <label for="native_language">Native Language</label>
    <input type="text" name="native_language" id="native_language" placeholder="Native Language">
    <label for="password">Password</label>
    <input type="password" name="password" class="password" placeholder="Password">
    <input type="submit" name="submit" class="submit">
</form>
@endsection
