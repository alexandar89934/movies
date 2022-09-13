@extends ('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card mt-2">
    <div class="row"><h4>Title: {{$movie->title}}</h4></div>
    <div class="row"><h4>Gender: {{$movie->genre}}</h4></div>
    <div class="row"><h4>Director: {{$movie->director}}</h4></div>
    <div class="row"><h4>Published At: {{$movie->published_at}}</h4></div>
    <div class="row"><p>Storyline: {{$movie->storyline}}</p></div>

</div>
            <ul class="list-group list-group-flush">
                @if($movie->comments->count() > 0)
                    @foreach($movie->comments as $comment)
                    <li class="list-group-item">
                       <p>{{$comment->published_at}}</p>
                       <p>{{ $comment->content }}</p>
                       <hr>
                    </li>
                       </ul>
                       @endforeach

          
                @else
                <p>Jos uvek nema komentara na ovaj film</p>
                @endif
                       <form action="{{$movie->id}}/comments" method="POST">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{$movie->id}}">
                        <input type="hidden" name="published_at" value="{{ date('Y-m-d') }}">
                        <div class="container">
                            <div class="row justify-content-center">
                        <textarea name="content" id="content" cols="40" rows="5"></textarea>
                        <button class="btn btn-primary" type="submit">Post Comment</button>
                        </div>    
</div>
                    </form>
                  
            
        
                      
                    
               
    




</div>
</div>
</div>

@endsection

