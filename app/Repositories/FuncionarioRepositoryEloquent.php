<?php

namespace App\Repositories;

use App\Models\Funcionario;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class FuncionarioRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FuncionarioRepositoryEloquent extends BaseRepository implements FuncionarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Funcionario::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
