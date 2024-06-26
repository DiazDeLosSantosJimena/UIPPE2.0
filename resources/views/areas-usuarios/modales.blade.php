<!-- ADD MODAL START -->
<div class="modal fade" id="modalalta" tabindex="-1" aria-labelledby="modalaltaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Área-usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('areausuario.store')}}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div>
                        <label for="floatingInput">Selecciona un area:</label>
                        <select name="area_id" id="area_id" aria-label="floating label selext example" data-search="true" data-silent-initial-value-set="true">
                            @foreach ($areas as $info)
                            <option value="{{$info->id_area}}">{{$info->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="sidebar-divider">

                    <div>
                        <label for="floatingInput">Selecciona uno o varios usuarios:</label>
                        <select multiple data-search="true" data-silent-initial-value-set="true" name="usuario_id[]">
                            @foreach ($usuarios as $info)
                            <option value="{{ $info->id }}">{{ $info->nombre }} {{$info->app}} {{$info->apm}}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="sidebar-divider">

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="activo" role="switch" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                        </div>
                    </div>
                    <input class="form-control" type="text" name="registro" value="{{ auth()->user()->id }}" style="display: none;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <input type="submit" href="usuarios/store" class="btn btn-success" value="Enviar" />
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ADD MODAL END -->

<!-- SHOW MODAL START -->
@foreach ($modalDetalle as $info)
<div class="modal fade" id="modalshow{{ $info->id_areasusuarios }}" tabindex="-1" aria-labelledby="modalshowLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalshowLabel">Detalles | {{ $info -> clave }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex" style="align-items: center; justify-content: center;">
                <div class="col text-center">
                    <img src="img/post/{{$info->foto }}" alt="{{ $info -> foto }}" style="width: 150px;">
                </div>
                <div class="col">
                    <p><strong>Nombre: </strong><br>{{$info -> nombre .' '. $info->app .' '. $info->apm}}</p>
                    <p><strong>Correo Electrónico: </strong><br>{{ $info -> email }}</p>
                    <p><strong>Fecha de nacimiento: </strong><br>{{$info -> fn}}</p>
                </div>
            </div>
            <hr>
            <div class="modal-body row">
                <h5 class="text-center"><strong>Área</strong></h5>
                <div class="col-6 text-center">
                    <p><strong>Clave: </strong><br>{{$info -> clave}}</p>
                </div>
                <div class="col-6 text-center">
                    <p><strong>Nombre: </strong><br>{{ $info -> nombreA }}</p>
                </div>
                <div class="col-12">
                    <p><strong>Descripción: </strong><br>{{$info -> descripcion}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- SHOW MODAL END -->

<!-- ELIMINAR START MODAL -->
@foreach ($asig as $info )
<div class="modal fade" id="deleteModal{{ $info->id_areasusuarios }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Área | {{ $info->id_areasusuarios }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                ¿Realmente desea eliminar el registro?
                <strong>
                    <p>{{$info -> nombre .' | '. $info->nombreU .' '. $info->app .' '. $info->apm}}</p>
                </strong>
            </div>
            <div class="modal-footer">
            <form action="{{ route('deleteAreaUser', ['id' => $info->id_areasusuarios]) }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("delete")
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Borrar</button>
            </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ELIMINAR END MODAL -->
