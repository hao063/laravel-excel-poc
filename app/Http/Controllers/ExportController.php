<?php

namespace App\Http\Controllers;

use App\Base\BaseExcel\ExportMultipleSheet;
use App\Services\TestExportExcel;

class ExportController extends Controller
{
    public function __construct(
        private readonly TestExportExcel $testExportExcel,
        private readonly ExportMultipleSheet $exportMultipleSheet
    )
    {
    }

    public function export()
    {
        return $this->testExportExcel->upload();
//        $filePath = 'excel/test_'.Carbon::now()->timestamp.'.xlsx';
//        Excel::store($this->testExportExcel, $filePath, 's3');
//        Storage::disk('s3')->setVisibility($filePath, 'public');
//        dd(Storage::disk('s3')->url($filePath));
//        return Excel::download($this->testExportExcel, $filename);
    }

    public function export2()
    {
        return $this->exportMultipleSheet->upload();
    }
}