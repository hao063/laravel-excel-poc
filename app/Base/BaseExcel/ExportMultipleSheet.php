<?php

namespace App\Base\BaseExcel;

use App\Base\Items\RowItemHeader;
use App\Base\Operations\FormatDataResponse;
use App\Base\Repositories\StoreExcelRepository;
use App\Services\DataTransformer;
use App\Services\TestExportExcel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;

class ExportMultipleSheet implements WithMultipleSheets
{
    public function __construct(
        public readonly RowItemHeader        $headerItem,
        public readonly FormatDataResponse   $formatDataResponse,
        public readonly StoreExcelRepository $storeExcelRepository
    ) {
    }

    public function sheets(): array
    {
        $className = ['Name1', 'Name2'];

        $sheets = [];
        foreach ($className as $name) {
            $transformer = new DataTransformer;
            $sheets[] = (new TestExportExcel(
                $this->headerItem,
                $this->formatDataResponse,
                $this->storeExcelRepository,
                $transformer
            ))->setTitleSheet($name);
        }
        return $sheets;
    }

    public function upload()
    {

        Excel::store($this, 'asdsad.xlsx', 's3');
        Storage::disk('s3')->setVisibility('asdsad.xlsx', 'public');
        return Storage::disk('s3')->url('asdsad.xlsx');
    }

}