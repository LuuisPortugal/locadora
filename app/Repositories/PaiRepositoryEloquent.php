<?php

namespace App\Repositories;

use App\Models\Pai;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PaiRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PaiRepositoryEloquent extends BaseRepository implements PaiRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pai::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
