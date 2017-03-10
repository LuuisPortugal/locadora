<?php

namespace App\Repositories;

use App\Models\Filme;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class FilmeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FilmeRepositoryEloquent extends BaseRepository implements FilmeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Filme::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
