<?php

namespace App\Base\Items;

use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;

class CellItemHeader
{
    private array  $cells;
    private string $index;

    public function __construct()
    {
    }

    public function setIndex(): static
    {
        $this->index = fake()->uuid();
        return $this;
    }

    public function setCell(int $colspan): static
    {
        $this->cells[$this->index]['colspan'] = $colspan;
        return $this;
    }

    public function setRowspan(int $rowspan): static
    {
        $this->cells[$this->index]['rowspan'] = $rowspan;
        return $this;
    }

    public function setHeight(int $height): static
    {
        $this->cells[$this->index]['height'] = $height;
        return $this;
    }

    public function setWidth(int $width): static
    {
        $this->cells[$this->index]['width'] = $width;
        return $this;
    }

    public function setBackgroundColor(string $backgroundColor): static
    {
        $this->cells[$this->index]['backgroundColor'] = $backgroundColor;
        return $this;
    }

    public function setColor(string $color): static
    {
        $this->cells[$this->index]['color'] = $color;
        return $this;
    }


    public function setTitle(string $title): static
    {
        $this->cells[$this->index]['title'] = $title;
        return $this;
    }

    public function setFontSize(int $fontSize): static
    {
        $this->cells[$this->index]['fontSize'] = $fontSize;
        return $this;
    }

    public function setAlignHorizontal(AlignHorizontal $alignHorizontal): static
    {
        $this->cells[$this->index]['alignHorizontal'] = $alignHorizontal->value;
        return $this;
    }

    public function setAlignVertical(AlignVertical $alignVertical): static
    {
        $this->cells[$this->index]['alignVertical'] = $alignVertical->value;
        return $this;
    }

    public function setBold(): static
    {
        $this->cells[$this->index]['bold'] = true;
        return $this;
    }

    public function setItalic(): static
    {
        $this->cells[$this->index]['italic'] = true;
        return $this;
    }

    public function setUnderline(): static
    {
        $this->cells[$this->index]['underline'] = true;
        return $this;
    }


    public function getCells(): array
    {
        return $this->cells;
    }

    public function clear(): void
    {
        $this->cells = [];
        $this->index = '';
    }
}