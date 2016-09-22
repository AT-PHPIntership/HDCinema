<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CustomBaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\RoomRepository;
use App\Models\Room;
use App\Validators\RoomValidator;

/**
 * Class RoomRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class RoomRepositoryEloquent extends CustomBaseRepository implements RoomRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Room::class;
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
