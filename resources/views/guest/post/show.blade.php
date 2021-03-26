@extends('layouts.app')
@section('title','dettaglio post')
    
@section('content')
    <div class="container">
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
            </div>
        </div>
    </div>
@endsection