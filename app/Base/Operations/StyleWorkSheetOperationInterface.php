<?php

namespace App\Base\Operations;

interface StyleWorkSheetOperationInterface
{
    public function cell(string $column);
    public function column(string $column);
    public function row(int $row);
    public function fromCellToCell(string $fromCell, string $toCell);


}