<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\AreasUsuarios;
use Illuminate\Http\Request;

class AreasUsuariosController extends Controller
{
    public function index()
    {
        $areas = Areas::all()->where('activo', '>', '0'); //Todas las areas activas

        $asig = AreasUsuarios::select('id_areasusuarios', 'tb_areas.id_area', 'tb_areas.clave', 'tb_areas.nombre', 'tb_areas.descripcion', ('users.nombre AS nombreU'), 'users.app', 'users.apm', 'users.gen', 'users.fn', 'users.email', 'users.foto')
            ->join('tb_areas', 'tb_areasusuarios.area_id',  'tb_areas.id_area')
            ->join('users', 'tb_areasusuarios.usuario_id', 'users.id')
            ->get();

        //INFORMACIÓN que solo veran los usuarios nivel 3
        $usuarios = \DB::SELECT('SELECT * FROM users AS userss WHERE userss.id NOT IN (SELECT usuario_id FROM tb_areasusuarios) AND userss.activo > 0 AND userss.id_tipo >= 3');

        //Consulta para traer la información al MODAL DETALLE función solo para usuarios nivel 1 y 2  
        $modalDetalle = \DB::SELECT('SELECT tb_areasusuarios.id_areasusuarios,users.foto, users.nombre,users.app, users.apm, users.email, users.fn, tb_areas.clave, tb_areas.nombre as nombreA, tb_areas.id_area, tb_areas.descripcion 
        FROM tb_areasusuarios INNER JOIN users ON tb_areasusuarios.usuario_id = users.id 
            INNER JOIN tb_areas ON tb_areas.id_area = tb_areasusuarios.area_id');

        //Consulta para traer la información al MODAL EDITAR función solo para usuarios nivel 1y 2  
        $modalEdit = \DB::SELECT('SELECT tb_areasusuarios.id_areasusuarios, users.nombre AS nombreU, users.app, users.apm
        FROM tb_areasusuarios
        JOIN users ON tb_areasusuarios.usuario_id = users.id');
        return view('areas-usuarios.index', compact('areas', 'usuarios', 'asig', 'modalDetalle', 'modalEdit'));
    }

    public function store(Request $request)
    {

        // dd($request->all()); Mue
        if ($request->input('activo') == '') {
            $activo = 0;
        } else if ($request->input('activo') == 'on') {
            $activo = 1;
        } else {
            $activo = 1;
        }

        $area_id = $request->area_id;
        $usuarios = $request->usuario_id[0]; //Se guardan las usuarios que hay que asignar al área en un array
        $separador = ',';
        $ids = explode($separador, $usuarios); // El método explode los seprara
        $contador = count($ids);

        $id_registro = $request->input('registro');
        // Se utiliza un for para asignar varios usuarios a una área
        for ($i = 0; $i < $contador; $i++) {
            AreasUsuarios::create(array(
                'area_id' => $area_id,
                'usuario_id' => $ids[$i],
                'activo' => $activo,
                'id_registro' => $activo
            ));
        }

        return redirect('areas-usuarios');
    }

    public function destroy(AreasUsuarios $id)
    {
        $query = AreasUsuarios::findOrFail($id->id_areasusuarios);
        $query->delete();
        return redirect('areas-usuarios');
    }
}
