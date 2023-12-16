<?php

namespace App\Base\Items;

use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;

class RowItemHeader
{
    private array  $headers;
    private string $indexRow;

    public function __construct(private readonly CellItemHeader $cellItemHeader)
    {
    }

    public function setRow(int $row): static
    {
        $this->indexRow                 = fake()->uuid();
        $this->headers[$this->indexRow] = [
            'row'  => $row,
            'data' => []
        ];
        return $this;
    }

    public function setBackgroundColor(string $backgroundColor): static
    {
        $this->headers[$this->indexRow]['backgroundColor'] = $backgroundColor;
        return $this;
    }

    public function setColor(string $color): static
    {
        $this->headers[$this->indexRow]['color'] = $color;
        return $this;
    }


    public function setHeight(int $height): static
    {
        $this->headers[$this->indexRow]['height'] = $height;
        return $this;
    }

    public function setWidth(int $width): static
    {
        $this->headers[$this->indexRow]['width'] = $width;
        return $this;
    }

    public function setFontSize(int $fontSize): static
    {
        $this->headers[$this->indexRow]['fontSize'] = $fontSize;
        return $this;
    }

    public function setAlignHorizontal(AlignHorizontal $alignHorizontal): static
    {
        $this->headers[$this->indexRow]['alignHorizontal'] = $alignHorizontal->value;
        return $this;
    }

    public function setAlignVertical(AlignVertical $alignVertical): static
    {
        $this->headers[$this->indexRow]['alignVertical'] = $alignVertical->value;
        return $this;
    }

    public function setBold(): static
    {
        $this->headers[$this->indexRow]['bold'] = true;
        return $this;
    }

    public function setItalic(): static
    {
        $this->headers[$this->indexRow]['italic'] = true;
        return $this;
    }

    public function setUnderline(): static
    {
        $this->headers[$this->indexRow]['underline'] = true;
        return $this;
    }

    public function setCellColspan(int $colspan): CellItemHeader
    {
        $this->cellItemHeader->setIndex()->setCell($colspan);
        return $this->cellItemHeader;
    }

    public function endRow(): void
    {
        $this->headers[$this->indexRow]['data'] = array_values($this->cellItemHeader->getCells());
        $this->cellItemHeader->clear();
    }

    public function getHeaders(): array
    {
        return array_values($this->headers);
    }

    public function clear(): void
    {
        $this->headers = [];
    }

}