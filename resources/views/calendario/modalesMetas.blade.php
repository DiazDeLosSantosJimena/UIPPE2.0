<!-- MODAL MESES CON REGISTROS START -->
@foreach ($areasconMeses as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_areasmetas }}"></div>
            </div>
            <div class="modal-body">
                <form action="{{ route('calendUpdate', ['id' => $meta->id_areasmetas]) }}" method="POST" enctype="multipart/form-data"> 
                {{ csrf_field('PATCH') }}
                {{ method_field('PUT') }}
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="enero" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum0{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Enero" value="{{ $meta -> m_enero }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="febrero" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum1{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Febrero" value="{{ $meta -> m_febrero }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="marzo" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum2{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Marzo" value="{{ $meta -> m_marzo }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" name="abril" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum3{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Abril" value="{{ $meta -> m_abril }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="mayo" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum4{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Mayo" value="{{ $meta -> m_mayo }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Junio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="junio" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum5{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Junio" value="{{ $meta -> m_junio }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="julio" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum6{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Julio" value="{{ $meta -> m_julio }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" name="agosto" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum7{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Agosto" value="{{ $meta -> m_agosto }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="septiembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum8{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Septiembre" value="{{ $meta -> m_septiembre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="octubre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum9{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Octubre" value="{{ $meta -> m_octubre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="noviembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum10{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Noviembre" value="{{ $meta -> m_noviembre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="diciembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum11{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Diciembre" value="{{ $meta -> m_diciembre }}">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input class="form-control" type="hidden" name="registro" value="{{ auth()->user()->id }}" style="display: none;">
                <input class="form-control" type="hidden" name="area_meta" value="{{ $meta->id_areasmetas }}" style="display: none;">
                <input class="form-control" type="hidden" name="cantidad" id="cantidad{{ $meta->id_areasmetas }}" value="" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save{{ $meta->id_areasmetas }}">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- SCRIPT para la suma dinamica de los modales START -->
<script>
    window.addEventListener('load', () => {
        var canti = document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").innerHTML = "{{ $meta->meses_c }}";
        document.querySelector("#cantidad{{ $meta->id_areasmetas }}").value = {{ $meta->meses_c }};
    });

    var sumaT = 0;
    suma{{ $meta->id_areasmetas }} = () => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.querySelector(".sum"+i+"{{ $meta->id_areasmetas }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);
        }
        if(parseInt(sumaT) < {{ $meta -> cantidad_c }}){
            document.getElementById("save{{ $meta->id_areasmetas }}").className = "btn btn-primary disabled";
        }else if(sumaT >= {{ $meta -> cantidad_c }}){
            document.getElementById("save{{ $meta->id_areasmetas }}").className = "btn btn-primary";
        }else{
            
        }
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = "";
        document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").innerHTML = sumaT;
        document.querySelector("#cantidad{{ $meta->id_areasmetas }}").setAttribute('value', sumaT);;
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = sumaT;
    };

</script>
<!-- SCRIPT para la suma dinamica de los modales END -->
@endforeach
<!-- MODAL MESES CON REGISTRO EN MESES END -->

<!-- MODAL MESES SIN REGISTRO EN MESES START -->
@foreach ($areassinMeses as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_areasmetas }}">50</div>
            </div>
            <div class="modal-body">
                <form action="{{ route('calendarizars.store') }}" method="POST" enctype="multipart/form-data"> 
                {!! csrf_field() !!}
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="enero" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum0{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Enero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="febrero" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum1{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Febrero">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="marzo" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum2{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Marzo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" name="abril" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum3{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Abril">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="mayo" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum4{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Mayo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Junio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="junio" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum5{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Junio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="julio" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum6{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Julio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" name="agosto" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum7{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Agosto">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="septiembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum8{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Septiembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="octubre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum9{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Octubre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="noviembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum10{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Noviembre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="diciembre" onkeyup="suma{{ $meta->id_areasmetas }}()" class="form-control sum11{{ $meta->id_areasmetas }}" placeholder="Asignar la cantidad de Diciembre">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input class="form-control" type="text" name="registro" value="{{ auth()->user()->id }}" style="display: none;">
                <input class="form-control" type="text" name="area_meta" value="{{ $meta->id_areasmetas }}" style="display: none;">
                <input class="form-control cantidad{{ $meta->id_areasmetas }}" type="text" name="cantidad" value="0" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save{{ $meta->id_areasmetas }}">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- SCRIPT para la suma dinamica de los modales START -->
<script>
    var sumaT = 0;
    suma{{ $meta->id_areasmetas }} = () => {
        sumaT = 0;
        var input = new Array;
        for(var i=0; i<12; i++){
            input.push(document.querySelector(".sum"+i+"{{ $meta->id_areasmetas }}").value || 0);
            sumaT = parseInt(sumaT)+parseInt(input[i]);
        }

        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = "";
        document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").innerHTML = sumaT;
        document.querySelector(".cantidad{{ $meta->id_areasmetas }}").setAttribute('value', sumaT);
        document.getElementById("sumaTotal{{ $meta->id_areasmetas }}").innerHTML = sumaT;

        if(parseInt(sumaT) < document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").value){
            document.getElementById("save{{ $meta->id_areasmetas }}").className = "btn btn-primary disabled";
        }else if(sumaT >= document.querySelector("#cantEntrega{{ $meta->id_areasmetas }}").value){
            document.getElementById("save{{ $meta->id_areasmetas }}").className = "btn btn-primary";
        }else{
            
        }

    };

</script>
<!-- SCRIPT para la suma dinamica de los modales END -->
@endforeach
<!-- MODAL SIN REFISTRO EN MESES END -->