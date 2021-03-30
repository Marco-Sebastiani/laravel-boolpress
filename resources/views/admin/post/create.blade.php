@extends('layouts.dashboard')

@section('title', 'gestione post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="title">Titolo del post</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="image">Carica l'immagine</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="inputBody">Contenuto del post</label>
                        <textarea class="form-control" name="content" rows="10" id="inputBody"></textarea>
                    </div>
                    @foreach ($tags as $tag)
                        
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="tags[]" value="{{$tag->id}}">
                        <label class="form-check-label" for="exampleCheck1">{{$tag->name}}</label>
                    </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection