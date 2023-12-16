<?php

namespace App\Base\Operations;

use App\Base\Configs\Constant;
use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;
use App\Base\Enums\BorderType;
use App\Base\Enums\NumberFormatType;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class WorkSheetFromCellToCellOperation
{
    public static function mergeCells(Worksheet $sheet, string $fromCell, string $toCell): void
    {
        $sheet->mergeCells($fromCell.':'.$toCell);
    }

    public static function formatCode(
        Worksheet        $sheet,
        NumberFormatType $numberFormat,
        string           $fromCell,
        string           $toCell
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)
            ->getNumberFormat()
            ->setFormatCode($numberFormat->value);
    }

    public static function wrapText(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)
            ->getAlignment()
            ->setWrapText(true);
    }

    public static function setWidth(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell,
        int       $height
    ): void {
        $sheet->getColumnDimension($fromCell.':'.$toCell)->setWidth($height);
    }

    public static function setHeight(Worksheet $sheet, int $cell, int $height): void
    {
        $sheet->getRowDimension($cell)
            ->setRowHeight($height);
    }

    public static function autoSize(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell
    ): void {
        $sheet->getColumnDimension($fromCell.':'.$toCell)->setAutoSize(true);
    }

    public static function setFontSize(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell,
        int       $sizeInPoints
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->getFont()->setSize($sizeInPoints);
    }

    public static function setColor(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell,
        string    $color
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->applyFromArray([
            'font' => ['color' => ['rgb' => $color]]
        ]);
    }

    public static function setBackground(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell,
        string    $color
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->applyFromArray([
            'fill' => [
                'startColor' => ['rgb' => $color]
            ]
        ]);
    }

    public static function alignmentHorizontal(
        Worksheet       $sheet,
        string          $fromCell,
        string          $toCell,
        AlignHorizontal $alignHorizontal
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->applyFromArray([
            'alignment' => ['horizontal' => $alignHorizontal->value]
        ]);
    }

    public static function alignmentVertical(
        Worksheet     $sheet,
        string        $fromCell,
        string        $toCell,
        AlignVertical $alignVertical
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->applyFromArray([
            'alignment' => ['vertical' => $alignVertical->value]
        ]);
    }

    public static function bold(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->getFont()->setBold(true);
    }

    public static function italic(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->getFont()->setItalic(true);
    }

    public static function underline(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->getFont()->setUnderline(true);
    }

    public static function strikethrough(
        Worksheet $sheet,
        string    $fromCell,
        string    $toCell
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->getFont()->setStrikethrough(true);
    }

    public static function border(
        Worksheet  $sheet,
        string     $fromCell,
        string     $toCell,
        BorderType $borderType,
        string     $color = Constant::COLOR_BLACK_DEFAULT
    ): void {
        $sheet->getStyle($fromCell.':'.$toCell)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => $borderType->value,
                    'color'       => ['rgb' => $color],
                ],
            ],
        ]);
    }
}