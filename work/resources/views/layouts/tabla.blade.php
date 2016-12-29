
<div class="panel panel-default">
    <div class="panel-body">
        <p class="alert fondo456" style="font-size: 20px;background-color: #2579A9;color: #ffffff"><span>Recordatorios publicados</span></p>
        <div class="table-responsive" style="border-radius: 10px;margin-top: 12px">
            <table class="table   table-hover  tab" id="regTable"  style="background-color: #ffffff;text-align: center;vertical-align: middle;">
            @if(isset($Noticias))
                <thead style="">
                    <th>Encabezado</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                </thead>
                <tbody>
                    @foreach($Noticias as $n)
                    <tr>
                        <td>{{ $n->Titulo }}</td>
                        <td>{{ $n->Descripcion }}</td>
                       <!-- <td>{{(empty($n->UrlImg)?'Vacia':'')}}</td>-->
                        @if(!empty($n->UrlImg))
                         <td>
                            <img src="imgProductos/{{ $n -> UrlImg }}" alt="Responsive image" class="img-responsive" style="max-width:70px;height:auto;display: block;margin-left: auto;margin-right: auto;">
                        </td>
                        @else
                        <td>Vacia</td>
                        @endif
                        
                       <!-- <td>
                            <img src="imgProductos/{{ $n -> UrlImg }}" alt="Responsive image" class="img-responsive" style="max-width:70px;height:auto">
                        </td>-->
                    </tr>
                    @endforeach
                </tbody>
            @endif
            </table>

        </div>
    </div>
</div>

