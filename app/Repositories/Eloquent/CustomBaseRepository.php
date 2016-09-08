<?php
namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CustomRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CustomBaseRepository
 *
 * @package namespace App\Repositories\Eloquent
 */
abstract class CustomBaseRepository extends BaseRepository implements CustomRepositoryInterface
{
    /**
     * Delete a entity in repository by id
     *
     * @param array $id array of id
     *
     * @return int
     */
    public function deleteIn(array $id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Get list id
     *
     * @param Collection $data collection of data
     *
     * @return array
     */
    public function getListId(Collection $data)
    {
        $accept=config('define.accepted');
        $listId=[];
        if (count($data)) {
            foreach ($data as $item) {
                $listId[]=$item->id;
            }
            return $listId;
        }
        return $accept;
    }
}
