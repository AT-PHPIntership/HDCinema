<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CustomBaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\CommentRepository;
use App\Models\Comment;
use App\Validators\CommentValidator;

/**
 * Class CommentRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class CommentRepositoryEloquent extends CustomBaseRepository implements CommentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comment::class;
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
