<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Collection;
use App\Models\Lotofacil;

class LotofacilRepository extends DefaultRepository
{
    
    /**
     * LotofacilRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(LotofacilRepository::class);
    }


}