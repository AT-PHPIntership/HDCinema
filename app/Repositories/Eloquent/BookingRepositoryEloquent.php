<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CustomBaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\BookingRepository;
use App\Models\Booking;
use App\Validators\BookingValidator;

/**
 * Class BookingRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class BookingRepositoryEloquent extends CustomBaseRepository implements BookingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Booking::class;
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
