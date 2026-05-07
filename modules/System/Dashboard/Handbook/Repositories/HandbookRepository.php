<?php

namespace Modules\System\Dashboard\Handbook\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Position\Models\PositionModel;
use Modules\System\Dashboard\Handbook\Models\HandBookModel;

class HandbookRepository extends Repository
{
    public function model(){
        return HandBookModel::class;
    }
}
