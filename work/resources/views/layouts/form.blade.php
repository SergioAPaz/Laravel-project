<form role="form" method="POST" action="{{ url('noticias') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<input type="text" name="txtGetEmailUser" class="hide" value="{{{ isset(Auth::user()->name) ? Auth::user()->email : Auth::user()->email }}}">
  <div class="form-group">

  <!--Mensaje de confirmacion de salvado exitoso-->
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
      @endforeach
    </div> <!-- end .flash-message -->

    <label for="exampleInputEmail1">Carpeta</label>
    <input type="text" class="form-control" name="txtCarpeta" placeholder="Carpeta">
    <p class="help-block">Si desea guardar en una carpeta ya existente solo coloque el nombre o bien cree una nueva carpeta.</p>
    @if($errors->has('txtCarpeta'))
        <span class="help-block" style="color:red">
            <strong>{{ $errors->first('txtCarpeta') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Encabezado</label>
    <input type="text" class="form-control" name="txtTitulo" placeholder="Titulo">
    @if($errors->has('txtTitulo'))
        <span class="help-block" style="color:red">
            <strong>{{ $errors->first('txtTitulo') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <textarea type="text" class="form-control" name="txtDescripcion" placeholder="Descripcion"></textarea>
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

    

  <hr>
  <button type="submit" class="btn btn-primary pull-right">Agregar</button>
</form>