<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CustomBaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TypeFilmRepository;
use App\Models\TypeFilm;
use App\Validators\TypeFilmValidator;

/**
 * Class TypeFilmRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class TypeFilmRepositoryEloquent extends CustomBaseRepository implements TypeFilmRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TypeFilm::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     *
     * @return string
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
