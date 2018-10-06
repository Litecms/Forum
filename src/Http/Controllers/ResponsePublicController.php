<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Forum\Interfaces\ResponseRepositoryInterface;

class ResponsePublicController extends BaseController
{
    // use ResponseWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Response\Interfaces\ResponseRepositoryInterface $response
     *
     * @return type
     */
    public function __construct(ResponseRepositoryInterface $response)
    {
        $this->repository = $response;
        parent::__construct();
    }

    /**
     * Show response's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $responses = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->title(trans('forum::response.names'))
            ->view('forum::public.response.index')
            ->data(compact('responses'))
            ->output();
    }

    /**
     * Show response's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $responses = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->title(trans('forum::response.names'))
            ->view('forum::public.response.index')
            ->data(compact('responses'))
            ->output();
    }

    /**
     * Show response.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $response = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->response->title($$response->name . trans('forum::response.name'))
            ->view('forum::public.response.show')
            ->data(compact('response'))
            ->output();
    }

}
