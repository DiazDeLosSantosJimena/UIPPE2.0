<!-- MODAL MESES CON REGISTROS START -->
@foreach ($areasconMeses as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_areasmetas }}">{{ $meta->meses_c }}</div>
            </div>
            <div class="modal-body">
                <form action="{{ route('calendUpdate', ['id' => $meta->id_areasmetas]) }}" method="POST" enctype="multipart/form-data" onclick="sumaFormulario(this); validacion(this);" id="{{ $meta->id_meta }}">
                    {{ csrf_field('PATCH') }}
                    {{ method_field('PUT') }}
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="enero" class="form-control" placeholder="Asignar la cantidad de Enero" value="{{ $meta -> m_enero }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="febrero" class="form-control" placeholder="Asignar la cantidad de Febrero" value="{{ $meta -> m_febrero }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="marzo" class="form-control" placeholder="Asignar la cantidad de Marzo" value="{{ $meta -> m_marzo }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" name="abril" class="form-control" placeholder="Asignar la cantidad de Abril" value="{{ $meta -> m_abril }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="mayo" class="form-control" placeholder="Asignar la cantidad de Mayo" value="{{ $meta -> m_mayo }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Junio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="junio" class="form-control" placeholder="Asignar la cantidad de Junio" value="{{ $meta -> m_junio }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="julio" class="form-control" placeholder="Asignar la cantidad de Julio" value="{{ $meta -> m_julio }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" name="agosto" class="form-control" placeholder="Asignar la cantidad de Agosto" value="{{ $meta -> m_agosto }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-x3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="septiembre" class="form-control" placeholder="Asignar la cantidad de Septiembre" value="{{ $meta -> m_septiembre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="octubre" class="form-control" placeholder="Asignar la cantidad de Octubre" value="{{ $meta -> m_octubre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="noviembre" class="form-control" placeholder="Asignar la cantidad de Noviembre" value="{{ $meta -> m_noviembre }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="diciembre" class="form-control" placeholder="Asignar la cantidad de Diciembre" value="{{ $meta -> m_diciembre }}">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input class="form-control" type="hidden" name="registro" value="{{ auth()->user()->id }}" style="display: none;">
                <input class="form-control" type="hidden" name="area_meta" value="{{ $meta->id_areasmetas }}" style="display: none;">
                <input class="form-control" type="hidden" name="cantidad" id="cantidad{{ $meta->id_meta }}" value="{{ $meta->meses_c }}" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save{{ $meta->id_meta }}">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- SCRIPT para la validación de los modales START -->
<script>
    function validacion(formulario) {
        const cantidadEstablecida = {{ $meta->meses_c }};
        const nuevaCantidad = formulario.parentElement.parentElement.lastElementChild.querySelector(`#cantidad${formulario.id}`);

        if(nuevaCantidad > cantidadEstablecida){
            
        }
    }
</script>
<!-- SCRIPT para la validación de los modales END -->
@endforeach
<!-- MODAL MESES CON REGISTRO EN MESES END -->

<!-- MODAL MESES SIN REGISTRO EN MESES START -->
@foreach ($areassinMeses as $meta)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Asignar entrega por Mes</h1>
                <div style="margin-left: 180px;" id="sumaTotal{{ $meta->id_meta }}">50</div>
            </div>
            <div class="modal-body">
                <form action="{{ route('calendarizars.store') }}" method="POST" enctype="multipart/form-data" onclick="sumaFormulario(this);" id="{{ $meta->id_meta }}">
                    {!! csrf_field() !!}
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Enero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="enero" class="form-control" placeholder="Asignar la cantidad de Enero" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Febrero:</label>
                        <div class="col-sm-9">
                            <input type="number" name="febrero" class="form-control" placeholder="Asignar la cantidad de Febrero" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Marzo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="marzo" class="form-control" placeholder="Asignar la cantidad de Marzo" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Abril:</label>
                        <div class="col-sm-9">
                            <input type="number" name="abril" class="form-control" placeholder="Asignar la cantidad de Abril" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Mayo:</label>
                        <div class="col-sm-9">
                            <input type="number" name="mayo" class="form-control" placeholder="Asignar la cantidad de Mayo" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Junio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="junio" class="form-control" placeholder="Asignar la cantidad de Junio" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Julio:</label>
                        <div class="col-sm-9">
                            <input type="number" name="julio" class="form-control" placeholder="Asignar la cantidad de Julio" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Agosto:</label>
                        <div class="col-sm-9">
                            <input type="number" name="agosto" class="form-control" placeholder="Asignar la cantidad de Agosto" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Septiembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="septiembre" class="form-control" placeholder="Asignar la cantidad de Septiembre" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Octubre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="octubre" class="form-control" placeholder="Asignar la cantidad de Octubre" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Noviembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="noviembre" class="form-control" placeholder="Asignar la cantidad de Noviembre" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabel" class="col-sm-3 col-form-label">Diciembre:</label>
                        <div class="col-sm-9">
                            <input type="number" name="diciembre" class="form-control" placeholder="Asignar la cantidad de Diciembre" value="0">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input class="form-control" type="text" name="registro" value="{{ auth()->user()->id }}" style="display: none;">
                <input class="form-control" type="text" name="area_meta" value="{{ $meta->id_areasmetas }}" style="display: none;">
                <input class="form-control" type="text" name="cantidad" id="cantidad{{ $meta->id_meta }}" value="0" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save{{ $meta->id_areasmetas }}">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- SCRIPT para la suma dinamica de los modales START -->
<script>
    function sumaFormulario(formulario) {
        //  Ubica el registro en la tabla y selecciona la columna con la cantidad propuesta anual
        const impresionTabla = String(`cantEntrega${formulario.id}`);
        const inputElements = formulario.querySelectorAll('input[type="number"]');
        const cantidad = document.getElementById(String(`cantidad${formulario.id}`));

        inputElements.forEach(inputElement => {
            inputElement.addEventListener('input', () => {
                //  Calcular la cantidad total
                let CantidadTotal = 0;
                inputElements.forEach(inputElement => {
                    const valorActual = parseInt(inputElement.value, 10);
                    if (!isNaN(valorActual)) {
                        CantidadTotal += valorActual;
                    }
                });
                formulario.parentElement.parentElement.firstElementChild.querySelector('div').textContent = CantidadTotal;
                cantidad.value = CantidadTotal;
                document.getElementById(impresionTabla).textContent = CantidadTotal;
            });
        });
    }
</script>
<!-- SCRIPT para la suma dinamica de los modales END -->
<!-- MODAL SIN REFISTRO EN MESES END -->