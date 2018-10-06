<?php

namespace Litecms\Forum\Repositories\Eloquent;

use Litecms\Forum\Interfaces\ResponseRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ResponseRepository extends BaseRepository implements ResponseRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.forum.response.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.forum.response.model.model');
    }

    public function updatecomment($request)
    {
        if($request['best_answer'] == 'no')
        {
            return $this->model
                           ->where('id','=',$request['comment_id'])
                           ->update(['best_answer' => $request['best_answer']]);
        }else
        {
            $this->model
                        ->where('id','=',$request['comment_id'])
                        ->update(['best_answer' => $request['best_answer']]);

            return $this->model
                        ->where('id','<>',$request['comment_id'])
                        ->update(['best_answer' => 'no']);
        }
    }
}
