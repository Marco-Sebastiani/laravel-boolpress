@extends('layouts.app')

@section('title', 'contatti')

@section('content')
<div class="container">
    <form action="{{route('guest.contatti.inviati')}}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="nomeUtente">Nome</label>
            <input type="text" name="name" class="form-control" id="nomeUtente">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
    
        <div class="form-group">
            <label for="messaggioUtente">Messaggio</label>
            <textarea class="form-control" id="messaggioUtente" rows="3" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection