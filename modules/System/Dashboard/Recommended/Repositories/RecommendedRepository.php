<?php

namespace Modules\System\Dashboard\Recommended\Repositories;

use Illuminate\Support\Facades\Hash;
use Modules\Base\Repository;
use Modules\System\Dashboard\Recommended\Models\RecommendedModel;
use Str;

class RecommendedRepository extends Repository
{

    public function __construct(
    ){
        parent::__construct();
    }

    public function model()
    {
        return RecommendedModel::class;
    }
}
