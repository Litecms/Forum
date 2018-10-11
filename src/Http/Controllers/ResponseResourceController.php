<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Forum\Http\Requests\ResponseRequest;
use Litecms\Forum\Interfaces\ResponseRepositoryInterface;
use Litecms\Forum\Interfaces\QuestionRepositoryInterface;
use Litecms\Forum\Models\Response;
use Illuminate\Http\Request;


/**
 * Resource controller class for response.
 */
class ResponseResourceController extends BaseController
{

    /**
     * Initialize response resource controller.
     *
     * @param type ResponseRepositoryInterface $response
     *
     * @return null
     */
    public function __construct(ResponseRepositoryInterface $response,
                                QuestionRepositoryInterface $question)
    {
        parent::__construct();
        $this->repository = $response;
        $this->question = $question;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Forum\Repositories\Criteria\ResponseResourceCriteria::class);
    }

    /**
     * Display a list of response.
     *
     * @return Response
     */
    public function index(ResponseRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Forum\Repositories\Presenter\ResponsePresenter::class)
                ->$function();
        }

        $responses = $this->repository->paginate();

        return $this->response->setMetaTitle(trans('forum::response.names'))
            ->view('forum::response.index', true)
            ->data(compact('responses'))
            ->output();
    }

    /**
     * Display response.
     *
     * @param Request $request
     * @param Model   $response
     *
     * @return Response
     */
    public function show(ResponseRequest $request, Response $response)
    {

        if ($response->exists) {
            $view = 'forum::response.show';
        } else {
            $view = 'forum::response.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('forum::response.name'))
            ->data(compact('response'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new response.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ResponseRequest $request)
    {

        $response = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('forum::response.name')) 
            ->view('forum::response.create', true) 
            ->data(compact('response'))
            ->output();
    }

    /**
     * Create new response.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ResponseRequest $request)
    {

        try {
            $request              = $request->all(); 
            $slug = $request['slug']; 
            $attributes['comment'] = $request['comment'];
            $attributes['question_id'] = $request['question_id'];
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $response                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('forum::response.name')]))
                ->code(204)
                ->status('success')
                ->url(trans_url('/discussion/'.$slug))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(trans_url('/question/'.$slug))
                ->redirect();
        }

    }

    /**
     * Show response for editing.
     *
     * @param Request $request
     * @param Model   $response
     *
     * @return Response
     */
    public function edit(ResponseRequest $request, Response $response)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('forum::response.name'))
            ->view('forum::response.edit', true)
            ->data(compact('response'))
            ->output();
    }

    /**
     * Update the response.
     *
     * @param Request $request
     * @param Model   $response
     *
     * @return Response
     */
    public function update(ResponseRequest $request, Response $response)
    {
        try {
            $attributes = $request->all();
            $id = $attributes['question_id']; 
            $question = $this->question->selectquestion($id); 
            $response->update($attributes);
            return redirect('/discussion/'.$question['slug']);
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('forum/response/' . $response->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the response.
     *
     * @param Model   $response
     *
     * @return Response
     */
    public function destroy(ResponseRequest $request, Response $response)
    { 
        try {
            $id = $response['question_id']; 
            $question = $this->question->selectquestion($id); 
            $response->delete();
            return redirect('/discussion/'.$question['slug']);


        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('forum/response/' . $response->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple response.
     *
     * @param Model   $response
     *
     * @return Response
     */
    public function delete(ResponseRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('forum::response.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('forum/response'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/forum/response'))
                ->redirect();
        }

    }

    /**
     * Restore deleted responses.
     *
     * @param Model   $response
     *
     * @return Response
     */
    public function restore(ResponseRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('forum::response.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/forum/response'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/forum/response/'))
                ->redirect();
        }

    }

    public function bestanswer(Request $request)
    {

        $request = $request->all(); 
        $c = $this->repository->updatecomment($request);
        return redirect('/discussion/'.$request['slug']);
        
    }


}
