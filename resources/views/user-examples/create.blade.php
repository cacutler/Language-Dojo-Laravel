@extends('master')
@section('title', 'Add My Example')
@section('content')
<h1>Add My Example</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('web.user-examples.store') }}">
    @csrf
    <label for="grammar_rule_id">Grammar Rule</label>
    <select id="grammar_rule_id" name="grammar_rule_id">
        @foreach ($grammarRules as $rule)
            <option value="{{ $rule->id }}" @selected(old('grammar_rule_id', $selectedGrammarRuleId) === $rule->id)>{{ $rule->title }}</option>
        @endforeach
    </select>
    <label for="custom_phrase">Phrase</label>
    <input type="text" id="custom_phrase" name="custom_phrase" value="{{ old('custom_phrase') }}">
    <label for="translation">Translation</label>
    <input type="text" id="translation" name="translation" value="{{ old('translation') }}">
    <label for="romanization">Romanization</label>
    <input type="text" id="romanization" name="romanization" value="{{ old('romanization') }}">
    <label for="notes">Notes</label>
    <textarea id="notes" name="notes">{{ old('notes') }}</textarea>
    <button type="submit">Create</button>
</form>
@endsection
