@extends('master')
@section('title', 'System Examples')
@section('content')
<h1>System Examples</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
@if ($grammarRule)
    <p>For grammar rule: {{ $grammarRule->title }}</p>
@endif
@can('create', App\Models\SystemExample::class)
    @if ($grammarRule)
        <a href="{{ route('web.grammar-rules.system-examples.create', $grammarRule) }}">Add System Example</a>
    @else
        <div>
            <p>Create a grammar rule for a course:</p>
            @foreach (App\Models\GrammarRule::query()->orderBy('title')->get() as $grammarRule)
                <a href="{{ route('web.grammar-rules.system-examples.create', $grammarRule) }}">Add System Example to {{ $grammarRule->title }}</a>
            @endforeach
        </div>
    @endif
@endcan
<ul>
    @foreach ($systemExamples as $systemExample)
        <li>
            <strong>{{ $systemExample->phrase }}</strong>
            <span>{{ $systemExample->grammarRule?->title }}</span>
            @can('update', $systemExample)
                <a href="{{ route('web.system-examples.edit', $systemExample) }}">Edit</a>
            @endcan
            @can('delete', $systemExample)
                <form method="POST" action="{{ route('web.system-examples.destroy', $systemExample) }}" onsubmit="return confirm('Delete this example?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </li>
    @endforeach
</ul>
@endsection
