@extends('master')
@section('title', 'Add Language')
@section('content')
<h1>Add Language</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('web.languages.store') }}">
    @csrf
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="{{ old('code') }}">
    <button type="submit">Create</button>
</form>
@endsection
