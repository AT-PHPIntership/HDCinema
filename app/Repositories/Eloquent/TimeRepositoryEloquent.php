<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TimeRepository;
use App\Models\Time;
use App\Validators\TimeValidator;

/**
 * Class TimeRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class TimeRepositoryEloquent extends BaseRepository implements TimeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Time::class;
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
