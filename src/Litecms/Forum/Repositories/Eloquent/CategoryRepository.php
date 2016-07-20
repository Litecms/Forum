<?php

namespace Litecms\Forum\Repositories\Eloquent;

use Litecms\Forum\Interfaces\CategoryRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
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
        $this->fieldSearchable = config('package.forum.category.search');
        return config('package.forum.category.model');
    }

    /**
     * take categories
     * @return type
     */

    public function getCategories()
    {
        return $this->model->whereStatus('Show')->orderBy('name', 'ASC')->get();
    }
}
