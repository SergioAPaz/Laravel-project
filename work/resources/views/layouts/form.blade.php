<form role="form" method="POST" action="{{ url('noticias')}}">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" class="form-control" name="txtTitulo" placeholder="Titulo">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <input type="text" class="form-control" name="txtDescripcion" placeholder="Descripcion">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File image</label>
    <input type="file" name="UrlImg">
    <p class="help-block">Imagen de producto a cargar.</p>
  </div>
  <hr>
  <button type="submit" class="btn btn-primary pull-right">Agregar</button>
</form>