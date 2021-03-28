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
                <form method="post" action="{{route('post.store')}}">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="title">Titolo del post</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="inputBody">Contenuto del post</label>
                        <textarea class="form-control" name="content" rows="10" id="inputBody"></textarea>
                    </div>
        {{-- 
                    <div class="form-group form-check">
                        <label class="form-check-label" for="exampleCheck1">Insert</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection