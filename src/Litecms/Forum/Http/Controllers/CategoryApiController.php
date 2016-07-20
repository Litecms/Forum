<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\Controller as PublicController;
use Litecms\Forum\Interfaces\CategoryRepositoryInterface;
use Litecms\Forum\Repositories\Presenter\CategoryItemTransformer;

/**
 * Pubic API controller class.
 */
class CategoryApiController extends PublicController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Forum\Interfaces\CategoryRepositoryInterface $category
     *
     * @return type
     */
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->middleware('api');
        $this->repository = $category;
        parent::__construct();
    }

    /**
     * Show category's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $categories = $this->repository
            ->setPresenter('\\Litecms\\Forum\\Repositories\\Presenter\\CategoryListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate();

        $categories['code'] = 2000;
        return response()->json($categories)
            ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show category.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $category = $this->repository
            ->scopeQuery(function ($query) use ($slug) {
                return $query->orderBy('id', 'DESC')
                    ->where('slug', $slug);
            })->first(['*']);

        if (!is_null($category)) {
            $category         = $this->itemPresenter($module, new CategoryItemTransformer);
            $category['code'] = 2001;
            return response()->json($category)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

}
