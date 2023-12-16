<?php

namespace App\Base\Operations;

use App\Base\Configs\Constant;
use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;
use App\Base\Enums\BorderType;
use App\Base\Enums\NumberFormatType;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WorkSheetDataOperation
{
    public static function formatCode(Worksheet $sheet, NumberFormatType $numberFormat): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getNumberFormat()->setFormatCode($numberFormat->value);
    }

    public static function wrapText(Worksheet $sheet): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getAlignment()->setWrapText(true);
    }

    public static function setHeight(Worksheet $sheet, int $height): void
    {
        $sheet->getDefaultRowDimension()->setRowHeight($height);
    }

    public static function setWidth(Worksheet $sheet, int $width): void
    {
        $sheet->getDefaultColumnDimension()->setWidth($width);
    }

    public static function setFontSize(Worksheet $sheet, int $sizeInPoints): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getFont()->setSize($sizeInPoints);
    }


    public static function setColor(Worksheet $sheet, string $color): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'font' => ['color' => ['rgb' => $color]]
        ]);
    }

    public static function setBackground(Worksheet $sheet, string $color): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'fill' => [
                'startColor' => ['rgb' => $color]
            ]
        ]);
    }

    public static function alignmentHorizontal(Worksheet $sheet, AlignHorizontal $alignHorizontal): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'alignment' => ['horizontal' => $alignHorizontal->value]
        ]);
    }

    public static function alignmentVertical(Worksheet $sheet, AlignVertical $alignVertical): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'alignment' => ['vertical' => $alignVertical->value]
        ]);
    }

    public static function bold(Worksheet $sheet): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getFont()->setBold(true);
    }

    public static function italic(Worksheet $sheet): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getFont()->setItalic(true);
    }

    public static function underline(Worksheet $sheet): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getFont()->setUnderline(true);
    }

    public static function strikethrough(Worksheet $sheet): void
    {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getFont()->setStrikethrough(true);
    }

    public static function border(
        Worksheet  $sheet,
        BorderType $borderType,
        string     $color = Constant::COLOR_BLACK_DEFAULT
    ): void {
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => $borderType->value,
                    'color'       => ['rgb' => $color],
                ],
            ],
        ]);
    }

    public static function autoSize(Worksheet $sheet): void
    {
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
    }


}