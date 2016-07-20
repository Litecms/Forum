<?php

namespace Litecms\Forum\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class ForumItemTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Forum\Models\Forum $forum)
    {
        return [
            'id'          => $forum->getRouteKey(),
            'parent_id'   => $forum->parent_id,
            'category_id' => $forum->category_id,
            'title'       => $forum->title,
            'description' => $forum->description,
            'status'      => $forum->status,
            'published'   => $forum->published,
            'best_answer' => $forum->best_answer,
        ];
    }
}
