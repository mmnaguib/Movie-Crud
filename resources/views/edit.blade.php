@extends('layout')
@section('content')
@extends('navbar')
<h1>Edit Movie</h1>
<form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}"/>
    <label for="genre">Genre</label>
    <select name="genre" class="form-control">
        <option value="">Select Genre</option>
        @if($genres)
            @foreach ($genres as $genre)
                @if($genre == $movie->genre)
                    <option value="{{ $genre }}" selected>{{ $genre }}</option>
                @else
                    <option value="{{ $genre }}">{{ $genre }}</option>
                @endif
            @endforeach
        @endif
    </select>
    <label for="year">Year Release</label>
    <input type="text" class="form-control" id="year" name="year" value="{{ $movie->release_year }}"/>
    <label for="poster">Poster</label>
    <input type="file" class="form-control-file" name="poster" id="poster"/>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
</form>
@endsection
