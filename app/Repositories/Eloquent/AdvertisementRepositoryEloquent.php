<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CustomBaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\AdvertisementRepository;
use App\Models\Advertisement;
use App\Validators\AdvertisementValidator;

/**
 * Class AdvertisementRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class AdvertisementRepositoryEloquent extends CustomBaseRepository implements AdvertisementRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Advertisement::class;
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
