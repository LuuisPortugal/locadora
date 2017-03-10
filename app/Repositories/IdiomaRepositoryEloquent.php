<?php

namespace App\Repositories;

use App\Models\Idioma;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class IdiomaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class IdiomaRepositoryEloquent extends BaseRepository implements IdiomaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Idioma::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
