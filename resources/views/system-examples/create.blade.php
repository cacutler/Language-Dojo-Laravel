@extends('master')
@section('title', 'Add System Example')
@section('content')
<h1>Add Example to "{{$grammarRule->title}}"</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('web.grammar-rules.system-examples.store', $grammarRule)}}">
    @csrf
    <input type="hidden" name="grammar_rule_id" value="{{$grammarRule->id}}">
    <label for="phrase">Phrase</label>
    <input type="text" id="phrase" name="phrase" value="{{old('phrase')}}">
    <label for="translation">Translation</label>
    <input type="text" id="translation" name="translation" value="{{old('translation')}}">
    <label for="romanization">Romanization</label>
    <input type="text" id="romanization" name="romanization" value="{{old('romanization')}}">
    <button type="submit">Create</button>
</form>
@endsection
