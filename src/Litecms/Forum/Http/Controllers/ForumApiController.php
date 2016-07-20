<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Forum\Interfaces\ForumRepositoryInterface;
use Litecms\Forum\Repositories\Presenter\ForumItemTransformer;

/**
 * Pubic API controller class.
 */
class ForumApiController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Forum\Interfaces\ForumRepositoryInterface $forum
     *
     * @return type
     */
    public function __construct(ForumRepositoryInterface $forum)
    {
        $this->repository = $forum;
        $this->middleware('api');
        parent::__construct();
    }

    /**
     * Show forum's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $forums = $this->repository
            ->setPresenter('\\Litecms\\Forum\\Repositories\\Presenter\\ForumListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate();

        $forums['code'] = 2000;
        return response()->json($forums)
            ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show forum.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $forum = $this->repository
            ->scopeQuery(function ($query) use ($slug) {
                return $query->orderBy('id', 'DESC')
                    ->where('slug', $slug);
            })->first(['*']);

        if (!is_null($forum)) {
            $forum         = $this->itemPresenter($module, new ForumItemTransformer);
            $forum['code'] = 2001;
            return response()->json($forum)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

}
