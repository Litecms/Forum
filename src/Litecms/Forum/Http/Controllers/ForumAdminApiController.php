<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Forum\Http\Requests\ForumAdminApiRequest;
use Litecms\Forum\Interfaces\ForumRepositoryInterface;
use Litecms\Forum\Models\Forum;

/**
 * Admin API controller class.
 */
class ForumAdminApiController extends BaseController
{

    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'admin.api';
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
        $this->middleware('api');
        $this->middleware('jwt.auth:admin.api');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        parent::__construct();
    }

    /**
     * Display a list of forum.
     *
     * @return json
     */
    public function index(ForumAdminApiRequest $request)
    {
        $forums = $this->repository
            ->setPresenter('\\Litecms\\Forum\\Repositories\\Presenter\\ForumListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->all();
        $forums['code'] = 2000;
        return response()->json($forums)
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display forum.
     *
     * @param Request $request
     * @param Model   Forum
     *
     * @return Json
     */
    public function show(ForumAdminApiRequest $request, Forum $forum)
    {
        $forum         = $forum->presenter();
        $forum['code'] = 2001;
        return response()->json($forum)
            ->setStatusCode(200, 'SHOW_SUCCESS');

    }

    /**
     * Show the form for creating a new forum.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(ForumAdminApiRequest $request, Forum $forum)
    {
        $forum         = $forum->presenter();
        $forum['code'] = 2002;
        return response()->json($forum)
            ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new forum.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(ForumAdminApiRequest $request)
    {
        try {
            $attributes            = $request->all();
            $attributes['user_id'] = user_id('admin.api');
            $forum                 = $this->repository->create($attributes);
            $forum                 = $forum->presenter();
            $forum['code']         = 2004;

            return response()->json($forum)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');

        }
    }

    /**
     * Show forum for editing.
     *
     * @param Request $request
     * @param Model   $forum
     *
     * @return json
     */
    public function edit(ForumAdminApiRequest $request, Forum $forum)
    {
        $forum         = $forum->presenter();
        $forum['code'] = 2003;
        return response()->json($forum)
            ->setStatusCode(200, 'EDIT_SUCCESS');
    }

    /**
     * Update the forum.
     *
     * @param Request $request
     * @param Model   $forum
     *
     * @return json
     */
    public function update(ForumAdminApiRequest $request, Forum $forum)
    {
        try {

            $attributes = $request->all();

            $forum->update($attributes);
            $forum         = $forum->presenter();
            $forum['code'] = 2005;

            return response()->json($forum)
                ->setStatusCode(201, 'UPDATE_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the forum.
     *
     * @param Request $request
     * @param Model   $forum
     *
     * @return json
     */
    public function destroy(ForumAdminApiRequest $request, Forum $forum)
    {

        try {

            $t = $forum->delete();

            return response()->json([
                'message' => trans('messages.success.delete', ['Module' => trans('forum::forum.name')]),
                'code'    => 2006,
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
