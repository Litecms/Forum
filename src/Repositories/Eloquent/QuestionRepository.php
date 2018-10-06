<?php

namespace Litecms\Forum\Repositories\Eloquent;

use Litecms\Forum\Interfaces\QuestionRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.forum.question.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.forum.question.model.model');
    }

    public function questions($user_id)
    {
        return $this->model->where('user_id', $user_id)->paginate(6);
    }

    public function selectquestion($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
