<?php

namespace Litecms\Forum\Repositories\Criteria;

use Litepie\Repository\Contracts\CriteriaInterface;
use Litepie\Repository\Contracts\RepositoryInterface;

class CategoryResourceCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model;
        return $model;
    }
}