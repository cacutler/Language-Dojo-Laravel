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
