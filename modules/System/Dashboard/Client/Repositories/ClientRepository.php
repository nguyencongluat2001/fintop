<?php

namespace Modules\System\Dashboard\Client\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\Client\Models\UserModel;

class ClientRepository extends Repository
{
    public function model(){
        return UserModel::class;
    }
}
