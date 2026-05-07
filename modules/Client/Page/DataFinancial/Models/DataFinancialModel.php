<?php

namespace Modules\System\Dashboard\DataFinancial\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\System\Dashboard\Users\Models\UserModel;
use Modules\System\Dashboard\Category\Models\CategoryModel;


class DataFinancialModel extends Model
{
    protected $table = 'data_financial';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'code_cp',
        'exchange',
        '08be4b72-4560-4693-8d4a-3fdfe3353cca',
        'ratings_TA',
        'identify_trend',
        'act',
        'trading_price_range',
        'stop_loss_price_zone',
        'ratings_FA',
        'url_link',
        'status',
        'created_at',
        'updated_at'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                return $query->where(function ($query) {
                    $query->where('code_cp', 'like', '%' . $this->value . '%')
                          ->orwhereRelation('users','name', 'like', '%' . $this->value . '%');
                });
                return $query;
            case 'code_category':
                $query->where('code_category', $value);
                return $query;
            case 'act':
                $query->where('act', $value);
                return $query;
            default:
                return $query;
        }
    }
    public function users()
    {
        return $this->hasOne(UserModel::class, 'id', 'user_id');
    }
    public function category()
    {
        return $this->hasOne(CategoryModel::class, 'code_category', 'code_category');
    }
}
