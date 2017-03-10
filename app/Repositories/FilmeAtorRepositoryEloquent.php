<?php

namespace App\Repositories;

use App\Models\FilmeAtor;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class FilmeAtorRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FilmeAtorRepositoryEloquent extends BaseRepository implements FilmeAtorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FilmeAtor::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
