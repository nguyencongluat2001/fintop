<?php

namespace Modules\System\Dashboard\DataFinancial\Repositories;

use DB;
use Modules\Base\Repository;
use Modules\System\Dashboard\DataFinancial\Models\DataFinancialModel;

class DataFinancialRepository extends Repository
{
    public function model(){
        return DataFinancialModel::class;
    }
}
