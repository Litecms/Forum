<?php

namespace Litecms\Forum\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class CategoryItemTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Forum\Models\Category $category)
    {
        return [
            'id'     => $category->getRouteKey(),
            'name'   => $category->name,
            'status' => $category->status,
            'image'  => $category->image,
        ];
    }
}
