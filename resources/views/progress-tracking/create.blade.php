@extends('master')
@section('title', 'Track Progress')
@section('content')
<h1>Track Progress</h1>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method="POST" action="{{ route('web.progress-tracking.store') }}">
    @csrf
    <label for="grammar_rule_id">Grammar Rule</label>
    <select id="grammar_rule_id" name="grammar_rule_id">
        @foreach ($grammarRules as $rule)
            <option value="{{ $rule->id }}" @selected(old('grammar_rule_id', $selectedGrammarRuleId) === $rule->id)>{{ $rule->title }}</option>
        @endforeach
    </select>
    <label for="is_completed">
        <input type="checkbox" id="is_completed" name="is_completed" value="1" @checked(old('is_completed', true))>
        Completed
    </label>
    <button type="submit">Save</button>
</form>
@endsection
