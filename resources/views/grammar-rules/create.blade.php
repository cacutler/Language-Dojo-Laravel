@extends('master')
@section('title', 'Add Grammar Rule')
@section('content')
<h1>Add Grammar Rule to {{ $course->title }}</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('web.courses.grammar-rules.store', $course) }}">
    @csrf
    <input type="hidden" name="course_id" value="{{ $course->id }}">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}">
    <label for="explanation">Explanation</label>
    <textarea id="explanation" name="explanation">{{ old('explanation') }}</textarea>
    <label for="difficulty_level">Difficulty</label>
    <select id="difficulty_level" name="difficulty_level">
        @foreach (['beginner', 'intermediate', 'advanced'] as $level)
            <option value="{{ $level }}" @selected(old('difficulty_level') === $level)>{{ ucfirst($level) }}</option>
        @endforeach
    </select>
    <button type="submit">Create</button>
</form>
@endsection
