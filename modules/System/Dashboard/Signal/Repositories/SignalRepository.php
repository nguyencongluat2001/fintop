<?php

namespace Modules\System\Dashboard\Signal\Repositories;

use Modules\Base\Repository;
use Modules\System\Dashboard\Signal\Models\SignalModel;

class SignalRepository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return SignalModel::class;
    }
}