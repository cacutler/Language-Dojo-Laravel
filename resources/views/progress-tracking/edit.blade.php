@extends('master')
@section('title', 'Edit Progress')
@section('content')
<h1>Progress: {{ $progressTracking->grammarRule->title }}</h1>
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
<form method="POST" action="{{ route('web.progress-tracking.update', $progressTracking) }}">
    @csrf
    @method('PUT')
    <label for="is_completed">
        <input type="checkbox" id="is_completed" name="is_completed" value="1" @checked(old('is_completed', $progressTracking->is_completed))>
        Completed
    </label>
    <button type="submit">Save</button>
</form>
@endsection
