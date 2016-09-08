<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CustomBaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\FilmRepository;
use App\Models\Film;
use App\Validators\FilmValidator;

/**
 * Class FilmRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class FilmRepositoryEloquent extends CustomBaseRepository implements FilmRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Film::class;
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
