@extends('master')
@section('title', 'Grammar Rules')
@section('content')
<h1>Grammar Rules</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
@if ($course)
    <p>For course: {{ $course->title }}</p>
@endif
<ul>
    @foreach ($grammarRules as $grammarRule)
        <li>
            <strong>{{ $grammarRule->title }}</strong>
            <span>{{ $grammarRule->course?->title }}</span>
            @can('update', $grammarRule)
                <a href="{{ route('web.grammar-rules.edit', $grammarRule) }}">Edit</a>
            @endcan
            @can('delete', $grammarRule)
                <form method="POST" action="{{ route('web.grammar-rules.destroy', $grammarRule) }}" onsubmit="return confirm('Delete this grammar rule?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </li>
    @endforeach
</ul>
@endsection
