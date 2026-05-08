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
    public $sortable = ['code_category', 'order'];

    protected $fillable = [
        'id',
        'user_id',

        'code_cp',
        'exchange',
        'code_category',

        'identify_trend',
        'status_model',
        'model',

        'trading_price_resist',
        'trading_price_range',
        'stop_loss_price_zone',

        'ratings_TA',
        'ratings_FA',

        'status',
        'order',

        'user_take_on'
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
                if(!empty($value)){
                    $query->whereIn('code_category', $value);
                    return $query;
                }
            case 'code_act':
                if(!empty($value)){
                    $query->whereIn('act', $value);
                    return $query;
                }
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
