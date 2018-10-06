<?php

namespace Litecms\Forum\Repositories\Eloquent;

use Litecms\Forum\Interfaces\CategoryRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.forum.category.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.forum.category.model.model');
    }

    public function category()
    {
        return $this->model->pluck('name','id');
    }

    public function categories()
    {
        return $this->model->pluck('name', 'slug'); 
    }
}
