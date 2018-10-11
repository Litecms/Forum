<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Forum\Interfaces\QuestionRepositoryInterface;

class QuestionPublicController extends BaseController
{
    // use QuestionWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Question\Interfaces\QuestionRepositoryInterface $question
     *
     * @return type
     */
    public function __construct(QuestionRepositoryInterface $question)
    {
        $this->repository = $question;
        parent::__construct();
    }

    /**
     * Show question's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $questions = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate(8);


        return $this->response->setMetaTitle(trans('forum::question.names'))
            ->view('forum::public.question.index')
            ->data(compact('questions'))
            ->output();
    }

    /**
     * Show question's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $questions = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('forum::question.names'))
            ->view('forum::public.question.index')
            ->data(compact('questions'))
            ->output();
    }

    /**
     * Show question.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $question = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);
        $question->increment('viewcount');

// return view('forum::public.question.show', compact('question'));
        return $this->response->setMetaTitle(trans('forum::question.name'))
            ->view('forum::public.question.show')
            ->data(compact('question'))
            ->output();
    }

    protected function newdiscussion()
    {
        $question= array('title' =>'', 'question' =>'', 'category_id' =>'');
        return $this->response->setMetaTitle(trans('forum::question.name'))
            ->view('forum::public.question.newdiscussion')
            ->data(compact('question'))
            ->output();
    }

}
