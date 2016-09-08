<?php
namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CustomRepositoryInterface
 *
 * @package namespace App\Contracts\Repositories
 */
interface CustomRepositoryInterface extends RepositoryInterface
{
    /**
     * Delete a entity in repository by id
     *
     * @param array $id array of id
     *
     * @return int
     */
    public function deleteIn(array $id);

    /**
     * Get list id
     *
     * @param Collection $data input data
     *
     * @return array
     */
    public function getListId(Collection $data);
}
