<?php

namespace App\Repositories;

use App\Models\Ator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AtorRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AtorRepositoryEloquent extends BaseRepository implements AtorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
