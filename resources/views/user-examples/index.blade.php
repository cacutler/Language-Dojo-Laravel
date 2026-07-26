@extends('master')
@section('title', 'My Examples')
@section('content')
<h1>My Examples</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
<a href="{{ route('web.user-examples.create') }}">Add My Example</a>
<ul>
    @foreach ($userExamples as $userExample)
        <li>
            <strong>{{ $userExample->custom_phrase }}</strong>
            <span>{{ $userExample->grammarRule?->title }}</span>
            @can('update', $userExample)
                <a class="edit" href="{{ route('web.user-examples.edit', $userExample) }}">Edit</a>
            @endcan
            @can('delete', $userExample)
                <form class="delete" method="POST" action="{{ route('web.user-examples.destroy', $userExample) }}" onsubmit="return confirm('Delete this example?')">
                    @csrf
                    @method('DELETE')
                    <button class="submit" type="submit">Delete</button>
                </form>
            @endcan
        </li>
    @endforeach
</ul>
@endsection
