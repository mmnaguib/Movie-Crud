@extends('layout')
@section('content')
@extends('navbar')
<h1>Add New Movie</h1>
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
<form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data" class="createForm">
    @csrf
    <label for="title">title</label>
    <input type="text" class="form-control" id="title" name="title"/>
    <label for="genre">Genre</label>
    <select name="genre" class="form-control">
        <option value="">Select Genre</option>
        @if($genres)
            @foreach ($genres as $genre)
                <option value="{{ $genre }}">{{ $genre }}</option>
            @endforeach
        @endif
    </select>
    <label for="year">Year Release</label>
    <input type="text" class="form-control" id="year" name="year"/>
    <label for="poster">Poster</label>
    <input type="file" class="form-control-file" name="poster" id="poster"/>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
</form>
@endsection
