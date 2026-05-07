<?php

namespace Modules\System\Dashboard\Handbook\Models;

use Illuminate\Database\Eloquent\Model;

class HandBookModel extends Model
{
    protected $table = 'handbooks';
    public $incrementing = false;
    public $timestamps = false;

    public $sortable = ['order'];

    protected $fillable = [
        'id',
        'name_handbook',
        'category_handbook',
        'type_handbook',
        'url_link',
        'decision',
        'current_status',
        'order'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                // dd($this->value);
                return $query->where(function ($query) {
                    $query->where('name_handbook', 'like', '%' . $this->value . '%')
                          ->orWhere('decision', 'like', '%' . $this->value . '%');
                });
                return $query;
            case 'cate':
                $query->where('category_handbook', $value);
                return $query;
            case 'sortType':
                $query->orderBy('order', 'ASC');
            default:
                return $query;
        }
    }
}
