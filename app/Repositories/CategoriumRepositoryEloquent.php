<?php

namespace App\Repositories;

use App\Models\Categorium;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoriumRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoriumRepositoryEloquent extends BaseRepository implements CategoriumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categorium::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
