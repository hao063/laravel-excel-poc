<?php

namespace App\Services;

use Carbon\Carbon;

class DataTransformer
{

    public function data(): array
    {
        $receivables = collect($this->receivables())->pluck('receivables')->collapse();

        $result = [];
        foreach ($this->dataHandle() as $key => $item) {
            $result[$key]          = [
                $key++,
                $item['student']['fullName'],
                $item['student']['code'],
                Carbon::parse($item['student']['dob'])->format('d/m/Y'),
                $item['student']['className'],
            ];
            $receivablesForStudent = collect($item['receivables'])->keyBy('id');
            foreach ($receivables as $receivable) {
                if (isset($receivablesForStudent[$receivable['id']])) {
                    $result[$key][] = $receivablesForStudent[$receivable['id']]['fee'];
                } else {
                    $result[$key][] = '';
                }
            }
            $result[$key] = array_merge($result[$key],
                [
                    $item['totalPaid'],
                    $item['totalPaidAndDebt'],
                    '',
                    '',
                    '',
                    '',
                    '',
                ]);
        }

        return $result;
    }

    public function receivables(): array
    {
        return
            [
                [
                    "name"        => "Phụ Huynh",
                    "receivables" => [
                        [
                            "name"         => "Ăn sáng",
                            "id"           => "cd788d78-34b1-4ad7-ba86-eadf44d2b093",
                            "generateType" => 2
                        ],
                        [
                            "name"         => "Ăn trưa",
                            "id"           => "e43f92d1-ba81-45a4-b1ca-542508f91d78",
                            "generateType" => 2
                        ]
                    ]
                ],
                [
                    "name"        => "Nhà trường",
                    "receivables" => [
                        [
                            "name"         => "Khoản Thu Thành Tetst",
                            "id"           => "0581643c-2fc6-4d51-a3a2-d1a317c424df",
                            "generateType" => 2
                        ],
                        [
                            "name"         => "Học ngoại khóa chưa có đối tượng áp dụng",
                            "id"           => "a837fde6-b3f6-4bfd-bf7d-1befd823c589",
                            "generateType" => 2
                        ],
                        [
                            "name"         => "Ăn tối",
                            "id"           => "382598d5-654c-43eb-8a42-d6fac7317a8a",
                            "generateType" => 2
                        ],
                        [
                            "name"         => "Học thêm sáng",
                            "id"           => "261614ce-fffe-4a8a-baa0-d304b84d04a7",
                            "generateType" => 2
                        ],
                        [
                            "name"         => "Học phí",
                            "id"           => "86ecd0fd-3f73-4942-bd41-dcec326a576b",
                            "generateType" => 2
                        ]
                    ]
                ]
            ];
    }

