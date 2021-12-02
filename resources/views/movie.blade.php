@extends('layout')
@section('content')

@extends('navbar')

<div>
    @if($data)
        @foreach ($data as $movie)
            <div class="image" style="display: flex;justify-content:center"><img src="{{ asset('uploads/'. $movie->poster )}}" width="150" height="150" class="img-thumbnail"/></div>
            <p>{{ $movie->title }}</p>
            <p>{{ $movie->genre }} | {{ $movie->release_year }}</p>
        @endforeach
    @endif
</div>
@endsection
