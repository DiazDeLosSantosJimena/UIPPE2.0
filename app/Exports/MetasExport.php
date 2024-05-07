<?php
  
namespace App\Exports;
  
use App\Models\Metas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;



class MetasExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Metas::select("tb_metas.clave", "tb_metas.nombre as meta_nombre", "tb_programas.nombre as programa_nombre")
        ->join('tb_programas', 'tb_metas.programa_id', '=', 'tb_programas.id_programa')
        ->get();
    
    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Clave", "Nombre", "Programa"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
  
                $event->sheet->getDelegate()->getStyle('A1:C1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('007A37');

                        $event->sheet->getColumnDimension('A')->setWidth(10);
                        $event->sheet->getColumnDimension('B')->setWidth(200);
                        $event->sheet->getColumnDimension('C')->setWidth(78);  
  
            },
        ];
    }


}