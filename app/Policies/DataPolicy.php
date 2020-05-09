<?php

namespace App\Policies;

use App\DataCollection;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any data collections.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the data collection.
     *
     * @param  \App\User  $user
     * @param  \App\DataCollection  $dataCollection
     * @return mixed
     */
    public function view(User $user, DataCollection $dataCollection)
    {
        //
    }

    /**
     * Determine whether the user can create data collections.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the data collection.
     *
     * @param  \App\User  $user
     * @param  \App\DataCollection  $dataCollection
     * @return mixed
     */
    public function update(User $user, DataCollection $dataCollection)
    {
        return $user->id === $dataCollection->user_id
            ? Response::allow()
            : Response::deny('Вы не являетесь владельцем этих данных..');
    }

    /**
     * Determine whether the user can delete the data collection.
     *
     * @param  \App\User  $user
     * @param  \App\DataCollection  $dataCollection
     * @return mixed
     */
    public function delete(User $user, DataCollection $dataCollection)
    {
        //
    }

    /**
     * Determine whether the user can restore the data collection.
     *
     * @param  \App\User  $user
     * @param  \App\DataCollection  $dataCollection
     * @return mixed
     */
    public function restore(User $user, DataCollection $dataCollection)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the data collection.
     *
     * @param  \App\User  $user
     * @param  \App\DataCollection  $dataCollection
     * @return mixed
     */
    public function forceDelete(User $user, DataCollection $dataCollection)
    {
        //
    }
}
