<?php

namespace Modules\System\Dashboard\Effective\Repositories;

use Modules\Base\Repository;
use Modules\System\Dashboard\Effective\Models\EffectiveModel;

class EffectiveRepository extends Repository
{

    public function __construct(
    ){
        parent::__construct();
    }

    public function model()
    {
        return EffectiveModel::class;
    }
}
