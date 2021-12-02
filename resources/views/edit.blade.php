@extends('layout')
@section('content')
@extends('navbar')
<h1>Edit Movie</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        There are Some Problem
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf {{ method_field('PUT') }}
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
    <img src={{ url('/uploads/'. $movie->poster) }} style="width: 70;float: right;margin-top: -53px;"/>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
</form>
@endsection
