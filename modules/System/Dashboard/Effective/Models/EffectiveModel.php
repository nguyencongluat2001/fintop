<?php

namespace Modules\System\Dashboard\Effective\Models;

use Illuminate\Database\Eloquent\Model;
// use Modules\Core\Ncl\Http\BaseModel;

class EffectiveModel extends Model
{
    protected $table = 'effectiveness';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'code_cp',
        'code_category',
        'percent_of_assets',
        'closing_percentage',
        'price',
        'date_close',
        'price_close',
        'profit_and_loss',
        'pickcolor',
        'note',
        'status',
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
                    $query->orderBy('date_close', 'DESC');
                    return $query;
                }
            default:
                return $query;
        }
    }
}
