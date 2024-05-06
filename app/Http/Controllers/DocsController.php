<?php

namespace App\Http\Controllers;

use App\Exports\AreasExport;
use App\Exports\AreasMetasExport;
use App\Exports\AreasUsExport;
use App\Exports\ProgramasExport;
use App\Exports\TiposExport;
use App\Exports\UsuariosExport;
use App\Models\Areas;
use App\Models\AreasUsuarios;
use App\Models\Metas;
use App\Models\Programas;
use App\Models\Tipos;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DocsController extends Controller
{
    //  PDF y Excel
    //  PDFs --------------------------------------------
    public function pdfAreas()
    {
        $areas = Areas::all();

        $pdf = PDF::loadView('Documentos.pdf', ['areas' => $areas]);
        //----------Visualizar el PDF ------------------
        return $pdf->stream();
        // ------Descargar el PDF------
        //  return $pdf->download('___libros.pdf');
    }

    public function pdfUsuarios()
    {
        $usuarios= User::all();

        $pdf = PDF::loadView('Documentos.pdfu',['usuarios'=>$usuarios]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream(); 
       // ------Descargar el PDF------
       //   return $pdf->download('___libros.pdf');
    }

    public function pdfAreasMetas()
    {
        $areasmetas = \DB::table('tb_areasmetas')
            ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
            ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
            ->join('tb_areas', 'tb_areasmetas.area_id',  'tb_areas.id_area')
            ->select('tb_metas.nombre as nmeta', 'tb_metas.id_meta as mid', 'tb_programas.nombre as pnombre', 'tb_areas.nombre as area', 'tb_areasmetas.id_areasmetas', 'tb_areasmetas.objetivo as objetivo')
            ->orderBy('tb_areasmetas.id_areasmetas', 'asc')
            ->get();

        $pdf = PDF::loadView('Documentos.pdfam', ['areasmetas' => $areasmetas]);
        //----------Visualizar el PDF ------------------
        return $pdf->stream();
        // ------Descargar el PDF------
        //  return $pdf->download('___libros.pdf');
    }

    public function pdfTipos()
    {
        $tipos = Tipos::all();

        $pdf = PDF::loadView('Documentos.pdft', ['tipos' => $tipos]);
        //----------Visualizar el PDF ------------------
        return $pdf->stream();
        // ------Descargar el PDF------
        //  return $pdf->download('___libros.pdf');
    }

    public function pdfAreasUsuarios()
    {
        $areausuario = AreasUsuarios::select('tb_areasusuarios.id_areasusuarios','tb_areas.nombre as area_id', 'users.nombre as usuario_id', 'tb_areasusuarios.activo' )
        ->join('tb_areas','tb_areas.id_area','tb_areasusuarios.area_id')
        ->join('users','users.id','tb_areasusuarios.usuario_id')
        ->get();

        $pdf = PDF::loadView('Documentos.pdfau',['areausuario'=>$areausuario]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream(); 
       // ------Descargar el PDF------
       //return $pdf->download('___libros.pdf');
    }

    public function pdfProgramas()
    {
        $programas= Programas::all();

        $pdf = PDF::loadView('Documentos.pdfp',['programas'=>$programas]);
        //----------Visualizar el PDF ------------------
       return $pdf->stream(); 
       // ------Descargar el PDF------
       //return $pdf->download('___libros.pdf');
    }

    public function pdfMetas()
    {
        $metas= Metas::all();
        $pdf = PDF::loadView('Documentos.pdfm',['metas'=>$metas]);
        //----------Visualizar el PDF ------------------
        return $pdf->stream(); 
        // ------Descargar el PDF------
        //return $pdf->download('___libros.pdf');
    }

    //  Excel --------------------------------------------

    public function exportAreas()
    {
        return Excel::download(new AreasExport, 'areas.xlsx');
    }

    public function exportAreasMetas()
    {
        return Excel::download(new AreasMetasExport, 'areasmetas.xlsx');
    }

    public function exportTipos()
    {
        return Excel::download(new TiposExport, 'Tipos.xlsx');
    }

    public function exportUsuarios() 
    {
        return Excel::download(new UsuariosExport, 'usuarios.xlsx');
    }

    public function exportAreasUsuarios() 
    {
        return Excel::download(new AreasUsExport, 'AreasUsuarios.xlsx');
    }

    public function exportProgramas() 
    {
        return Excel::download(new ProgramasExport, 'programas.xlsx');
    }

    public function exportMetas() {
        //  Lógica
        return redirect('dashboard');
    }
}
