@extends('layout')
@section('content')

@extends('navbar')
@if(Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Genre</th>
        <th scope="col">Year</th>
        <th scope="col">Poster</th>
        <td scope="col">Actions</td>
      </tr>
    </thead>
    <tbody>
        @foreach ($movies as $movie)
        <tr>
            <th scope="row">{{ $count++ }}</th>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->genre }}</td>
            <td>{{ $movie->release_year }}</td>
            <td><img src="{{ asset('uploads/'. $movie->poster )}}" width="60" height="60" class="img-thumbnail"/></td>
            <td>
                <a href="{{ route('movie.show', $movie->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('movie.destroy', $movie->id) }}" style="display: inline-block">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Movie ?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
  </table>
  {!! $movies->links() !!}
@endsection
