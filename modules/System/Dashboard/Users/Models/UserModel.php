<?php

namespace Modules\System\Dashboard\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\System\Dashboard\Users\Models\UserInfoModel;

class UserModel extends Model
{
    protected $table = 'users';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'email',
        'avatar',
        'password',
        'dateBirth',
        'role',
        'status',
        'investment_time',
        'investment_taste',
        'investment_company',
        'account_tkck_vps',
        'id_personnel',
        'id_manage',
        'account_type_vip',
        'date_update_vip',
        'created_at',
        'updated_at'
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'search':
                $this->value = $value;
                return $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->value . '%')
                          ->orWhere('id_personnel', 'like', '%' . $this->value . '%')
                          ->orWhere('phone', 'like', '%' . $this->value . '%')
                          ->orWhere('email', 'like', '%' . $this->value . '%');
                });       
                return $query;
            case 'role':
                $query->whereNotIn('role',$value);
                return $query;
            case 'id_manage':
                $query->whereIn('id_manage', $value)->orWhereIn('id_personnel', $value);
                return $query;
            case 'sortType':
                $query->orderBy('created_at', 'ASC');
            default:
                return $query;
        }
    }
    public function userInfo()
    {
        return $this->belongsTo(UserInfoModel::class, 'id', 'user_id');
    }
}
