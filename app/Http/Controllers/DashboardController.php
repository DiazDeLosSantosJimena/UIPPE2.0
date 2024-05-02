<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\AreasUsuarios;
use App\Models\Tipos;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    // Cuando un usuario es de tipo ADMINISTRADOR, NO tiene un área asignada, la vista se asigna en esta función.
    public function registros()
    {
        $area = \DB::select('SELECT COUNT(*) as areas FROM tb_areas');
        $tUsuarios = \DB::select('SELECT COUNT(*) as tUsuarios FROM tb_tipos');
        $usuarios = \DB::select('SELECT COUNT(*) as usuarios FROM users');
        $AreasUsuarios = \DB::select('SELECT COUNT(*) as AreasUsuarios FROM tb_areasusuarios');
        $programas = \DB::select('SELECT COUNT(*) as programas FROM tb_programas');
        $metas = \DB::select('SELECT COUNT(*) as metas FROM tb_metas');
        $areametas = \DB::select('SELECT COUNT(*) as areametas FROM tb_areasmetas');
        return view('dashboard.registros')
            ->with(['areas' => $area])
            ->with(['usuarios' => $usuarios])
            ->with(['tUsuarios' => $tUsuarios])
            ->with(['areasusuarios' => $AreasUsuarios])
            ->with(['programas' => $programas])
            ->with(['metas' => $metas])
            ->with(['areametas' => $areametas]);
    }

    // Cuando un usuario tiene un área asignada, la vista se asigna en esta función.
    public function registrosArea($id)
    {
        $area_2 = \DB::SELECT('SELECT * FROM tb_areas WHERE id_area = ' . $id);
        if (count($area_2) <= 0) {
            return redirect('registros');
        } else {
            $area2 = Areas::find($id);
        }
        $area = Areas::find($id);
        $metas = \DB::select('SELECT meta.id_meta, meta.clave, meta.nombre AS nombreM, meta.descripcion, meta.unidadmedida, meta.activo, programa.nombre AS nombreP, programa.abreviatura AS nombrePA, areas.id_area
                FROM tb_metas AS meta
                        JOIN tb_areasmetas AS areasM ON areasM.meta_id = meta.id_meta
                        JOIN tb_programas AS programa ON areasM.id_programa = programa.id_programa
                        JOIN tb_areas AS areas ON areas.id_area = areasM.area_id
                WHERE areasM.area_id = ' . $id);
        $AreasUsuarios = \DB::select('SELECT * FROM tb_areasusuarios WHERE area_id = ' . $id);
        $areametas = \DB::select('SELECT COUNT(*) as areametas FROM tb_areasmetas WHERE area_id = ' . $id);
        $asig = AreasUsuarios::select('tb_areas.id_area', 'tb_areas.clave', 'tb_areas.nombre', 'tb_areas.descripcion', 'tb_areas.activo', 'users.id', ('users.nombre AS nombreU'), 'users.app', 'users.apm', 'users.gen', 'users.fn', 'users.email', 'users.foto', ('users.activo AS activoUs'))
            ->join('tb_areas', 'tb_areasusuarios.area_id',  'tb_areas.id_area')
            ->join('users', 'tb_areasusuarios.usuario_id', 'users.id')
            ->where('tb_areasusuarios.area_id', '=', $id)
            ->get();
        $Usuarios = AreasUsuarios::select('usuario.id', 'usuario.clave', ('usuario.nombre as nombreU'), 'usuario.app', 'usuario.apm', 'usuario.gen', 'usuario.fn', 'usuario.academico', 'usuario.foto', 'usuario.email', 'usuario.activo', 'usuario.id_tipo', ('tipo.nombre as nombreT'))
            ->join(('users AS usuario'), 'tb_areasusuarios.usuario_id', 'usuario.id')
            ->join(('tb_tipos as tipo'), 'usuario.id_tipo', 'tipo.id')
            ->join('tb_areas', 'tb_areasusuarios.area_id',  'tb_areas.id_area')
            ->where('tb_areasusuarios.area_id', '=', $id)
            ->get();
        $Tipos = Tipos::all()->where('activo', '>', '0');
        $usuarios = \DB::SELECT('SELECT *
                FROM users AS users
                WHERE users.id NOT IN (SELECT usuario_id FROM tb_areasusuarios) AND users.activo > 0 AND users.id_tipo >= 3');
        $areasMulti = Areas::all('id_area', 'nombre');
        return view('dashboard.registrosA')
            ->with(['areas' => $area])
            ->with(['metas' => $metas])
            ->with(['asig' => $asig])
            ->with(['areasusuarios' => $AreasUsuarios])
            ->with(['areametas' => $areametas])
            ->with(['Usuarios' => $Usuarios])
            ->with(['Tipos' => $Tipos])
            ->with(['usuarios' => $usuarios])
            ->with(['areasMulti' => $areasMulti]);
    }
}
