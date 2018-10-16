<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Forum\Http\Requests\QuestionRequest;
use Litecms\Forum\Interfaces\QuestionRepositoryInterface;
use Litecms\Forum\Models\Question;

/**
 * Resource controller class for question.
 */
class QuestionResourceController extends BaseController
{

    /**
     * Initialize question resource controller.
     *
     * @param type QuestionRepositoryInterface $question
     *
     * @return null
     */
    public function __construct(QuestionRepositoryInterface $question)
    {
        parent::__construct();
        $this->repository = $question;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Forum\Repositories\Criteria\QuestionResourceCriteria::class);
    }

    /**
     * Display a list of question.
     *
     * @return Response
     */
    public function index(QuestionRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Forum\Repositories\Presenter\QuestionPresenter::class)
                ->$function();
        }
        
        $user_id = user_id();
        $questions = $this->repository->questions($user_id);

        return $this->response->setMetaTitle(trans('forum::question.names'))
            ->view('forum::question.index', true)
            ->data(compact('questions', 'view'))
            ->output();
    }

    /**
     * Display question.
     *
     * @param Request $request
     * @param Model   $question
     *
     * @return Response
     */
    public function show(QuestionRequest $request, Question $question)
    { 

        if ($question->exists) {
            $view = 'forum::question.show';
        } else {
            $view = 'forum::question.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('forum::question.name'))
            ->data(compact('question'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new question.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(QuestionRequest $request)
    {

        $question = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('forum::question.name')) 
            ->view('forum::question.create', true) 
            ->data(compact('question'))
            ->output();
    }

    /**
     * Create new question.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(QuestionRequest $request)
    { 
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $question                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('forum::question.name')]))
                ->code(204)
                ->status('success')
                ->url(trans_url('discussion/' . $question->slug))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/forum/question'))
                ->redirect();
        }

    }

    /**
     * Show question for editing.
     *
     * @param Request $request
     * @param Model   $question
     *
     * @return Response
     */
    public function edit(QuestionRequest $request, Question $question)
    { 
        return $this->response->setMetaTitle(trans('forum::question.name'))
            ->view('forum::question.newdiscussion')
            ->data(compact('question'))
            ->output();
    }

    /**
     * Update the question.
     *
     * @param Request $request
     * @param Model   $question
     *
     * @return Response
     */
    public function update(QuestionRequest $request, Question $question)
    { 
        try {
            $request = $request->all();
            $attributes['title'] = $request['title'];
            $attributes['question'] = $request['question'];
            $attributes['category_id'] = $request['category_id'];
            $question->update($attributes);
            
                return redirect('/discussion/'.$request['slug']);
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('forum/question/' . $question->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the question.
     *
     * @param Model   $question
     *
     * @return Response
     */
    public function destroy(QuestionRequest $request, Question $question)
    { 
        try {

            $question->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('forum::question.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('forum/question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('forum/question/' . $question->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple question.
     *
     * @param Model   $question
     *
     * @return Response
     */
    public function delete(QuestionRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('forum::question.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('forum/question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/forum/question'))
                ->redirect();
        }

    }

    /**
     * Restore deleted questions.
     *
     * @param Model   $question
     *
     * @return Response
     */
    public function restore(QuestionRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('forum::question.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/forum/question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/forum/question/'))
                ->redirect();
        }

    }

}
