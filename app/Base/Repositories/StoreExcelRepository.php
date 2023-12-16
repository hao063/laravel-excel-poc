<?php

namespace App\Base\Repositories;


use App\Base\BaseExcel\ExportExcelHeader;
use App\Base\Exceptions\NotFoundStorageDriverException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StoreExcelRepository
{
    private string $storageDriver = "s3";

    public function download(ExportExcelHeader $exportExcelHeader, string $fileName): BinaryFileResponse
    {
        $filePath = $this->getPath($fileName);
        return Excel::download($exportExcelHeader, $filePath);
    }

    /**
     * @throws NotFoundStorageDriverException
     */
    public function upload(ExportExcelHeader $exportExcelHeader, string $fileName): string
    {
        $filePath = $this->getPath($fileName);
        return match ($this->storageDriver) {
            "s3"      => $this->uploadWithAws($filePath, $exportExcelHeader),
            "storage" => $this->uploadWithStorage($filePath, $exportExcelHeader),
            default   => throw new NotFoundStorageDriverException,
        };
    }

    private function uploadWithAws(string $filePath, ExportExcelHeader $exportExcelHeader): string
    {
        Excel::store($exportExcelHeader, $filePath, 's3');
        Storage::disk('s3')->setVisibility($filePath, 'public');
        return Storage::disk('s3')->url($filePath);
    }

    private function uploadWithStorage(string $filePath, ExportExcelHeader $exportExcelHeader): string
    {
        Excel::store($exportExcelHeader, $filePath);
        return Storage::path($filePath);
    }

    private function getPath(string $fileName): string
    {
        $fileName = empty($fileName) ? rand().'-'.Carbon::now()->timestamp : $fileName;
        return $fileName.'.xlsx';
    }


}