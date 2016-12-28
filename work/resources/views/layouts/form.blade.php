<form role="form" method="POST" action="{{ url('noticias')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" class="form-control" name="txtTitulo" placeholder="Titulo">
    @if($errors->has('txtTitulo'))
        <span class="help-block" style="color:red">
            <strong>{{ $errors->first('txtTitulo') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <input type="text" class="form-control" name="txtDescripcion" placeholder="Descripcion">
    @if($errors->has('txtDescripcion'))
        <span class="help-block" style="color:red">
            <strong>{{ $errors->first('txtDescripcion') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File image</label>
    <input type="file" name="UrlImg">
    <p class="help-block">Imagen de producto a cargar.</p>
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
  <button type="submit" class="btn btn-primary pull-right">Agregar</button>
</form>