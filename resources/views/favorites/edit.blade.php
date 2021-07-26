@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/favorites/'.$favorite->id)}}" method="post">
    @csrf
    {{ method_field('PATCH')}}
    @include('favorites.form', ['mode'=>'Editar'])
</form>
</div>
@endsection
