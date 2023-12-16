<?php

namespace App\Base\Operations;

use App\Base\Configs\Constant;
use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;
use App\Base\Enums\BorderType;
use App\Base\Enums\NumberFormatType;

interface WorkSheetCellOperationInterface
{

    public function formatCode(NumberFormatType $numberFormat, string $cell): void;

    public function wrapText(): void;

    public function setWidth(int $height): void;

    public function setHeight(int $height): void;

    public function autoSize(): void;

    public function setFontSize(int $sizeInPoints): void;

    public function setColor(string $color): void;

    public function setBackground(string $color): void;

    public function alignmentHorizontal(AlignHorizontal $alignHorizontal): void;

    public function alignmentVertical(AlignVertical $alignVertical): void;

    public function bold(): void;

    public function italic(): void;

    public function underline(): void;

    public function strikethrough(): void;

    public function border(
        BorderType $borderType,
        string     $color = Constant::COLOR_BLACK_DEFAULT
    ): void;
}