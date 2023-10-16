<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProductsImport extends DefaultValueBinder implements ToModel, WithStartRow, WithUpserts, WithCustomValueBinder
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
        return new Product([
            'ticket' => $row[0],
            'queue' => $row[1],
            'ean' => $row[2],
            'negocio' => $row[3],
            'departamento' => $row[4],
            'grupo' => $row[5],
            'categoria' => $row[6],
            'subcategoria' => $row[7],
            'descripcion' => $row[8],
            'referencia' => $row[9],
            'marca' => $row[10],
            'medida' => $row[11],
            'color' => $row[12],
            'costo' => $row[13],
            'nit_proveedor' => $row[14],
            'razon_social_proveedor' => $row[15],
            'fecha_inicio_gestion' => $row[16],
            'dias_transcurridos' => $row[17],
        ]);
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
}
