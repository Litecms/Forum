<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Forum\Http\Requests\CategoryRequest;
use Litecms\Forum\Interfaces\CategoryRepositoryInterface;
use Litecms\Forum\Models\Category;

/**
 * Resource controller class for category.
 */
class CategoryResourceController extends BaseController
{

    /**
     * Initialize category resource controller.
     *
     * @param type CategoryRepositoryInterface $category
     *
     * @return null
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        parent::__construct();
        $this->repository = $category;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Forum\Repositories\Criteria\CategoryResourceCriteria::class);
    }

    /**
     * Display a list of category.
     *
     * @return Response
     */
    public function index(CategoryRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Forum\Repositories\Presenter\CategoryPresenter::class)
                ->$function();
        }

        $categories = $this->repository->paginate();

        return $this->response->title(trans('forum::category.names'))
            ->view('forum::category.index', true)
            ->data(compact('categories'))
            ->output();
    }

    /**
     * Display category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function show(CategoryRequest $request, Category $category)
    {

        if ($category->exists) {
            $view = 'forum::category.show';
        } else {
            $view = 'forum::category.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('forum::category.name'))
            ->data(compact('category'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CategoryRequest $request)
    {

        $category = $this->repository->newInstance([]);
        return $this->response->title(trans('app.new') . ' ' . trans('forum::category.name')) 
            ->view('forum::category.create', true) 
            ->data(compact('category'))
            ->output();
    }

    /**
     * Create new category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $category                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('forum::category.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('forum/category/' . $category->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/forum/category'))
                ->redirect();
        }

    }

    /**
     * Show category for editing.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function edit(CategoryRequest $request, Category $category)
    {
        return $this->response->title(trans('app.edit') . ' ' . trans('forum::category.name'))
            ->view('forum::category.edit', true)
            ->data(compact('category'))
            ->output();
    }

    /**
     * Update the category.
     *
     * @param Request $request
     * @param Model   $category
     *
     * @return Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $attributes = $request->all();

            $category->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('forum::category.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('forum/category/' . $category->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('forum/category/' . $category->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the category.
     *
     * @param Model   $category
     *
     * @return Response
     */
    public function destroy(CategoryRequest $request, Category $category)
    {
        try {

            $category->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('forum::category.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('forum/category/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('forum/category/' . $category->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple category.
     *
     * @param Model   $category
     *
     * @return Response
     */
    public function delete(CategoryRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('forum::category.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('forum/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/forum/category'))
                ->redirect();
        }

    }

    /**
     * Restore deleted categories.
     *
     * @param Model   $category
     *
     * @return Response
     */
    public function restore(CategoryRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('forum::category.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/forum/category'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/forum/category/'))
                ->redirect();
        }

    }

    
}
