<?php

namespace Litecms\Forum\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ResponseTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Forum\Models\Response $response)
    {
        return [
            'id'                => $response->getRouteKey(),
            'id'                => $response->id,
            'question_id'       => $response->question_id,
            'comment'           => $response->comment,
            'images'            => $response->images,
            'slug'              => $response->slug,
            'status'            => $response->status,
            'best_answer'       => $response->best_answer,
            'discription'       => $response->discription,
            'user_id'           => $response->user_id,
            'user_type'         => $response->user_type,
            'created_at'        => $response->created_at,
            'updated_at'        => $response->updated_at,
            'deleted_at'        => $response->deleted_at,
            'url'              => [
                'public' => trans_url('forum/'.$response->getPublicKey()),
                'user'   => guard_url('forum/response/'.$response->getRouteKey()),
            ], 
            'status'            => trans('app.'.$response->status),
            'created_at'        => format_date($response->created_at),
            'updated_at'        => format_date($response->updated_at),
        ];
    }
}