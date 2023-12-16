<?php

namespace App\Base\Enums;

enum NumberFormatType: string
{
    case FORMAT_GENERAL = 'General';

    case FORMAT_TEXT = '@';

    case FORMAT_NUMBER = '0';
    case FORMAT_NUMBER_0 = '0.0';
    case FORMAT_NUMBER_00 = '0.00';
    case FORMAT_NUMBER_COMMA_SEPARATED1 = '#,##0.00';
    case FORMAT_NUMBER_COMMA_SEPARATED2 = '#,##0.00_-';

    case FORMAT_PERCENTAGE = '0%';
    case FORMAT_PERCENTAGE_0 = '0.0%';
    case FORMAT_PERCENTAGE_00 = '0.00%';

    case FORMAT_DATE_YYYY_MM_DD = 'yyyy-mm-dd';
    case FORMAT_DATE_DD_MM_YYYY = 'dd/mm/yyyy';
    case FORMAT_DATE_D_M_Y_SLASH = 'd/m/yy';
    case FORMAT_DATE_D_M_Y_MINUS = 'd-m-yy';
    case FORMAT_DATE_D_M_MINUS = 'd-m';
    case FORMAT_DATE_M_Y_MINUS = 'm-yy';
    case FORMAT_DATE_XLSX14 = 'mm-dd-yy';
    case FORMAT_DATE_XLSX15 = 'd-mmm-yy';
    case FORMAT_DATE_XLSX16 = 'd-mmm';
    case FORMAT_DATE_XLSX17 = 'mmm-yy';
    case FORMAT_DATE_XLSX22 = 'm/d/yy h:mm';
    case FORMAT_DATE_DATETIME = 'd/m/yy h:mm';
    case FORMAT_DATE_TIME1 = 'h:mm AM/PM';
    case FORMAT_DATE_TIME2 = 'h:mm:ss AM/PM';
    case FORMAT_DATE_TIME3 = 'h:mm';
    case FORMAT_DATE_TIME5 = 'mm:ss';
    case FORMAT_DATE_TIME6 = 'h:mm:ss';
    case FORMAT_DATE_TIME7 = 'i:s.S';
    case FORMAT_DATE_TIME8 = 'h:mm:ss;@';
    case FORMAT_DATE_YYYY_MM_DD_SLASH = 'yyyy/mm/dd;@';

    case FORMAT_CURRENCY_USD_SIMPLE = '"$"#,##0_-';
    case FORMAT_CURRENCY_USD_INTEGER = '$#,##0_-';
    case FORMAT_CURRENCY_USD = '$#,##0.00_-';

    case FORMAT_CURRENCY_EUR_SIMPLE = '#,##0_-"€"';
    case FORMAT_CURRENCY_EUR_INTEGER = '#,##0_-[$€]';
    case FORMAT_CURRENCY_EUR = '#,##0.00_-[$€]';
    case FORMAT_ACCOUNTING_USD = '_("$"* #,##0.00_);_("$"* \(#,##0.00\);_("$"* "-"??_);_(@_)';
    case FORMAT_ACCOUNTING_EUR = '_("€"* #,##0.00_);_("€"* \(#,##0.00\);_("€"* "-"??_);_(@_)';

}