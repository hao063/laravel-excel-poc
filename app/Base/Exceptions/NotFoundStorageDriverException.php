<?php

namespace App\Base\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class NotFoundStorageDriverException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'error' => 'Bạn chưa cấu hình dịch vụ lưu file',
        ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
    }
}