<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CustomBaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\ScheduleRepository;
use App\Models\Schedule;
use App\Validators\ScheduleValidator;

/**
 * Class ScheduleRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ScheduleRepositoryEloquent extends CustomBaseRepository implements ScheduleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Schedule::class;
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
