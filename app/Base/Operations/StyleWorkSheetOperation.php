<?php

namespace App\Base\Operations;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StyleWorkSheetOperation implements StyleWorkSheetOperationInterface
{

    private Worksheet $sheet;

    public function __construct(private readonly WorkSheetCellOperation $workSheetCellOperation)
    {
    }

    public function setWorkSheet(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet): void
    {
        $this->sheet = $sheet;
    }

    public function cell(string $column): WorkSheetCellOperationInterface
    {
        $this->workSheetCellOperation->setWorkSheet($this->sheet);
        return $this->workSheetCellOperation;
    }

    public function column(string $column)
    {
        // TODO: Implement column() method.
    }

    public function row(int $row)
    {
        // TODO: Implement row() method.
    }

    public function fromCellToCell(string $fromCell, string $toCell)
    {
        // TODO: Implement fromCellToCell() method.
    }


}