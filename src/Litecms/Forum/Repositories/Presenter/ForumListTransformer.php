<?php

namespace Litecms\Forum\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class ForumListTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Forum\Models\Forum $forum)
    {
        return [
            'id'          => $forum->getRouteKey(),
            'parent_id'   => ($forum->parent_id == 0) ? 'Parent' : ucfirst($forum->parent->title),
            'category_id' => @ucfirst($forum->category->name),
            'title'       => ucfirst($forum->title),
            'description' => $forum->description,
            'status'      => $forum->status,
            'published'   => ($forum->published == 'Yes') ? 'Published' : 'Pending',
            'best_answer' => $forum->best_answer,
        ];
    }
}
