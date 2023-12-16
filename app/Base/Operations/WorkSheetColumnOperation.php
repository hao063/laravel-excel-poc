<?php

namespace App\Base\Operations;

use App\Base\Configs\Constant;
use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;
use App\Base\Enums\BorderType;
use App\Base\Enums\NumberFormatType;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WorkSheetColumnOperation
{
    public static function formatCode(Worksheet $sheet, NumberFormatType $numberFormat, string $column): void
    {
        $sheet->getStyle($column)
            ->getNumberFormat()
            ->setFormatCode($numberFormat->value);
    }

    public static function wrapText(Worksheet $sheet, string $column): void
    {
        $sheet->getStyle($column)
            ->getAlignment()
            ->setWrapText(true);
    }

    public static function setWidth(Worksheet $sheet, string $column, int $height): void
    {
        $sheet->getColumnDimension($column)->setWidth($height);
    }


    public static function autoSize(Worksheet $sheet, string $column): void
    {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }

    public static function setFontSize(Worksheet $sheet, string $column, int $sizeInPoints): void
    {
        $sheet->getStyle($column)->getFont()->setSize($sizeInPoints);
    }

    public static function setColor(Worksheet $sheet, string $column, string $color): void
    {
        $sheet->getStyle($column)->applyFromArray([
            'font' => ['color' => ['rgb' => $color]]
        ]);
    }

    public static function setBackground(Worksheet $sheet, string $column, string $color): void
    {
        $sheet->getStyle($column)->applyFromArray([
            'fill' => [
                'startColor' => ['rgb' => $color]
            ]
        ]);
    }

    public static function alignmentHorizontal(Worksheet $sheet, string $column, AlignHorizontal $alignHorizontal): void
    {
        $sheet->getStyle($column)->applyFromArray([
            'alignment' => ['horizontal' => $alignHorizontal->value]
        ]);
    }

    public static function alignmentVertical(Worksheet $sheet, string $column, AlignVertical $alignVertical): void
    {
        $sheet->getStyle($column)->applyFromArray([
            'alignment' => ['vertical' => $alignVertical->value]
        ]);
    }

    public static function bold(Worksheet $sheet, string $column): void
    {
        $sheet->getStyle($column)->getFont()->setBold(true);
    }

    public static function italic(Worksheet $sheet, string $column): void
    {
        $sheet->getStyle($column)->getFont()->setItalic(true);
    }

    public static function underline(Worksheet $sheet, string $column): void
    {
        $sheet->getStyle($column)->getFont()->setUnderline(true);
    }

    public static function strikethrough(Worksheet $sheet, string $column): void
    {
        $sheet->getStyle($column)->getFont()->setStrikethrough(true);
    }

    public static function border(
        Worksheet  $sheet,
        string     $column,
        BorderType $borderType,
        string     $color = Constant::COLOR_BLACK_DEFAULT
    ): void {
        $sheet->getStyle($column)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => $borderType->value,
                    'color'       => ['rgb' => $color],
                ],
            ],
        ]);
    }
}