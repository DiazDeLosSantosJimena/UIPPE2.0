<?php
  
namespace App\Exports;
  
use App\Models\AreasUsuarios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;



class AreasUsExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AreasUsuarios::select('tb_areasusuarios.id_areasusuarios', 
        'tb_areas.nombre AS nombre_area', 
        'users.nombre AS nombre_usuario',
        'users.app AS apellidop_usuario',
        'users.apm AS apellidom_usuario')
->join('tb_areas', 'tb_areasusuarios.area_id', '=', 'tb_areas.id_area')
->join('users', 'tb_areasusuarios.usuario_id', '=', 'users.id')
->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Area", "Usuario", "Apellido Paterno", "Apellido Materno"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
  
                $event->sheet->getDelegate()->getStyle('A1:E1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('007A37');

                        $event->sheet->getColumnDimension('A')->setWidth(10);
                        $event->sheet->getColumnDimension('B')->setWidth(76);
                        $event->sheet->getColumnDimension('C')->setWidth(17);  
                        $event->sheet->getColumnDimension('D')->setWidth(18);  
                        $event->sheet->getColumnDimension('E')->setWidth(18);  
  
            },
        ];
    }


}