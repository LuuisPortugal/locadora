<?php

namespace App\Repositories;

use App\Models\FilmeCategorium;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class FilmeCategoriumRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FilmeCategoriumRepositoryEloquent extends BaseRepository implements FilmeCategoriumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FilmeCategorium::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
