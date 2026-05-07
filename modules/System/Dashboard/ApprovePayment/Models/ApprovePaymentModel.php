<?php

namespace Modules\System\Dashboard\ApprovePayment\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\System\Dashboard\Category\Models\CategoryModel;
use Modules\System\Dashboard\Users\Models\UserModel;
use Modules\System\Helpers\NclLibraryHelper;

class ApprovePaymentModel extends Model
{
    protected $table = 'approve_payment';
    public $incrementing = false;
    public $sortable = ['order'];

    protected $fillable = [
        'id',
        'user_id',
        'user_id_introduce',
        'role_client',
        'type_payment',
        'image',
        'order',
        'package',
        'status',
        'created_at',
        'updated_at',
    ];

    public function filter($query, $param, $value)
    {
        switch ($param) {
            case 'id':
                $query->where('id', $value);
                return $query;
            case 'search':
                if(!empty($value)){
                    $query->where(function($sql) use($value){
                        $sql->where('title', 'like', "%$value%")
                        ->orWhere('target', 'like', "%$value%")
                        ->orWhere('stop_loss', 'like', "%$value%");
                    });
                }
                return $query;
            case 'type':
                if(!empty($value)){
                    $query->where('role_client', $value);
                }
                return $query;
            case 'fromdate':
                if(!empty($value)){
                    $query->where('created_at', '>=', date('Y-m-d H:i:s', strtotime(NclLibraryHelper::_ddmmyyyyToyyyymmdd($value, 3))));
                    return $query;
                }
            case 'todate':
                if(!empty($value)){
                    $query->where('created_at', '<=', date('Y-m-d H:i:s', strtotime(NclLibraryHelper::_ddmmyyyyToyyyymmdd($value, 2))));
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
    public function categorys()
    {
        return $this->hasOne(CategoryModel::class, 'code_category', 'role_client');
    }
    
}