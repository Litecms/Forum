<?php

namespace Litecms\Forum\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Forum\Models\Question;

class QuestionPolicy
{

    /**
     * Determine if the given user can view the question.
     *
     * @param UserPolicy $user
     * @param Question $question
     *
     * @return bool
     */
    public function view(UserPolicy $user, Question $question)
    {
        if ($user->canDo('forum.question.view') && $user->isAdmin()) {
            return true;
        }

        return $question->user_id == user_id() && $question->user_type == user_type();
    }

    /**
     * Determine if the given user can create a question.
     *
     * @param UserPolicy $user
     * @param Question $question
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('forum.question.create');
    }

    /**
     * Determine if the given user can update the given question.
     *
     * @param UserPolicy $user
     * @param Question $question
     *
     * @return bool
     */
    public function update(UserPolicy $user, Question $question)
    {
        if ($user->canDo('forum.question.edit') && $user->isAdmin()) {
            return true;
        }

        return $question->user_id == user_id() && $question->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given question.
     *
     * @param UserPolicy $user
     * @param Question $question
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Question $question)
    {
        return $question->user_id == user_id() && $question->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given question.
     *
     * @param UserPolicy $user
     * @param Question $question
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Question $question)
    {
        if ($user->canDo('forum.question.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given question.
     *
     * @param UserPolicy $user
     * @param Question $question
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Question $question)
    {
        if ($user->canDo('forum.question.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
