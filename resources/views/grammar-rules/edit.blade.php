@extends('master')
@section('title', 'Edit Grammar Rule')
@section('content')
<h1>Edit Grammar Rule ({{ $grammarRule->course->title }})</h1>
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
<form method="POST" action="{{ route('web.grammar-rules.update', $grammarRule) }}">
    @csrf
    @method('PUT')
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $grammarRule->title) }}">
    <label for="explanation">Explanation</label>
    <textarea id="explanation" name="explanation">{{ old('explanation', $grammarRule->explanation) }}</textarea>
    <label for="difficulty_level">Difficulty</label>
    <select id="difficulty_level" name="difficulty_level">
        @foreach (['beginner', 'intermediate', 'advanced'] as $level)
            <option value="{{ $level }}" @selected(old('difficulty_level', $grammarRule->difficulty_level) === $level)>{{ ucfirst($level) }}</option>
        @endforeach
    </select>
    <button type="submit">Save</button>
</form>
@endsection
