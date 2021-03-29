@extends('layouts.app')

@section('title', 'contatti')

@section('content')
<div class="container">
    @if (session('status'))
    <p>{{ session('status')}}</p>
    @endif
</div>
@endsection