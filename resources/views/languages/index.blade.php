@extends('master')
@section('title', 'Languages')
@section('content')
<h1>Languages</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
@can('create', App\Models\Language::class)
    <a href="{{ route('web.languages.create') }}">Add Language</a>
@endcan
<ul>
    @foreach ($languages as $language)
        <li>
            <strong>{{ $language->name }}</strong> ({{ $language->code }})
            @can('update', $language)
                <a href="{{ route('web.languages.edit', $language) }}">Edit</a>
            @endcan
            @can('delete', $language)
                <form method="POST" action="{{ route('web.languages.destroy', $language) }}" onsubmit="return confirm('Delete this language?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </li>
    @endforeach
</ul>
@endsection
