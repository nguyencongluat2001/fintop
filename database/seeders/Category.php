<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\System\Dashboard\Category\Models\CategoryModel;
use Modules\System\Dashboard\Category\Models\CateModel;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate = [
            [
                'id' => (string)\Str::uuid(),
                'name' => 'Danh mục quyền',
                'code_cate' => 'DM_QUYEN',
                'order' => CateModel::select("*")->count() + 1,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        CateModel::insert($cate);
        $params = [
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_QUYEN',
                'name_category' => 'Admin',
                'code_category' => 'ADMIN',
                'order' => CategoryModel::select('id')->count() + 5,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_QUYEN',
                'name_category' => 'MANAGE',
                'code_category' => 'MANAGE',
                'order' => CategoryModel::select('id')->count() + 6,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_QUYEN',
                'name_category' => 'ADMIN',
                'code_category' => 'ADMIN',
                'order' => CategoryModel::select('id')->count() + 7,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        CategoryModel::insert($params);
    }
}
