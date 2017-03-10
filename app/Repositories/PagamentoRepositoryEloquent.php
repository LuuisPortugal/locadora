<?php

namespace App\Repositories;

use App\Models\Pagamento;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PagamentoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PagamentoRepositoryEloquent extends BaseRepository implements PagamentoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pagamento::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
