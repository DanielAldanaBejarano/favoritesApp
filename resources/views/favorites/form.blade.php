<h1> {{$mode}} Favoritos</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>

    
</div>

    
@endif

<div class="form-group">
<label for="Título"> Título </label>
<input type="text" class="form-control" name="Título" value="{{ isset($favorite->Título)?$favorite->Título:old('Título') }}" id="Título"> 
<br>
</div>

<div class="form-group"> 
<label for="Tema"> Tema </label>
<input type="text" class="form-control" name="Tema" value="{{ isset($favorite->Tema)?$favorite->Tema:old('Tema') }}" id="Tema"> 
<br>
</div>

<div class="form-group">     
<label for="URL"> URL </label>
<input type="text" class="form-control" name="URL" value="{{ isset($favorite->URL)?$favorite->URL:old('URL') }}" id="URL"> 
<br>
</div>

<div class="form-group"> 
<input type="submit" class="btn btn-success" value="{{$mode}} favorito"> 
<a href="{{ url('favorites') }}" class="btn btn-info"> Regresar </a>
<br>
</div>

    