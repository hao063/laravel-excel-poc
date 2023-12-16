<?php

namespace App\Base\Operations;

use App\Base\Configs\Constant;
use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;
use App\Base\Enums\BorderType;
use App\Base\Enums\NumberFormatType;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WorkSheetRowOperation
{
    public static function formatCode(Worksheet $sheet, NumberFormatType $numberFormat, int $row): void
    {
        $sheet->getStyle($row)
            ->getNumberFormat()
            ->setFormatCode($numberFormat->value);
    }

    public static function wrapText(Worksheet $sheet, int $row): void
    {
        $sheet->getStyle($row)
            ->getAlignment()
            ->setWrapText(true);
    }

    public static function setHeight(Worksheet $sheet, int $row, int $height): void
    {
        $sheet->getRowDimension($row)
            ->setRowHeight($height);
    }

    public static function autoSize(Worksheet $sheet, int $row): void
    {
        $sheet->getColumnDimension($row)->setAutoSize(true);
    }

    public static function setFontSize(Worksheet $sheet, int $row, int $sizeInPoints): void
    {
        $sheet->getStyle($row)->getFont()->setSize($sizeInPoints);
    }

    public static function setColor(Worksheet $sheet, int $row, string $color): void
    {
        $sheet->getStyle($row)->applyFromArray([
            'font' => ['color' => ['rgb' => $color]]
        ]);
    }

    public static function setBackground(Worksheet $sheet, int $row, string $color): void
    {
        $sheet->getStyle($row)->applyFromArray([
            'fill' => [
                'startColor' => ['rgb' => $color]
            ]
        ]);
    }

    public static function alignmentHorizontal(Worksheet $sheet, int $row, AlignHorizontal $alignHorizontal): void
    {
        $sheet->getStyle($row)->applyFromArray([
            'alignment' => ['horizontal' => $alignHorizontal->value]
        ]);
    }

    public static function alignmentVertical(Worksheet $sheet, int $row, AlignVertical $alignVertical): void
    {
        $sheet->getStyle($row)->applyFromArray([
            'alignment' => ['vertical' => $alignVertical->value]
        ]);
    }

    public static function bold(Worksheet $sheet, int $row): void
    {
        $sheet->getStyle($row)->getFont()->setBold(true);
    }

    public static function italic(Worksheet $sheet, int $row): void
    {
        $sheet->getStyle($row)->getFont()->setItalic(true);
    }

    public static function underline(Worksheet $sheet, int $row): void
    {
        $sheet->getStyle($row)->getFont()->setUnderline(true);
    }

    public static function strikethrough(Worksheet $sheet, int $row): void
    {
        $sheet->getStyle($row)->getFont()->setStrikethrough(true);
    }

    public static function border(
        Worksheet  $sheet,
        int     $row,
        BorderType $borderType,
        string     $color = Constant::COLOR_BLACK_DEFAULT
    ): void {
        $sheet->getStyle($row)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => $borderType->value,
                    'color'       => ['rgb' => $color],
                ],
            ],
        ]);
    }
}