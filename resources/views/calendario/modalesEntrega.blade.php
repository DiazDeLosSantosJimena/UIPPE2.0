<!-- Modales SIN registros de entrega START -->
@foreach($metasModalS as $meta)
@if($session_area == $meta->area_id || $session_area == 0)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" onclick="modal(this)">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Entrega por Mes</h1>
            <div id="sumaTotal">0 / {{ $meta->cantidad_c }}</div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 my-1 mx-2">
                        <strong><p id="clave">Clave: </strong>{{ $meta->id_areasmetas }}</p>
                    </div>
                    <div class=" col-6 my-1 mx-2">
                        <strong><p>Nombre de la Meta: </strong>{{ $meta->nombreM }}</p>
                    </div>
                    <div class="col-auto my-1 mx-2">
                        <strong><p>Unidad de Medida: </strong>{{ $meta->medida }}</p>
                    </div>
                </div>
                <form action="{{ route('entregasNew') }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="table-responsive table-responsive-sm my-4">
                    <table class="table align-middle table-sm table-bordered border-dark">

                        <thead class="table-success table-bordered border-dark">
                            <!-- Campos en tabla metas -->
                            <tr>
                                <th class="text-center" colspan="2">Enero</th>
                                <th class="text-center" colspan="2">Febrero</th>
                                <th class="text-center" colspan="2">Marzo</th>
                                <th class="text-center" colspan="2">Abril</th>
                                <th class="text-center" colspan="2">Mayo</th>
                                <th class="text-center" colspan="2">Junio</th>
                                <th class="text-center" colspan="2">Julio</th>
                                <th class="text-center" colspan="2">Agosto</th>
                                <th class="text-center" colspan="2">Septiembre</th>
                                <th class="text-center" colspan="2">Octubre</th>
                                <th class="text-center" colspan="2">Noviembre</th>
                                <th class="text-center" colspan="2">Diciembre</th>
                            </tr>
                        </thead>
                        <thead class="table-bordered border-dark">
                            <tr>
                                <th class="text-center"><p class="mx-2 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $meta->m_enero }}</td>
                                <td class="text-center table-success"><input type="number" style="background-color:transparent;" name="enero" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_febrero }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="febrero" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_marzo }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="marzo" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_abril }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="abril" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_mayo }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="mayo" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_junio }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="junio" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_julio }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="julio" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_agosto }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="agosto" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_septiembre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="septiembre" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_octubre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="octubre" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_noviembre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="noviembre" class="form-control border-0"></td>
                                <td class="text-center">{{ $meta->m_diciembre }}</td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="diciembre" class="form-control border-0"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="24"><div id="valorRecuadro"></div></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <input class="form-control" type="hidden" name="registro" value="{{ auth()->user()->id }}" style="display: none;">
                <input class="form-control" type="hidden" name="area_meta" value="{{ $meta->id_areasmetas }}" style="display: none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save{{ $meta->id_areasmetas }}">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endif
@endforeach
<!-- Modales SIN registros de entrega END -->

<!-- Modales CON registros de entrega START -->
@foreach($metasCompM as $meta)
@if($session_area == $meta->area_id || $session_area == 0)
<div class="modal fade" id="modalshow{{ $meta->id_areasmetas }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" onclick="modal(this)">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Entrega por Mes</h1>
            <div id="sumaTotal">{{ $meta->cantidad_m }} / {{ $meta->cantidad_c }}</div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 my-1 mx-2">
                        <strong><p id="clave">Clave: </strong>{{ $meta->id_areasmetas }}</p>
                    </div>
                    <div class=" col-6 my-1 mx-2">
                        <strong><p>Nombre de la Meta: </strong>{{ $meta->nombreM }}</p>
                    </div>
                    <div class="col-auto my-1 mx-2">
                        <strong><p>Unidad de Medida: </strong>{{ $meta->medida }}</p>
                    </div>
                </div>
                <form action="{{ route('entregasUpdate', ['id' => $meta->id_entregas]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field('PATCH') }}
                {{ method_field('PUT') }}
                <div class="table-responsive table-responsive-sm my-4">
                    <table class="table align-middle table-sm table-bordered border-dark">

                        <thead class="table-success table-bordered border-dark">
                            <!-- Campos en tabla metas -->
                            <tr>
                                <th class="text-center" colspan="2">Enero</th>
                                <th class="text-center" colspan="2">Febrero</th>
                                <th class="text-center" colspan="2">Marzo</th>
                                <th class="text-center" colspan="2">Abril</th>
                                <th class="text-center" colspan="2">Mayo</th>
                                <th class="text-center" colspan="2">Junio</th>
                                <th class="text-center" colspan="2">Julio</th>
                                <th class="text-center" colspan="2">Agosto</th>
                                <th class="text-center" colspan="2">Septiembre</th>
                                <th class="text-center" colspan="2">Octubre</th>
                                <th class="text-center" colspan="2">Noviembre</th>
                                <th class="text-center" colspan="2">Diciembre</th>
                            </tr>
                        </thead>
                        <thead class="table-bordered border-dark">
                        <tr>
                                <th class="text-center"><p class="mx-2 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                                <th class="text-center"><p class="mx-3 my-1">P</p></th>
                                <th class="text-center table-success">A</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr_entrega" data-index="{{ $meta->id_areasmetas }}">
                                <td class="text-center" data-info="mes"></td>
                                <td class="text-center table-success"><input type="number" style="background-color:transparent;" name="enero" class="form-control border-0" value="{{ $meta->m_enero }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="febrero" class="form-control border-0" value="{{ $meta->m_febrero }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="marzo" class="form-control border-0" value="{{ $meta->m_marzo }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="abril" class="form-control border-0" value="{{ $meta->m_abril }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="mayo" class="form-control border-0" value="{{ $meta->m_mayo }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="junio" class="form-control border-0" value="{{ $meta->m_junio }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="julio" class="form-control border-0" value="{{ $meta->m_julio }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="agosto" class="form-control border-0" value="{{ $meta->m_agosto }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="septiembre" class="form-control border-0" value="{{ $meta->m_septiembre }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="octubre" class="form-control border-0" value="{{ $meta->m_octubre }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="noviembre" class="form-control border-0" value="{{ $meta->m_noviembre }}"></td>
                                <td class="text-center" data-info="mes"></td>
                                <td class="table-success"><input type="number" style="background-color:transparent;" name="diciembre" class="form-control border-0" value="{{ $meta->m_diciembre }}"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="24"><div id="valorRecuadro"></div></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <input class="form-control" type="hidden" name="registro" value="{{ auth()->user()->id }}">
                <input class="form-control" type="hidden" name="area_meta" value="{{ $meta->id_areasmetas }}">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save{{ $meta->id_areasmetas }}">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endif
@endforeach
<!-- Modales CON registros de entrega END -->