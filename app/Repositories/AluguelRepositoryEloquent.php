<?php

namespace App\Repositories;

use App\Models\Aluguel;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AluguelRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AluguelRepositoryEloquent extends BaseRepository implements AluguelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Aluguel::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
