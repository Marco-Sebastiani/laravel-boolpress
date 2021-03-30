@extends('layouts.dashboard')

@section('title', 'gestione post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">

                <form method="post" action="{{route('post.update', $post)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Titolo del post</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
                    </div>
                    @if ($post->cover)
                        <p>Immagine inserita</p>
                        <img class="w-100" src="{{asset('storage/'.$post->cover)}}" alt="{{$post->title}}">

                        @else
                            <p><strong>Immagine non presente</strong></p>
                    @endif

                    <div class="form-group">
                        <label for="image">Carica l'immagine</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
        
                    <div class="form-group">
                        <label for="content">Contenuto del post</label>
                        <textarea class="form-control" name="content" id="content" rows="10">{{$post->content}}</textarea>
                    </div>

                    @foreach ($tags as $tag)
                        
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tags[]" value="{{$tag->id}}" {{ $post->tags->contains($tag->id) ? 'checked' : ''}}>
                        <label class="form-check-label" for="exampleCheck1">{{$tag->name}}</label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection