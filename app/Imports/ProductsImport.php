<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProductsImport extends DefaultValueBinder implements ToModel, WithStartRow, WithUpserts, WithCustomValueBinder, WithUpsertColumns
{

    use Importable;

    // set the preferred date format
    private $date_format = 'Y-m-d';

    // set the columns to be formatted as dates
    private $date_columns = ['Q'];


    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'ticket';
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product(
            [
                'ticket' => trim($row[0]),
                'queue' => trim($row[1]),
                'ean' => trim($row[2]),
                'negocio' => trim($row[3]),
                'departamento' => trim($row[4]),
                'grupo' => trim($row[5]),
                'categoria' => trim($row[6]),
                'subcategoria' => trim($row[7]),
                'descripcion' => trim($row[8]),
                'referencia' => trim($row[9]),
                'marca' => trim($row[10]),
                'medida' => trim($row[11]),
                'color' => trim($row[12]),
                'costo' => trim($row[13]),
                'nit_proveedor' => trim($row[14]),
                'razon_social_proveedor' => trim($row[15]),
                'fecha_inicio_gestion' => trim($row[16]),
                'dias_transcurridos' => trim($row[17]),
            ]
        );
    }

    public function bindValue(Cell $cell, $value)
    {
        if (in_array($cell->getColumn(), $this->date_columns)) {
            $cell->setValueExplicit(Date::excelToDateTimeObject($value)->format($this->date_format), DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    /**
     * @return array
     */
    public function upsertColumns()
    {
        return [
            'ticket',
            'queue',
            'ean',
            'negocio',
            'departamento',
            'grupo',
            'categoria',
            'subcategoria',
            'descripcion',
            'referencia',
            'marca',
            'medida',
            'color',
            'costo',
            'nit_proveedor',
            'razon_social_proveedor',
            'fecha_inicio_gestion',
            'dias_transcurridos'
        ];
    }
}
