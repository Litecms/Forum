<?php

namespace Litecms\Forum;

use User;

class Forum
{
    /**
     * $forum object.
     */
    protected $forum, $category;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Forum\Interfaces\ForumRepositoryInterface $forum,
        \Litecms\Forum\Interfaces\CategoryRepositoryInterface                          $category) {
        $this->forum = $forum;
        $this->category = $category;
    }

    /**
     * Returns count of forum.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count($module = 'forum')
    {

        if (User::hasRole('user')) {
            $this->forum->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumUserCriteria());
        }

        if ($module == 'forum') {
            return $this->forum
                ->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumQuestionCriteria())
                ->scopeQuery(function ($query) {
                    return $query;
                })
                ->count();
        }

        return $this->category
            ->scopeQuery(function ($query) {
                return $query;
            })->count();

    }

    /**
     * take forum categories
     * @return type
     */

    public function categories()
    {
        $temp = [];
        $category = $this->category
            ->scopeQuery(function ($query) {
                return $query->orderBy('name', 'ASC');
            })->all();

        foreach ($category as $key => $value) {
            $temp[$value->id] = ucfirst($value->name);
        }

        return $temp;
    }

    /**
     * Returns count of forum.
     *
     * @param array $filter
     *
     * @return int
     */
    public function answers($id)
    {
        return $this->forum
                ->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumPublicCriteria())
                ->scopeQuery(function ($query) use ($id) {
                    return $query->whereParentId($id);
                })
                ->count();
    }

    public function questions()
    {
        $temp = [];
        $forum = $this->forum->getParent();
        $temp[0] = 'Parent';

        foreach ($forum as $key => $value) {
            $temp[$value->id] = ucfirst($value->title);
        }

        return $temp;
    }

    /**
     * Display  gadget
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return int
     */
    public function gadget($view = 'admin.forum.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->forum->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumUserCriteria());
        }

        $forums = $this->forum
            ->pushCriteria(new \Litecms\Forum\Repositories\Criteria\ForumQuestionCriteria())
            ->scopeQuery(function ($query) use ($count) {
                return $query->orderBy('id', 'DESC')->take($count);
            })->all();

        return view('forum::' . $view, compact('forums'))->render();
    }

    /**
     * count of forum category
     * @param type $id
     * @return type
     */
    public function countCategory($id)
    {

        return $this->forum->countCategory($id);
    }

}
