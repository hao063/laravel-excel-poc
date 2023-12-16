<?php

namespace App\Base\BaseExcel;

use App\Base\Configs\Constant;
use App\Base\Exceptions\NotFoundStorageDriverException;
use App\Base\Items\RowItemHeader;
use App\Base\Operations\FormatDataResponse;
use App\Base\Operations\WorkSheetOperation;
use App\Base\Repositories\StoreExcelRepository;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

abstract class ExportExcelHeader implements FromView, ShouldAutoSize, WithTitle, WithStyles
{
    private string $title;

    public function __construct(
        public readonly RowItemHeader        $headerItem,
        public readonly FormatDataResponse   $formatDataResponse,
        public readonly StoreExcelRepository $storeExcelRepository,
        public readonly WorkSheetOperation   $workSheetOperation
    ) {
    }

    public function view(): View
    {
        $this->setHeaders();
        $headers = $this->headerItem->getHeaders();
        $this->headerItem->clear();
        $responseData        = $this->responseData();
        $formatsDataResponse = $this->formatDataResponse->getFormatsDataResponse();
        $this->formatDataResponse->clear();
        return view(
            'sheet_header_horizontal',
            compact('headers', 'responseData', 'formatsDataResponse')
        );
    }

    public function title(): string
    {
        return $this->titleSheet();
    }

    abstract public function setHeaders(): void;

    abstract public function responseData(): array;

    public function titleSheet(): string
    {
        return $this->title ?? Constant::TITLE_SHEET_DEFAULT;
    }

    public function setTitleSheet(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function download(string $fileName = ''): BinaryFileResponse
    {
        return $this->storeExcelRepository->download($this, $fileName);
    }

    /**
     * @throws NotFoundStorageDriverException
     */
    public function upload(string $fileName = ''): string
    {
        return $this->storeExcelRepository->upload($this, $fileName);
    }

    public function styles(Worksheet $sheet)
    {
        $this->styleWorkSheet($sheet);
    }

    abstract public function styleWorkSheet(Worksheet $sheet): void;

}