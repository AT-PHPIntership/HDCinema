<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CustomBaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\CinemaRepository;
use App\Models\Cinema;
use App\Validators\CinemaValidator;

/**
 * Class CinemaRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class CinemaRepositoryEloquent extends CustomBaseRepository implements CinemaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cinema::class;
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
