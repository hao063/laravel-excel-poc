<?php

namespace App\Base\Operations;

use App\Base\Configs\Constant;
use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;
use App\Base\Enums\BorderType;
use App\Base\Enums\NumberFormatType;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WorkSheetCellOperation implements WorkSheetCellOperationInterface
{
    private Worksheet $worksheet;
    private string    $cell;

    public function setWorkSheet(Worksheet $worksheet): void
    {
        $this->worksheet = $worksheet;
    }

    public function setCell(string $cell): void
    {
        $this->cell = $cell;
    }

    public function formatCode(NumberFormatType $numberFormat, string $cell): void
    {
        $this->worksheet->getStyle($this->cell)
            ->getNumberFormat()
            ->setFormatCode($numberFormat->value);
    }

    public function wrapText(): void
    {
        $this->worksheet->getStyle($this->cell)
            ->getAlignment()
            ->setWrapText(true);
    }

    public function setWidth(int $height): void
    {
        $this->worksheet->getColumnDimension($this->cell)->setWidth($height);
    }

    public function setHeight(int $height): void
    {
        $this->worksheet->getRowDimension($this->cell)
            ->setRowHeight($height);
    }

    public function autoSize(): void
    {
        $this->worksheet->getColumnDimension($this->cell)->setAutoSize(true);
    }

    public function setFontSize(int $sizeInPoints): void
    {
        $this->worksheet->getStyle($this->cell)->getFont()->setSize($sizeInPoints);
    }

    public function setColor(string $color): void
    {
        $this->worksheet->getStyle($this->cell)->applyFromArray([
            'font' => ['color' => ['rgb' => $color]]
        ]);
    }

    public function setBackground(string $color): void
    {
        $this->worksheet->getStyle($this->cell)->applyFromArray([
            'fill' => [
                'startColor' => ['rgb' => $color]
            ]
        ]);
    }

    public function alignmentHorizontal(AlignHorizontal $alignHorizontal): void
    {
        $this->worksheet->getStyle($this->cell)->applyFromArray([
            'alignment' => ['horizontal' => $alignHorizontal->value]
        ]);
    }

    public function alignmentVertical(AlignVertical $alignVertical): void
    {
        $this->worksheet->getStyle($this->cell)->applyFromArray([
            'alignment' => ['vertical' => $alignVertical->value]
        ]);
    }

    public function bold(): void
    {
        $this->worksheet->getStyle($this->cell)->getFont()->setBold(true);
    }

    public function italic(): void
    {
        $this->worksheet->getStyle($this->cell)->getFont()->setItalic(true);
    }

    public function underline(): void
    {
        $this->worksheet->getStyle($this->cell)->getFont()->setUnderline(true);
    }

    public function strikethrough(): void
    {
        $this->worksheet->getStyle($this->cell)->getFont()->setStrikethrough(true);
    }

    public function border(
        BorderType $borderType,
        string     $color = Constant::COLOR_BLACK_DEFAULT
    ): void {
        $this->worksheet->getStyle($this->cell)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => $borderType->value,
                    'color'       => ['rgb' => $color],
                ],
            ],
        ]);
    }
}