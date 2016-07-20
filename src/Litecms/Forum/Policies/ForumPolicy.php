<?php

namespace Litecms\Forum\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Litecms\Forum\Models\Forum;

class ForumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the forum.
     *
     * @param User $user
     * @param Forum $forum
     *
     * @return bool
     */
    public function view(User $user, Forum $forum)
    {

        if ($user->canDo('forum.forum.view') && $user->is('admin')) {
            return true;
        }

        return $user->id === $forum->user_id;
    }

    /**
     * Determine if the given user can create a forum.
     *
     * @param User $user
     * @param Forum $forum
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->canDo('forum.forum.create');
    }

    /**
     * Determine if the given user can update the given forum.
     *
     * @param User $user
     * @param Forum $forum
     *
     * @return bool
     */
    public function update(User $user, Forum $forum)
    {

        if ($user->canDo('forum.forum.update') && $user->is('admin')) {
            return true;
        }

        return $user->id === $forum->user_id;
    }

    /**
     * Determine if the given user can delete the given forum.
     *
     * @param User $user
     * @param Forum $forum
     *
     * @return bool
     */
    public function destroy(User $user, Forum $forum)
    {

        if ($user->canDo('forum.forum.delete') && $user->is('admin')) {
            return true;
        }

        return true;
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

        if ($user->isSuperUser()) {
            return true;
        }

    }

}
