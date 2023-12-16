<?php


use App\Base\Configs\Constant;
use App\Base\Enums\AlignVertical;

function codeBackgroundColorItemCell(array $header, array $item): string
{
    return $item['backgroundColor'] ?? $header['backgroundColor'] ?? '';
}

function isBackgroundColor(array $header, array $item): string
{
    return isset($item['backgroundColor']) || isset($header['backgroundColor']);
}

function colspanCell(array $item): int
{
    return $item['colspan'];
}

function rowspanCell(array $item): int
{
    return $item['rowspan'] ?? Constant::ROWSPAN_DEFAULT;
}


function isHeightCell(array $header, array $item): bool
{
    return isset($item['height']) || isset($header['height']);
}

function heightCell(array $header, array $item): string
{
    $height = $item['height'] ?? $header['height'] ?? Constant::NO_SET_HEIGHT;
    if (Constant::NO_SET_HEIGHT == $height) {
        return '';
    }
    return trim($height).'px';
}

function widthCell(array $header, array $item): string
{
    $width = $item['width'] ?? $header['width'] ?? Constant::NO_SET_WIDTH;
    if (Constant::NO_SET_WIDTH == $width) {
        return '';
    }
    return trim($width).'px';
}

function isWidthCell(array $header, array $item): bool
{
    return isset($item['width']) || isset($header['width']);
}

function isFontSize(array $header, array $item): string
{
    return isset($item['fontSize']) || isset($header['fontSize']);
}

function fontSize(array $header, array $item): string
{
    $width = $item['fontSize'] ?? $header['fontSize'] ?? Constant::FONT_SIZE_DEFAULT;
    return trim($width).'px';
}

function isTextAlign(array $header, array $item): bool
{
    return isset($header['alignHorizontal']) || isset($item['alignHorizontal']);
}

function textAlign(array $header, array $item): string
{
    return $item['alignHorizontal'] ?? $header['alignHorizontal'] ?? '';
}

function verticalAlign(array $header, array $item): string
{
    return $item['alignVertical'] ?? $header['alignVertical'] ?? AlignVertical::BOTTOM->value;
}

function isBold(array $header, array $item): bool
{
    return isset($item['bold']) || isset($header['bold']);
}

function isItalic(array $header, array $item): bool
{
    return isset($item['italic']) || isset($header['italic']);
}

function isUnderline(array $header, array $item): bool
{
    return isset($item['underline']) || isset($header['underline']);
}

function underline(array $header, array $item): string
{
    return $item['underline'] ?? $header['underline'] ?? '';
}

function isColor(array $header, array $item): string
{
    return isset($item['color']) || isset($header['color']);
}


function color(array $header, array $item): string
{
    return $item['color'] ?? $header['color'] ?? '';
}

function title(array $item): string
{
    return $item['title'] ?? '';
}

