<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Forum\Interfaces\ForumRepositoryInterface;

class ForumController extends BaseController
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
        $this->middleware('web');
        $this->setupTheme(config('theme.themes.public.theme'), config('theme.themes.public.layout'));
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
            ->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumPublicCriteria())
            ->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumQuestionCriteria())
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->all();

        return $this->theme->of('forum::public.forum.index', compact('forums'))->render();
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
        $forum = $this->repository->scopeQuery(function ($query) use ($slug) {
            return $query->orderBy('id', 'DESC')
                ->where('slug', $slug);
        })->first(['*']);

        $forums = $this->repository->scopeQuery(function ($query) use ($forum) {
            return $query->whereParentId($forum->id)->where('published', 'Yes')->orderBy('id', 'DESC');
        })->all();

        return $this->theme->of('forum::public.forum.show', compact('forum', 'forums'))->render();
    }

    /**
     * take categoires
     * @param type $category
     * @return type
     */

    protected function category($category)
    {

        $forums = $this->repository->categorys($category);

        return $this->theme->of('forum::public.forum.index', compact('forums'))->render();
    }

}
