@extends('master')
@section('title', 'My Progress')
@section('content')
<h1>My Progress</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
<a href="{{ route('web.progress-tracking.create') }}">Track Progress</a>
<ul>
    @foreach ($progressTracking as $entry)
        <li>
            <strong>{{ $entry->grammarRule?->title }}</strong>
            <span>{{ $entry->is_completed ? 'Completed' : 'In progress' }}</span>
            @can('update', $entry)
                <a href="{{ route('web.progress-tracking.edit', $entry) }}">Edit</a>
            @endcan
            @can('delete', $entry)
                <form method="POST" action="{{ route('web.progress-tracking.destroy', $entry) }}" onsubmit="return confirm('Delete this progress item?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </li>
    @endforeach
</ul>
@endsection
