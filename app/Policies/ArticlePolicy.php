<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Article $article
     * @return void
     */
    public function view(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return void
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response
     */
    public function update(User $user, Article $article)
    {
        return $user->id == $article->user_id || $user->organization_id == $article->user_id || $user->is_admin
            ? Response::allow()
            : Response::deny('You do not own this article.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response|bool
     */
    public function delete(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response|bool
     */
    public function restore(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Article $article
     * @return Response|bool
     */
    public function forceDelete(User $user, Article $article)
    {
        //
    }
}
