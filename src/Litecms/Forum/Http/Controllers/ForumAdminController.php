<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Forum\Http\Requests\ForumAdminRequest;
use Litecms\Forum\Interfaces\ForumRepositoryInterface;
use Litecms\Forum\Models\Forum;

/**
 * Admin web controller class.
 */
class ForumAdminController extends BaseController
{
    /**
     * Initialize forum controller.
     *
     * @param type ForumRepositoryInterface $forum
     *
     * @return type
     */
    public function __construct(ForumRepositoryInterface $forum)
    {
        $this->repository = $forum;
        $this->middleware('web');
        $this->middleware('auth:admin.web');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        parent::__construct();
    }

    /**
     * Display a list of forum.
     *
     * @return Response
     */
    public function index(ForumAdminRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        if ($request->wantsJson()) {
            $forums = $this->repository
                ->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumQuestionCriteria())
                ->setPresenter('\\Litecms\\Forum\\Repositories\\Presenter\\ForumListPresenter')
                ->scopeQuery(function ($query) {
                    return $query->orderBy('id', 'DESC');
                })->paginate($pageLimit);

            $forums['recordsTotal']    = $forums['meta']['pagination']['total'];
            $forums['recordsFiltered'] = $forums['meta']['pagination']['total'];
            $forums['request']         = $request->all();
            return response()->json($forums, 200);

        }

        $this->theme->prependTitle(trans('forum::forum.names') . ' :: ');
        return $this->theme->of('forum::admin.forum.index')->render();
    }

    /**
     * Display forum.
     *
     * @param Request $request
     * @param Model   $forum
     *
     * @return Response
     */
    public function show(ForumAdminRequest $request, Forum $forum)
    {

        if (!$forum->exists) {
            return response()->view('forum::admin.forum.new', compact('forum'));
        }

        Form::populate($forum);
        return response()->view('forum::admin.forum.show', compact('forum'));
    }

    /**
     * Show the form for creating a new forum.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ForumAdminRequest $request)
    {

        $forum = $this->repository->newInstance([]);

        Form::populate($forum);

        return response()->view('forum::admin.forum.create', compact('forum'));

    }

    /**
     * Create new forum.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ForumAdminRequest $request)
    {
        try {
            $attributes            = $request->all();
            $attributes['user_id'] = user_id('admin.web');
            $forum                 = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('forum::forum.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/forum/forum/' . $forum->getRouteKey()),
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
        }

    }

    /**
     * Show forum for editing.
     *
     * @param Request $request
     * @param Model   $forum
     *
     * @return Response
     */
    public function edit(ForumAdminRequest $request, Forum $forum)
    {
        Form::populate($forum);
        return response()->view('forum::admin.forum.edit', compact('forum'));
    }

    /**
     * Update the forum.
     *
     * @param Request $request
     * @param Model   $forum
     *
     * @return Response
     */
    public function update(ForumAdminRequest $request, Forum $forum)
    {
        try {

            $attributes = $request->all();

            $forum->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('forum::forum.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/forum/forum/' . $forum->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/forum/forum/' . $forum->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Remove the forum.
     *
     * @param Model   $forum
     *
     * @return Response
     */
    public function destroy(ForumAdminRequest $request, Forum $forum)
    {

        try {

            $t = $forum->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('forum::forum.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/forum/forum/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/forum/forum/' . $forum->getRouteKey()),
            ], 400);
        }

    }

}
