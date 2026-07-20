@extends('master')
@section('title', 'Add Course')
@section('content')
<h1>Add Course to {{ $language->name }}</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('web.languages.courses.store', $language) }}">
    @csrf
    <input type="hidden" name="language_id" value="{{ $language->id }}">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}">
    <label for="description">Description</label>
    <textarea id="description" name="description">{{ old('description') }}</textarea>
    <button type="submit">Create</button>
</form>
@endsection
