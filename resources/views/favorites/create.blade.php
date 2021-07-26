@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/favorites') }}" method="post">
<!-- Security key to storage -->
@csrf
@include('favorites.form', ['mode'=>'Crear'])  

</form>
</div>
@endsection