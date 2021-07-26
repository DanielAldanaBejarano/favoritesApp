@extends('layouts.app')
@section('content')

<H5 style="text-align: center">Hola {{ Auth::user()->name }}, este es tu listado de Favoritos:</H5>
<div class="container">

    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif



<table class="table-responsive-md table-light" style="widht: 10%">

    <thead class="thead-dark">
        <tr>                     
            <th>Título</th>
            <th>Tema</th>    
            <th>URL</th>           
            <th>Opciones</th>
        </tr>
    </thead>
    
    <tbody>
        <!-- Query all registers -->
        @foreach( $favorites as $favorite )
        <tr> 
            <td> <a style="color: black; margin: 5%;" href="{{ $favorite->URL }}">{{ $favorite->Título }}</a> </td>
            <td> <a style="color: black" href="{{ $favorite->URL }}">{{ $favorite->Tema }}</a> </td>
            <td> <a style="color: black" href="{{ $favorite->URL }}">{{ $favorite->URL }}</a> </td>
             
            <td>             
            <a href="{{ url('/favorites/'.$favorite->id.'/edit')}}" class="btn btn-info">
                Editar
            </a>            
            <form action="{{ url('/favorites/'.$favorite->id)}}" class="d-inline" method="post">
            <!-- Key -->
            @csrf
            {{ method_field('DELETE')}}
            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro quieres eliminar {{ $favorite->Título }} de tu colección de favoritos?')" value="Eliminar">
            </form> 
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>

{!! $favorites->links() !!}


<a href="{{ url('favorites/create') }}" class="btn btn-success m-5"> Crear un nuevo registro </a>

</div>
@endsection