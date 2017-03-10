<?php

namespace App\Repositories;

use App\Models\Inventario;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class InventarioRepositoryEloquent
 * @package namespace App\Repositories;
 */
class InventarioRepositoryEloquent extends BaseRepository implements InventarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Inventario::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
