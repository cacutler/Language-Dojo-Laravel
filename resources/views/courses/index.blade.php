@extends('master')
@section('title', 'Courses')
@section('content')
<h1>Courses</h1>
@if (session('status'))
    <p>{{ session('status') }}</p>
@endif
@if ($language)
    <p>For language: {{ $language->name }}</p>
@endif
@can('create', App\Models\Course::class)
    @if ($language)
        <a href="{{ route('web.languages.courses.create', $language) }}">Add Course</a>
    @else
        <div>
            <p>Create a course for a language:</p>
            @foreach (App\Models\Language::query()->orderBy('name')->get() as $languageOption)
                <a href="{{ route('web.languages.courses.create', $languageOption) }}">Add Course to {{ $languageOption->name }}</a>
            @endforeach
        </div>
    @endif
@endcan
<ul>
    @foreach ($courses as $course)
        <li>
            <strong>{{ $course->title }}</strong>
            <span>{{ $course->language?->name }}</span>
            @can('update', $course)
                <a href="{{ route('web.courses.edit', $course) }}">Edit</a>
            @endcan
            @can('delete', $course)
                <form method="POST" action="{{ route('web.courses.destroy', $course) }}" onsubmit="return confirm('Delete this course?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </li>
    @endforeach
</ul>
@endsection
