<?php

namespace App\Services;

use App\Base\BaseExcel\ExportExcelHeader;
use App\Base\Configs\Constant;
use App\Base\Enums\AlignHorizontal;
use App\Base\Enums\AlignVertical;
use App\Base\Enums\BorderType;
use App\Base\Items\RowItemHeader;
use App\Base\Operations\FormatDataResponse;
use App\Base\Operations\WorkSheetColumnOperation;
use App\Base\Operations\WorkSheetDataOperation;
use App\Base\Operations\WorkSheetRowOperation;
use App\Base\Repositories\StoreExcelRepository;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TestExportExcel extends ExportExcelHeader implements WithEvents, WithDrawings
{

    public function __construct(
        RowItemHeader                   $headerItem,
        FormatDataResponse              $formatDataResponse,
        StoreExcelRepository            $uploadExcelRepository,
        public readonly DataTransformer $dataTransformer
    ) {
        parent::__construct($headerItem, $formatDataResponse, $uploadExcelRepository);
    }

    public function setHeaders(): void
    {
        $receivableGroups = $this->receivableGroups();
        $receivables      = collect($receivableGroups)->pluck('receivables')->collapse();

        $row = $this->headerItem->setRow(1)->setAlignHorizontal(AlignHorizontal::CENTER);
        $row->setCellColspan(5);
        $row->setCellColspan(8)->setTitle('ĐỢT THU THÁNG 12 - MẦM NON KIDSONLINE 2')->setBold();
        $row->endRow();

        $row = $this->headerItem->setRow(1)->setAlignHorizontal(AlignHorizontal::CENTER);
        $row->setCellColspan(5);
        $row->setCellColspan(8)->setTitle('Thời hạn đóng phí: 12/12/2023')->setBold();
        $row->endRow();

        $row = $this->headerItem->setRow(1);
        $row->endRow();

        $row1 = $this->headerItem->setRow(1)
            ->setAlignHorizontal(AlignHorizontal::CENTER)
            ->setAlignVertical(AlignVertical::TOP)
            ->setBackgroundColor('#009ef7')
            ->setColor('#F9F9F9');
        $row1->setCellColspan(1)->setTitle('STT')->setRowspan(2);
        $row1->setCellColspan(1)->setTitle('Học sinh')->setRowspan(2);
        $row1->setCellColspan(1)->setTitle('Mã')->setRowspan(2)->setWidth(150);
        $row1->setCellColspan(1)->setTitle('Ngày sinh')->setRowspan(2);
        $row1->setCellColspan(1)->setTitle('Lớp')->setRowspan(2);
        foreach ($receivableGroups as $receivableGroup) {
            $row1->setCellColspan(count($receivableGroup['receivables']))
                ->setTitle($receivableGroup['name'])
                ->setHeight(35);
        }
        $row1->setCellColspan(1)->setTitle('Tổng cộng Đợt thu tháng 12')
            ->setRowspan(2)
            ->setWidth(80);
        $row1->setCellColspan(1)
            ->setTitle('Các khoản thu của Đợt thu tháng 12 & đợt truy thu của Tháng 11')
            ->setRowspan(2)
            ->setWidth(80);
        $row1->setCellColspan(1)->setTitle('Phương thức thanh toán')
            ->setRowspan(2)
            ->setWidth(80);
        $row1->setCellColspan(1)->setTitle('Thời gian thanh toán')
            ->setRowspan(2)
            ->setWidth(80);
        $row1->setCellColspan(1)->setTitle('Ngày thanh toán')
            ->setRowspan(2)
            ->setWidth(80);
        $row1->setCellColspan(1)->setTitle('người thanh toán')
            ->setRowspan(2)
            ->setWidth(80);
        $row1->setCellColspan(1)->setTitle('note')
            ->setRowspan(2)
            ->setWidth(80);
        $row1->endRow();

        $row2 = $this->headerItem->setRow(2)
            ->setAlignHorizontal(AlignHorizontal::CENTER)
            ->setAlignVertical(AlignVertical::TOP)
            ->setBackgroundColor('#009ef7')
            ->setColor('#F9F9F9');
        foreach ($receivables as $receivable) {
            $row1->setCellColspan(1)->setTitle($receivable['name'])
                ->setWidth(80)
                ->setHeight(100);
        }
        $row2->endRow();
    }

//WithDrawings
    public function drawings(): array
    {
        $drawing = new Drawing();
        $drawing->setName('Sample Image');
        $drawing->setPath(public_path('1.jpg'));
        $drawing->setHeight(70);
        $drawing->setCoordinates('A1');
        return [$drawing];
    }

//
//    public function styles(Worksheet $sheet)
//    {
//        WorkSheetColumnOperation::wrapText($sheet, 'C');
//        WorkSheetRowOperation::wrapText($sheet, 4);
//        WorkSheetRowOperation::wrapText($sheet, 5);
//        WorkSheetDataOperation::border($sheet, BorderType::BORDER_THIN, 'a7a8bb');
//    }

    public function receivableGroups(): array
    {
        return [
            [
                "name"        => "Phu Huynh",
                "receivables" => [
                    [
                        "name"         => "An sang",
                        "id"           => "cd788d78-34b1-4ad7-ba86-eadf44d2b093",
                        "generateType" => 2
                    ],
                    [
                        "name"         => "An trua",
                        "id"           => "e43f92d1-ba81-45a4-b1ca-542508f91d78",
                        "generateType" => 2
                    ]
                ]
            ],
            [
                "name"        => "Nha truong",
                "receivables" => [
                    [
                        "name"         => "Khoan Thu Thanh Tetst",
                        "id"           => "0581643c-2fc6-4d51-a3a2-d1a317c424df",
                        "generateType" => 2
                    ],
                    [
                        "name"         => "Hoc ngoai khoa chua co doi tuong ap dung",
                        "id"           => "a837fde6-b3f6-4bfd-bf7d-1befd823c589",
                        "generateType" => 2
                    ],
                    [
                        "name"         => "An toi",
                        "id"           => "382598d5-654c-43eb-8a42-d6fac7317a8a",
                        "generateType" => 2
                    ],
                    [
                        "name"         => "Hoc them sang",
                        "id"           => "261614ce-fffe-4a8a-baa0-d304b84d04a7",
                        "generateType" => 2
                    ],
                    [
                        "name"         => "Hoc phi",
                        "id"           => "86ecd0fd-3f73-4942-bd41-dcec326a576b",
                        "generateType" => 2
                    ]
                ]
            ]
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $workSheet = $event->sheet->getDelegate();
                $workSheet->freezePane('F4');
            },
        ];
    }

    public function responseData(): array
    {
        $this->formatDataResponse->setHeight(50);
        return $this->dataTransformer->data();
    }

    public function styleWorkSheet(Worksheet $sheet): void
    {
    }
}