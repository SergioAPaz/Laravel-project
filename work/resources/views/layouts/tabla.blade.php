<style> 
.two-fields {
  width:100%;
}
.two-fields .input-group {
  width:100%;
}
.two-fields input {
  width:50% !important;
}
</style>
<div class="panel panel-default">
    <div class="panel-body">
        <p class="alert fondo456" style="font-size: 20px;background-color: #2579A9;color: #ffffff"><span>Recordatorios publicados</span></p>
        <div class="table-responsive" style="border-radius: 10px;margin-top: 12px">
            <table class="table   table-hover  tab" id="regTable"  style="background-color: #ffffff;text-align: center;vertical-align: middle;">
            @if(isset($Noticias))
                <thead style="">
                    <th>Actualizado</th>
                    <th>Carpeta</th>
                    <th>Encabezado</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($Noticias as $n)
                        @if(Auth::user()->email == $n->Propietary ) <!--//ARROJA SOLO LOS RECORDATORIOS DEL USUARIO LOGUEADO-->
                            <tr>
                                <td>{{ $n->updated_at }}</td>
                                <td>{{ $n->Carpeta }}</td>
                                <td>{{ $n->Titulo }}</td>
                                <td>{{ $n->Descripcion }}</td>
                                
                            <!-- <td>{{(empty($n->UrlImg)?'Vacia':'')}}</td>-->
                                @if(!empty($n->UrlImg))
                                <td>
                                    <img src="imgProductos/{{ $n -> UrlImg }}" alt="Responsive image" class="img-responsive" style="max-width:60px;border-radius:5px;height:auto;display: block;margin-left: auto;margin-right: auto;">
                                </td>
                                @else
                                <td>Vacia</td>
                                @endif
                                <td>
                                    <div class="form-group two-fields">
                                        <a href="noticias/{{ $n->id }}/edit" class="btn btn-warning btn-xs">Modificar</a>
                                        <form action="{{ route('noticias.destroy', $n->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger btn-xs" value="Eliminar" style="margin-top:7px"></input>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            @endif
            </table>

        </div>
    </div>
</div>

