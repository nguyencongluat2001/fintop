<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\System\Dashboard\Blog\Models\BlogModel;
use Modules\System\Dashboard\Category\Models\CategoryModel;
use Modules\System\Dashboard\Category\Models\CateModel;

class CategoryBlog extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate = [
            'id' => (string)\Str::uuid(),
            'name' => 'Danh mục bài viết',
            'code_cate' => 'DM_BLOG',
            'order' => BlogModel::select('id')->count() + 1,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        CateModel::insert($cate);
        $params = [
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_BLOG',
                'name_category' => 'Phân tích thị trường',
                'code_category' => 'BAO_CAO_THTT',
                'order' => CategoryModel::select('id')->count() + 1,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_BLOG',
                'name_category' => 'Tổng kết phiên',
                'code_category' => 'BAO_CAO_PTDTVIP',
                'order' => CategoryModel::select('id')->count() + 2,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_BLOG',
                'name_category' => 'BCPT Ngành',
                'code_category' => 'BAO_CAO_PTDN',
                'order' => CategoryModel::select('id')->count() + 3,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_BLOG',
                'name_category' => 'Phân tích cổ phiếu',
                'code_category' => 'BAO_CAO_PTCP',
                'order' => CategoryModel::select('id')->count() + 4,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        CategoryModel::insert($params);
    }
}
