@extends('layouts.dashboard')

@section('title', 'dettagli post')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>User id</th>
                    <th>Created At</th>
                    <th>Update At</th>
                    <th>Body</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td class="text-justify w-25">{{$post->content}}</td>


                </tr>

            </tbody>
        </table>
    </div>
@endsection