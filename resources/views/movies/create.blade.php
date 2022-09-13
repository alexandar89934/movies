@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    <h2>New Movie</h2>
    <form action="/movies" method="post">

      
    @csrf


  <div class="mb-3"> 
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>

  <div class="mb-3"> 
    <label for="genre" class="form-label">Genre</label>
    <input type="text" class="form-control" id="genre" name="genre">
  </div>

  <div class="mb-3"> 
    <label for="director" class="form-label">Director</label>
    <input type="text" class="form-control" id="director" name="director">
  </div>

  <div class="mb-3"> 
    <label for="published_at" class="form-label">Published At</label>
    <input type="date" class="form-control" id="published_at" name="published_at">
  </div>

  <div class="mb-3"> 
    <label for="storyline" class="form-label">Storyline</label>
    <textarea class="form-control" id="storyline" rows="3" name="storyline"></textarea>
    
  </div>

  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    </div>
</div>
@endsection
       
  