<?php

namespace Litecms\Forum;

use User;

class Forum
{
    /**
     * $category object.
     */
    protected $category;
    /**
     * $question object.
     */
    protected $question;
    /**
     * $response object.
     */
    protected $response;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Forum\Interfaces\CategoryRepositoryInterface $category,
        \Litecms\Forum\Interfaces\QuestionRepositoryInterface $question,
        \Litecms\Forum\Interfaces\ResponseRepositoryInterface $response)
    {
        $this->category = $category;
        $this->question = $question;
        $this->response = $response;
    }

    /**
     * Returns count of forum.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.category.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->category->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\CategoryUserCriteria());
        }

        $category = $this->category->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('forum::' . $view, compact('category'))->render();
    }
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    // public function gadget($view = 'admin.question.gadget', $count = 10)
    // {

    //     if (User::hasRole('user')) {
    //         $this->question->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\QuestionUserCriteria());
    //     }

    //     $question = $this->question->scopeQuery(function ($query) use ($count) {
    //         return $query->orderBy('id', 'DESC')->take($count);
    //     })->all();

    //     return view('forum::' . $view, compact('question'))->render();
    // }
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    // public function gadget($view = 'admin.response.gadget', $count = 10)
    // {

    //     if (User::hasRole('user')) {
    //         $this->response->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\ResponseUserCriteria());
    //     }

    //     $response = $this->response->scopeQuery(function ($query) use ($count) {
    //         return $query->orderBy('id', 'DESC')->take($count);
    //     })->all();

    //     return view('forum::' . $view, compact('response'))->render();
    // }

    public function category()
    {
        return $this->category->category();
    }

    public function categories()
    {
        return $this->category->categories();
    }

    
}
