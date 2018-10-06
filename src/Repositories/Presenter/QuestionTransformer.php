<?php

namespace Litecms\Forum\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class QuestionTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Forum\Models\Question $question)
    {
        return [
            'id'                => $question->getRouteKey(),
            'category_id'       => $question->category_id,
            'user_id'           => $question->user_id,
            'user_type'         => $question->user_type,
            'title'             => $question->title,
            'question'          => $question->question,
            'slug'              => $question->slug,
            'images'            => $question->images,
            'viewcount'         => $question->viewcount,
            'published'         => $question->published,
            'status'            => $question->status,
            'upload_folder'     => $question->upload_folder,
            'created_at'        => $question->created_at,
            'updated_at'        => $question->updated_at,
            'deleted_at'        => $question->deleted_at,
            'url'              => [
                'public' => trans_url('forum/'.$question->getPublicKey()),
                'user'   => guard_url('forum/question/'.$question->getRouteKey()),
            ], 
            'status'            => trans('app.'.$question->status),
            'created_at'        => format_date($question->created_at),
            'updated_at'        => format_date($question->updated_at),
        ];
    }
}