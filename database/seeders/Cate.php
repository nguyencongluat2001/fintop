<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\System\Dashboard\Category\Models\CateModel;

class Cate extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate = [
            [
                'id' => (string)\Str::uuid(),
                'name' => 'Danh mục bài viết',
                'code_cate' => 'DM_BLOG',
                'order' => CateModel::select("*")->count() + 1,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        CateModel::insert($cate);
    }
}
