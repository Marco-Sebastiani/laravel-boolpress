@extends('layouts.dashboard')

@section('title', 'home posts')

@section('content')
    <div class="container">
        <h4>HOME POSTS</h4>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <a class="btn btn-primary" href="{{route('post.create')}}">Inserisci un nuovo post</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>User id</th>
                    <th>Created At</th>
                    <th>Update At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a href="{{ route('post.show', $post->id)}}" class="btn btn-info">Details</a>
                        <a href="{{ route('post.edit', $post->id)}}" class="btn btn-warning">Change</a>
                        <form action="{{ route('post.destroy', $post)}}" method="post" class="d-inline-block delete-item">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection