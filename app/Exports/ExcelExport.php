<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithEvents
{
    private $nombrepestania = 'Informe';

    public function __construct($results, $encabezado, $title)
    {
        $this->results = $results;
        $this->encabezado = $encabezado;
        $this->nombrepestania = $title;
    }

    public function headings(): array
    {
        return $this->encabezado;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $styleArray = [
                    'font' => [
                        'bold' => true,
                        'size' => '12',
                    ],
                ];

                $letra = $event->sheet->getHighestColumn();
                $event->sheet->setAutoFilter('A1:'.$letra.'1');
                $event->sheet->freezePane('A2', 'A2');

                $event->sheet->getDelegate()->getStyle('A1:'.$letra.'1')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('A1');
            },
        ];
    }

    public function collection()
    {
        return collect($this->results);
    }

    public function title(): string
    {
        return $this->nombrepestania;
    }
}
