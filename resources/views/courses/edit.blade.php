@extends('master')
@section('title', 'Edit Course')
@section('content')
<h1>Edit Course</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('web.courses.update', $course) }}">
    @csrf
    <input type="hidden" name="language_id" value="{{ $language->id }}">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}">
    <label for="description">Description</label>
    <textarea id="description" name="description">{{ old('description') }}</textarea>
    <button type="submit">Update</button>
</form>
@endsection
