<?php

namespace Litecms\Forum\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Forum\Http\Requests\ForumUserRequest;
use Litecms\Forum\Interfaces\ForumRepositoryInterface;
use Litecms\Forum\Models\Forum;

class ForumUserController extends BaseController
{
    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'web';

    /**
     * The home page route of user.
     *
     * @var string
     */
    protected $home = 'home';
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
        $this->middleware('auth:web');
        $this->middleware('auth.active:web');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ForumUserRequest $request)
    {
        $forums = $this->repository
            ->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumUserCriteria())
            ->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumQuestionCriteria())
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate();

        $this->theme->prependTitle(trans('forum::forum.names') . ' :: ');

        return $this->theme->of('forum::user.forum.index', compact('forums'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Forum $forum
     *
     * @return Response
     */
    public function show(ForumUserRequest $request, Forum $forum)
    {

        $forums = $this->repository
            ->scopeQuery(function ($query) use ($forum) {
                return $query->whereParentId($forum->id)->orderBy('id', 'DESC');
            })->all();

        return $this->theme->of('forum::user.forum.show', compact('forums', 'forum'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ForumUserRequest $request)
    {

        $forum = $this->repository->newInstance([]);
        Form::populate($forum);

        return $this->theme->of('forum::user.forum.create', compact('forum'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ForumUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $attributes['user_type'] = user_type();
            $forum = $this->repository->create($attributes);

            return redirect(trans_url('/user/forum/forum'))
                ->with('message', trans('messages.success.created', ['Module' => trans('forum::forum.name')]))
                ->with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Forum $forum
     *
     * @return Response
     */
    public function edit(ForumUserRequest $request, Forum $forum)
    {

        Form::populate($forum);

        return $this->theme->of('forum::user.forum.edit', compact('forum'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Forum $forum
     *
     * @return Response
     */
    public function update(ForumUserRequest $request, Forum $forum)
    {

        try {
            $attributes = $request->all();
            $attributes['published'] = 'No';
            $this->repository->update($attributes, $forum->getRouteKey());

            return redirect(trans_url('/user/forum/forum/' . $forum->getRouteKey()))
                ->with('message', trans('messages.success.updated', ['Module' => trans('forum::forum.name')]))
                ->with('code', 202);
        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }

    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(ForumUserRequest $request, Forum $forum)
    {
        try {
            $this->repository->delete($forum->getRouteKey());
            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('forum::forum.name')]),
                'code'     => 202,
                'redirect' => trans_url('/user/forum/forum'),
            ], 202);
        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }

    }

    /**
     * Publish the specified resource.
     *
     * @param Request $request
     * @param Forum $forum
     *
     * @return Response
     */
    public function publish(ForumUserRequest $request, Forum $forum)
    {

        try {
            $this->repository->update($request->all(), $forum->getRouteKey());

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('forum::forum.name')]),
                'code'     => 202,
                'redirect' => trans_url('/user/forum/forum/' . $forum->getRouteKey()),
            ], 202);
        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }

    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Forum $forum
     *
     * @return Response
     */
    public function bestAnswer(Forum $forum)
    {
        try {
            $forums = $this->repository->scopeQuery(function ($query) use ($forum) {
                return $query->whereParentId($forum->parent_id)->orderBy('id', 'DESC');
            })->all();

            foreach ($forums as $key => $value) {
                $value->update(['best_answer' => 0]);
            }

            $forum->update(['best_answer' => 1]);

            return redirect(trans_url('/user/forum/forum'))
                ->with('message', trans('messages.success.created', ['Module' => trans('forum::forum.name')]))
                ->with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }

    }

}
