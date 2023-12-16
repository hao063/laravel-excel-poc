<?php

namespace App\Base\Operations;

use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;

class FormatDataResponse
{
    public array $formats;

    public function setHeight(int $height): static
    {
        $this->formats['height'] = $height;
        return $this;
    }

    public function setWidth(int $width): static
    {
        $this->formats['width'] = $width;
        return $this;
    }


    public function setColor(string $color): static
    {
        $this->formats['color'] = $color;
        return $this;
    }

    public function setFontSize(int $fontSize): static
    {
        $this->formats['fontSize'] = $fontSize;
        return $this;
    }

    public function setAlignHorizontal(AlignHorizontal $alignHorizontal): static
    {
        $this->formats['alignHorizontal'] = $alignHorizontal->value;
        return $this;
    }

    public function setAlignVertical(AlignVertical $alignVertical): static
    {
        $this->formats['alignVertical'] = $alignVertical->value;
        return $this;
    }

    public function setBold(): static
    {
        $this->formats['bold'] = true;
        return $this;
    }

    public function setItalic(): static
    {
        $this->formats['italic'] = true;
        return $this;
    }

    public function setUnderline(): static
    {
        $this->formats['underline'] = true;
        return $this;
    }

    public function clear(): void
    {
        $this->formats = [];
    }

    public function getFormatsDataResponse(): array
    {
        return $this->formats ?? [];
    }

}