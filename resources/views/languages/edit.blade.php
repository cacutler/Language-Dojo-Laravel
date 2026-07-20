@extends('master')
@section('title', 'Edit Language')
@section('content')
<h1>Edit Language</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('web.languages.update', $language) }}">
    @csrf
    @method('PUT')
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $language->name) }}">
    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="{{ old('code', $language->code) }}">
    <button type="submit">Save</button>
</form>
@endsection
