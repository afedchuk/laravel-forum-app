<?php
namespace App\Policies;

use App\User;
use App\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param User $user
     * @param Thread $thread
     * @return mixed
     */
    public function view(User $user, Thread $thread)
    {
        return true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param User  $user
     * @param Thread  $thread
     * @return mixed
     */
    public function update(User $user, Thread $thread)
    {
        return $thread->id == $thread->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  User  $user
     * @param Thread $thread
     * @return mixed
     */
    public function delete(User $user, Thread $thread)
    {
        return $user->id == $thread->user_id;
    }
}
