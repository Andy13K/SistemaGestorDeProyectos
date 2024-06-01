<?php


namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProyectosExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $proyectos;

    public function __construct($proyectos)
    {
        $this->proyectos = $proyectos;
    }

    public function collection()
    {
        return $this->proyectos;
    }

    public function headings(): array
    {
        return [
            'ID', 'Nombre', 'Descripción', 'Categoría', 'Líder', 'Cliente', 'Fecha de Creación', 'Fecha Límite', 'Número de Computadoras', 'Presupuesto'
        ];
    }

    public function map($proyecto): array
    {
        return [
            $proyecto->id,
            $proyecto->nombre,
            $proyecto->descripcion,
            optional($proyecto->categoria)->nombre,
            optional($proyecto->lider)->name,
            optional($proyecto->cliente)->nombre,
            $proyecto->created_at->format('Y-m-d'),
            $proyecto->fecha_limite,
            $proyecto->num_computadoras,
            $proyecto->presupuesto,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Estilo de la cabecera
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4CAF50'],
            ],
        ]);

        // Autoajustar columnas
        foreach (range('A', 'J') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Aplicar borde a todas las celdas
        $sheet->getStyle('A1:J' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Alternar colores en las filas de datos
        for ($row = 2; $row <= $sheet->getHighestRow(); $row++) {
            if ($row % 2 == 0) {
                $sheet->getStyle('A' . $row . ':J' . $row)->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'E8F5E9'],
                    ],
                ]);
            }
        }
    }
}
