@extends('master')
@section('title', 'Edit My Example')
@section('content')
<h1>Edit Example ({{ $userExample->grammarRule->title }})</h1>
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
<form method="POST" action="{{ route('web.user-examples.update', $userExample) }}">
    @csrf
    @method('PUT')
    <label for="custom_phrase">Phrase</label>
    <input type="text" id="custom_phrase" name="custom_phrase" value="{{ old('custom_phrase', $userExample->custom_phrase) }}">
    <label for="translation">Translation</label>
    <input type="text" id="translation" name="translation" value="{{ old('translation', $userExample->translation) }}">
    <label for="romanization">Romanization</label>
    <input type="text" id="romanization" name="romanization" value="{{ old('romanization', $userExample->romanization) }}">
    <label for="notes">Notes</label>
    <textarea id="notes" name="notes">{{ old('notes', $userExample->notes) }}</textarea>
    <button type="submit">Save</button>
</form>
@endsection
