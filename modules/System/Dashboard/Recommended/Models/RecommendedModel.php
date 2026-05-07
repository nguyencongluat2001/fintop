<?php

namespace Modules\System\Dashboard\Recommended\Models;

use Illuminate\Database\Eloquent\Model;
// use Modules\Core\Ncl\Http\BaseModel;

class RecommendedModel extends Model
{
    protected $table = 'recommendations';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'code_cp',
        'code_category',
        'percent_of_assets',
        'price',
        'price_range',
        'current_price',
        'profit_and_loss',
        'pickcolor',
        'act',
        'stop_loss',
        'closing_percentage',
        'note',
        'status',
        'order',
        'created_at',
        'updated_at',
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                // dd($this->value);
                return $query->where(function ($query) {
                    // $query->where('name', 'like', '%' . $this->value . '%')
                    //       ->orWhere('code_cate','like', '%' . $this->value . '%')
                    //       ->orWhere('decision','like', '%' . $this->value . '%');
                });
                return $query;
            // case 'role':
            //     // $query->where('role', $value);
            //     return $query;
            case 'sortType':
                if(!empty($value)){
                    $query->orderBy('order', 'ASC');
                    return $query;
                }
            default:
                return $query;
        }
    }
}