    public function dataHandle(): array
    {
        return [
            [
                "student"          => [
                    "id"           => "b7b194e3-a554-40d3-acb3-a9ab8bc8b4fc",
                    "schoolId"     => "d8ddb6e8-1cbc-4b69-8103-e71f825c79f6",
                    "schoolYearId" => "b5fae1b2-f541-419d-8b3a-e368a4c131b9",
                    "gradeId"      => "f03605db-7ffd-4299-96a9-fe07dc05aaf1",
                    "classId"      => "0c07566e-7268-4b52-b34e-24ee0dcabc0a",
                    "fullName"     => "  Lucky",
                    "dob"          => 1538758800,
                    "old"          => 5,
                    "gender"       => 1,
                    "phone"        => "",
                    "address"      => "",
                    "joinDate"     => 1693328400,
                    "status"       => 1,
                    "code"         => "TEST_HS-2023-1505-266206-7261",
                    "avatar"       => "",
                    "className"    => "Mẫu Giáo",
                    "gradeName"    => "Lớp mẫu giáo"
                ],
                "receivables"      => [
                    [
                        "id"           => "261614ce-fffe-4a8a-baa0-d304b84d04a7",
                        "fee"          => 27474000,
                        "generateType" => 2
                    ],
                    [
                        "id"           => "382598d5-654c-43eb-8a42-d6fac7317a8a",
                        "fee"          => 2200000,
                        "generateType" => 2
                    ],
                    [
                        "id"           => "86ecd0fd-3f73-4942-bd41-dcec326a576b",
                        "fee"          => 10000000,
                        "generateType" => 2
                    ],
                    [
                        "id"           => "a837fde6-b3f6-4bfd-bf7d-1befd823c589",
                        "fee"          => 1500000,
                        "generateType" => 2
                    ]
                ],
                "totalPaid"        => 41174000,
                "totalPaidAndDebt" => 41174000,
                "paymentMethods"   => [
                    [
                        "index" => 1,
                        "type"  => 2
                    ]
                ],
                "datePayments"     => [
                    [
                        "index" => 1,
                        "date"  => 1701919186
                    ]
                ],
                "paymentNames"     => [
                    [
                        "index" => 1,
                        "name"  => "Kế Toán 69"
                    ]
                ],
                "notes"            => [
                    "Sua nhieu khoan thu cung 1 luc",
                    "Sua nhieu khoan thu cung 1 luc",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "Số lượng ban đầu 2 Bản\nSố lượng đóng trước đã sử dụng 1 Bản",
                    "",
                    "",
                    "",
                    ""
                ]
            ],
            [
                "student"          => [
                    "id"           => "994fc52f-437d-437a-951f-270db3b3cc59",
                    "schoolId"     => "d8ddb6e8-1cbc-4b69-8103-e71f825c79f6",
                    "schoolYearId" => "b5fae1b2-f541-419d-8b3a-e368a4c131b9",
                    "gradeId"      => "f03605db-7ffd-4299-96a9-fe07dc05aaf1",
                    "classId"      => "2a8519f8-302a-4a7c-a4b8-e090daecf8b8",
                    "fullName"     => "  P1",
                    "dob"          => 1391965200,
                    "old"          => 9,
                    "gender"       => 0,
                    "phone"        => "",
                    "address"      => "",
                    "joinDate"     => 1693328400,
                    "status"       => 1,
                    "code"         => "TEST_HS-2023-1505-266198-2272",
                    "avatar"       => "",
                    "className"    => "hồng hạc",
                    "gradeName"    => "Lớp mẫu giáo"
                ],
                "receivables"      => [
                    [
                        "id"           => "261614ce-fffe-4a8a-baa0-d304b84d04a7",
                        "fee"          => 9460000,
                        "generateType" => 2
                    ],
                    [
                        "id"           => "382598d5-654c-43eb-8a42-d6fac7317a8a",
                        "fee"          => 1700000,
                        "generateType" => 2
                    ],
                    [
                        "id"           => "86ecd0fd-3f73-4942-bd41-dcec326a576b",
                        "fee"          => 21000000,
                        "generateType" => 2
                    ],
                    [
                        "id"           => "a837fde6-b3f6-4bfd-bf7d-1befd823c589",
                        "fee"          => 1500000,
                        "generateType" => 2
                    ]
                ],
                "totalPaid"        => 33660000,
                "totalPaidAndDebt" => 33660000,
                "paymentMethods"   => [
                    [
                        "index" => 1,
                        "type"  => 2
                    ]
                ],
                "datePayments"     => [
                    [
                        "index" => 1,
                        "date"  => 1701919186
                    ]
                ],
                "paymentNames"     => [
                    [
                        "index" => 1,
                        "name"  => "Kế Toán 69"
                    ]
                ],
                "notes"            => [
                    "Note",
                    "Số lượng ban đầu 10 Bản\nSố lượng đóng trước đã sử dụng 5 Bản",
                    "",
                    "Số lượng ban đầu 7 Bản\nSố lượng đóng trước đã sử dụng 5 Bản",
                    "",
                    "Số lượng ban đầu 12 Tháng\nSố lượng đóng trước đã sử dụng 10 Tháng",
                    "",
                    ""
                ]
            ],
            [
                "student"          => [
                    "id"           => "198ea1db-48f9-444b-8db1-8b23ced80f27",
                    "schoolId"     => "d8ddb6e8-1cbc-4b69-8103-e71f825c79f6",
                    "schoolYearId" => "b5fae1b2-f541-419d-8b3a-e368a4c131b9",
                    "gradeId"      => "f03605db-7ffd-4299-96a9-fe07dc05aaf1",
                    "classId"      => "2a8519f8-302a-4a7c-a4b8-e090daecf8b8",
                    "fullName"     => "  P2",
                    "dob"          => 1391965200,
                    "old"          => 9,
                    "gender"       => 1,
                    "phone"        => "",
                    "address"      => "",
                    "joinDate"     => 1693328400,
                    "status"       => 1,
                    "code"         => "TEST_HS-2023-1505-266199-2186",
                    "avatar"       => "",
                    "className"    => "hồng hạc",
                    "gradeName"    => "Lớp mẫu giáo"
                ],
                "receivables"      => [
                    [
                        "id"           => "261614ce-fffe-4a8a-baa0-d304b84d04a7",
                        "fee"          => 27380000,
                        "generateType" => 2
                    ],
                    [
                        "id"           => "a837fde6-b3f6-4bfd-bf7d-1befd823c589",
                        "fee"          => 1500000,
                        "generateType" => 2
                    ]
                ],
                "totalPaid"        => 28880000,
                "totalPaidAndDebt" => 28880000,
                "paymentMethods"   => [
                    [
                        "index" => 1,
                        "type"  => 2
                    ]
                ],
                "datePayments"     => [
                    [
                        "index" => 1,
                        "date"  => 1701919186
                    ]
                ],
                "paymentNames"     => [
                    [
                        "index" => 1,
                        "name"  => "Kế Toán 69"
                    ]
                ],
                "notes"            => [
                    "Note",
                    "Note",
                    "Note",
                    ""
                ]
            ],
        ];
    }

}