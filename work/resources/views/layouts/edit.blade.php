<!--@if(session()->has('msj'))
    <div class="alert alert-success" role="alert">{{ session('msj') }}</div>
@endif-->
@if(session()->has('errormsj'))
    <div class="alert alert-success" role="alert">Error al guardar los datos.</div>
@endif

@if(isset($noticia))
<form role="form" method="POST" action="{{ route('noticias.update', $noticia->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT">
<input type="text" name="img" class="hide" value="{{ $noticia->UrlImg }}">
    {{ csrf_field() }}

  <div class="form-group">
    <label for="exampleInputPassword1">Carpeta</label>
    <input type="text" class="form-control" name="txtCarpeta" value="{{ $noticia->Carpeta }}">
    @if($errors->has('txtCarpeta'))
        <span class="help-block" style="color:red">
            <strong>{{ $errors->first('txtCarpeta') }}</strong>
        </span>
    @endif
  </div>  

  <div class="form-group">
    <label for="exampleInputEmail1">Encabezado</label>
    <input type="text" class="form-control" name="txtTitulo" value="{{ $noticia->Titulo }}">
    @if($errors->has('txtTitulo'))
        <span class="help-block" style="color:red">
            <strong>{{ $errors->first('txtTitulo') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <textarea type="text" class="form-control" name="txtDescripcion">{{ $noticia->Descripcion}}</textarea>
    @if($errors->has('txtDescripcion'))
        <span class="help-block" style="color:red">
            <strong>{{ $errors->first('txtDescripcion') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="exampleInputFile">Imagen</label>
    <input type="file" name="UrlImg">
    <p class="help-block">Imagen a cargar.</p>
  </div>
    <!--Mensaje de confirmacion de salvado exitoso-->
  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

  <hr>
  <button type="submit" class="btn btn-warning pull-right">Modificar</button>
</form>
@endif