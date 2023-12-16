<?php

namespace App\Base\Enums;

enum BorderType: string
{
    case BORDER_NONE                = 'none';
    case BORDER_DASH_DOT            = 'dashDot';
    case BORDER_DASH_DOT_DOT        = 'dashDotDot';
    case BORDER_DASHED              = 'dashed';
    case BORDER_DOTTED              = 'dotted';
    case BORDER_DOUBLE              = 'double';
    case BORDER_HAIR                = 'hair';
    case BORDER_MEDIUM              = 'medium';
    case BORDER_MEDIUM_DASH_DOT     = 'mediumDashDot';
    case BORDER_MEDIUM_DASH_DOT_DOT = 'mediumDashDotDot';
    case BORDER_MEDIUM_DASHED       = 'mediumDashed';
    case BORDER_SLANT_DASH_DOT      = 'slantDashDot';
    case BORDER_THICK               = 'thick';
    case BORDER_THIN                = 'thin';
    case BORDER_OMIT                = 'omit';
}