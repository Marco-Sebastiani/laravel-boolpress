@extends('layouts.app')
@section('title','elenco post')
    
@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="card  mb-2 bg-dark text-light text-center shadow">
            <div class="card-header">
                {{$post->title}}
            </div>
            <div class="card-body">
                <p class="lead text-justify">{{$post->content}}</p>
                <p class="d-flex justify-content-around">
                    <em>
                        <i class="fas fa-info-circle"></i>
                        {{$post->user->name}}
                    </em>
                    <span>
                        <i class="far fa-calendar-alt"></i>
                        {{$post->created_at}}
                    </span>
                </p>
                <a href="{{ route('guest.posts.show', $post->slug) }}" class="btn btn-primary">Details</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
