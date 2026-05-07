<?php

namespace Modules\System\Dashboard\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\System\Dashboard\Blog\Models\BlogDetailModel;
use Modules\System\Dashboard\Blog\Models\BlogImagesModel;
use Modules\System\Dashboard\Users\Models\UserModel;

class BlogModel extends Model
{
    protected $table = 'blogs';
    public $incrementing = false;
    public $timestamps = false;
    public $sortable = ['created_at'];

    protected $fillable = [
        'id',
        'code_blog',
        'user_id',
        'code_category',
        'type_blog',
        'status',
        'view_click',
        'created_at',
        'updated_at'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                return $query->where(function ($query) {
                    $query->whereRelation('detailBlog', 'title', $this->value)
                        ->orWhere('code_blog', 'like', '%' . $this->value . '%');
                });
                break;

            case 'category':
                $query->where('code_category', $value);
                return $query;
                break;

            case 'sortType':
                $query->orderBy('created_at', 'DESC');
                return $query;
                break;

            case 'status':
                if ($value != 'system') {
                    return $query->where('status', 1);
                }
                return $query;
                break;

            default:
                return $query;
        }
    }

    public function detailBlog()
    {
        return $this->hasOne(BlogDetailModel::class, 'code_blog', 'code_blog');
    }
    public function imageBlog()
    {
        return $this->hasMany(BlogImagesModel::class, 'code_blog', 'code_blog');
    }
    public function users()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
