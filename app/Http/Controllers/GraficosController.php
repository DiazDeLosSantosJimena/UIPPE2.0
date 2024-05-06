<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class GraficosController extends Controller
{
    public function graficos()
    {
        $usuarios = \DB::select('SELECT gen FROM users GROUP BY gen');
        $usuarios_a = \DB::select('SELECT gen, COUNT(*) AS cantidad FROM users GROUP BY gen');
        $programas = \DB::select('SELECT  abreviatura FROM tb_programas');
        $metas = \DB::select('SELECT  COUNT(*) AS conteo FROM tb_metas GROUP BY programa_id');
        $usuarios_b = \DB::select('SELECT nombre AS usuarios FROM users GROUP BY nombre ;');
        $tipos = \DB::select('SELECT id_tipo AS id FROM users ');
        $trimestral = \DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-01-01" AND created_at < "2023-04-01" 
        GROUP BY MONTH(created_at) ');
        $meses = \DB::select(' SELECT MONTH(created_at) AS mes
        FROM tb_metas
        WHERE created_at >= "2023-01-01" AND created_at < "2023-04-01"
        GROUP BY MONTH(created_at)');
        $eneroactivos = \DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-01-01" AND created_at < "2023-01-31" 
        GROUP BY Day(created_at) ');
        $eneroDias = \DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-01-01" AND created_at < "2023-01-31" GROUP BY DAY(created_at)');
        $febreroactivos = \DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-02-01" AND created_at < "2023-02-31" 
        GROUP BY Day(created_at) ');
        $febreroDias = \DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-02-01" AND created_at < "2023-02-31" GROUP BY DAY(created_at)');
        $marzoactivos = \DB::select('SELECT SUM(activo) AS total
        FROM tb_metas WHERE created_at >= "2023-03-01" AND created_at < "2023-03-31" 
        GROUP BY Day(created_at) ');
        $marzoDias = \DB::select('SELECT DAY(created_at) AS dia
        FROM tb_metas
        WHERE created_at >= "2023-03-01" AND created_at < "2023-03-31" GROUP BY DAY(created_at)');
        $puesto = \DB::select(' SELECT COUNT(users.id_tipo) as id_tipo, tb_tipos.nombre
        FROM users
        JOIN tb_tipos ON users.id_tipo = tb_tipos.id
        GROUP BY users.id_tipo, tb_tipos.nombre');
        $areasmetas = \DB::select('SELECT tb_areas.nombre, COUNT(tb_areasmetas.meta_id) AS meta
        FROM tb_areasmetas
        JOIN tb_areas ON tb_areasmetas.area_id = tb_areas.id_area
        GROUP BY tb_areas.id_area, tb_areas.nombre;');
        return view("graficos.graficos")
            ->with(['areasmetas' => $areasmetas])
            ->with(['meses' => $meses])
            ->with(['puesto' => $puesto])
            ->with(['eneroactivos' => $eneroactivos])
            ->with(['eneroDias' => $eneroDias])
            ->with(['febreroactivos' => $febreroactivos])
            ->with(['febreroDias' => $febreroDias])
            ->with(['marzoactivos' => $marzoactivos])
            ->with(['marzoDias' => $marzoDias])
            ->with(['tipos' => $tipos])
            ->with(['trimestral' => $trimestral])
            ->with(['metas' => $metas])
            ->with(['usuarios_b' => $usuarios_b])
            ->with(['programas' => $programas])
            ->with(['usuarios' => $usuarios])
            ->with(['usuarios_a' => $usuarios_a]);
    }

    public function rpdf()
    {
        $areas = \DB::select('SELECT  abreviatura FROM tb_programas');
        $areas = \DB::select('SELECT  COUNT(*) AS conteo FROM tb_metas GROUP BY programa_id');
        $areas = Areas::all();

        $pdf = PDF::loadView('Documentos.rpdf', ['areas' => $areas]);
        //----------Visualizar el PDF ------------------
        //return $pdf->stream(); 
        // ------Descargar el PDF------
        return $pdf->download('graficos.pdf');
    }
}
