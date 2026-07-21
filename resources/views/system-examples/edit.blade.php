@extends('master')
@section('title', 'Edit System Example')
@section('content')
<h1>Edit Example ({{$systemExample->grammarRule->title}})</h1>
@if (session('status'))
    <p>{{session('status')}}</p>
@endif
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{route('web.system-examples.update', $systemExample)}}">
    @csrf
    @method('PUT')
    <label for="phrase">Phrase</label>
    <input type="text" id="phrase" name="phrase" value="{{old('phrase', $systemExample->phrase)}}">
    <label for="translation">Translation</label>
    <input type="text" id="translation" name="translation" value="{{old('translation', $systemExample->translation)}}">
    <label for="romanization">Romanization</label>
    <input type="text" id="romanization" name="romanization" value="{{old('romanization', $systemExample->romanization)}}">
    <button type="submit">Save</button>
</form>
@endsection
