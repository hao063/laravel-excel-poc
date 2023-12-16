<table>
    <thead>
    @foreach($headers as $header)
        <tr>
            @foreach($header['data'] as $item)
                <th rowspan="{{rowspanCell($item)}}" colspan="{{colspanCell($item)}}"
                    style="
                    @if(isBackgroundColor($header, $item))
                        background-color: {{codeBackgroundColorItemCell($header, $item)}};
                    @endif
                    @if(isFontSize($header, $item))
                        font-size: {{fontSize($header, $item)}};
                    @endif
                    vertical-align: {{verticalAlign($header, $item)}};
                    @if(isColor($header, $item))
                        color: {{color($header, $item)}};
                    @endif
                    @if(isBold($header, $item))
                        font-weight: bold;
                    @endif
                    @if(isItalic($header, $item))
                        font-style: italic;
                    @endif
                    @if(isUnderline($header, $item))
                         text-decoration: underline;
                    @endif
                    @if(isTextAlign($header, $item))
                        text-align:{{textAlign($header, $item)}};
                    @endif
                    "
                    @if(isHeightCell($header, $item))
                        height="{{heightCell($header, $item)}}"
                    @endif
                    @if(isWidthCell($header, $item))
                        width="{{widthCell($header, $item)}}"
                    @endif
                >
                    {{title($item)}}
                </th>
            @endforeach
        </tr>
    @endforeach
    </thead>
    <tbody>
    @foreach($responseData as $row)
        <tr>
            @foreach($row as $cell)
                <td style="
                    @if(isBackgroundColor($formatsDataResponse, []))
                        background-color: {{codeBackgroundColorItemCell($formatsDataResponse, [])}};
                    @endif
                    @if(isFontSize($formatsDataResponse, []))
                        font-size: {{fontSize($formatsDataResponse, [])}};
                    @endif
                    vertical-align: {{verticalAlign($formatsDataResponse, [])}};
                    @if(isColor($formatsDataResponse, []))
                        color: {{color($formatsDataResponse, [])}};
                    @endif
                    @if(isBold($formatsDataResponse, []))
                        font-weight: bold;
                    @endif
                    @if(isItalic($formatsDataResponse, []))
                        font-style: italic;
                    @endif
                    @if(isUnderline($formatsDataResponse, []))
                         text-decoration: underline;
                    @endif
                    @if(isTextAlign($formatsDataResponse, []))
                        text-align:{{textAlign($formatsDataResponse, [])}};
                    @endif
                    "
                    @if(isHeightCell($formatsDataResponse, []))
                        height="{{heightCell($formatsDataResponse, [])}}"
                    @endif
                    @if(isWidthCell($formatsDataResponse, []))
                        width="{{widthCell($formatsDataResponse, [])}}"
                        @endif
                > {{$cell}}</td>
            @endforeach
        </tr>
    @endforeach

    </tbody>
</table>




