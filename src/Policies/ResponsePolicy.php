<?php

namespace Litecms\Forum\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Forum\Models\Response;

class ResponsePolicy
{

    /**
     * Determine if the given user can view the response.
     *
     * @param UserPolicy $user
     * @param Response $response
     *
     * @return bool
     */
    public function view(UserPolicy $user, Response $response)
    {
        if ($user->canDo('forum.response.view') && $user->isAdmin()) {
            return true;
        }

        return $response->user_id == user_id() && $response->user_type == user_type();
    }

    /**
     * Determine if the given user can create a response.
     *
     * @param UserPolicy $user
     * @param Response $response
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('forum.response.create');
    }

    /**
     * Determine if the given user can update the given response.
     *
     * @param UserPolicy $user
     * @param Response $response
     *
     * @return bool
     */
    public function update(UserPolicy $user, Response $response)
    {
        if ($user->canDo('forum.response.edit') && $user->isAdmin()) {
            return true;
        }

        return $response->user_id == user_id() && $response->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given response.
     *
     * @param UserPolicy $user
     * @param Response $response
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Response $response)
    {
        return $response->user_id == user_id() && $response->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given response.
     *
     * @param UserPolicy $user
     * @param Response $response
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Response $response)
    {
        if ($user->canDo('forum.response.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given response.
     *
     * @param UserPolicy $user
     * @param Response $response
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Response $response)
    {
        if ($user->canDo('forum.response.approve')) {
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
