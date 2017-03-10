<?php

namespace App\Repositories;

use App\Models\FilmeTexto;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class FilmeTextoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FilmeTextoRepositoryEloquent extends BaseRepository implements FilmeTextoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FilmeTexto::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
