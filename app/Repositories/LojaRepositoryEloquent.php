<?php

namespace App\Repositories;

use App\Models\Loja;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class LojaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LojaRepositoryEloquent extends BaseRepository implements LojaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Loja::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
