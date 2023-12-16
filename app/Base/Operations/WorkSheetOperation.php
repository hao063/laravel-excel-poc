<?php

namespace App\Base\Operations;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WorkSheetOperation
{
    public function __construct(
        private readonly StyleWorkSheetOperation $styleWorkSheetOperation
    ) {
    }

    public function createWorkSheet(Worksheet $sheet): StyleWorkSheetOperationInterface
    {
        $this->styleWorkSheetOperation->setWorkSheet($sheet);
        return $this->styleWorkSheetOperation;
    }
}