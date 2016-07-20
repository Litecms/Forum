<?php

namespace Litecms\Forum\Repositories\Eloquent;

use Litecms\Forum\Interfaces\ForumRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ForumRepository extends BaseRepository implements ForumRepositoryInterface
{
    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('package.forum.forum.search');
        return config('package.forum.forum.model');
    }

    /**
     * take parent
     * @return type
     */

    public function getParent()
    {
        return $this->model->whereParentId('0')->orderBy('title', 'ASC')->get();
    }

    /**
     * take forum categories
     * @param type $category
     * @return type
     */

    public function categorys($category)
    {
        return $this->model
            ->whereCategoryId($category)
            ->where('published', 'Yes')
            ->orderBy('id', 'DESC')
            ->get();
    }

    /**
     * take count of forum category
     * @param type $id
     * @return type
     */

    public function countCategory($id)
    {

        return $this->model
            ->whereCategoryId($id)
            ->where('published', 'Yes')
            ->count();
    }
}
