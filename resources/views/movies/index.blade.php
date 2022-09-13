@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <h2>All movies</h2>
                <ul class="list-group list-group-flush">
                    @foreach($movies as $movie)
                    <li class="list-group-item">
                       <h4>{{$movie->id}},  <a href="{{ route('movies.show', $movie->id) }}" >{{$movie->title}}</a>
                       
                       <span class="float-end"> 
                       <form action="{{ route('movies.edit', $movie->id) }}">
                        <button class="btn btn-warning me-2">Edit</button>
                       </form> 
                       <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </span>
                       
                    </h4>
                       <p>{{    Str::limit($movie->storyline,80,'...' ) }}</p>
                    @endforeach
                </ul>
                {{ $movies->links() }} 
            </div>
            
           
         
      
        </div>
       
    </div>

</div>

@endsection
