<?php

namespace App\Policies;

use App\EventDate;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventDatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any event dates.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the event date.
     *
     * @param  \App\User  $user
     * @param  \App\EventDate  $eventDate
     * @return mixed
     */
    public function view(User $user, EventDate $eventDate)
    {
        //
    }

    /**
     * Determine whether the user can create event dates.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the event date.
     *
     * @param  \App\User  $user
     * @param  \App\EventDate  $eventDate
     * @return mixed
     */
    public function update(User $user, EventDate $eventDate)
    {
        return $user->id === $eventDate->event->user_id;
    }

    /**
     * Determine whether the user can delete the event date.
     *
     * @param  \App\User  $user
     * @param  \App\EventDate  $eventDate
     * @return mixed
     */
    public function delete(User $user, EventDate $eventDate)
    {
        return $user->id === $eventDate->event->user_id;
    }

    /**
     * Determine whether the user can restore the event date.
     *
     * @param  \App\User  $user
     * @param  \App\EventDate  $eventDate
     * @return mixed
     */
    public function restore(User $user, EventDate $eventDate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the event date.
     *
     * @param  \App\User  $user
     * @param  \App\EventDate  $eventDate
     * @return mixed
     */
    public function forceDelete(User $user, EventDate $eventDate)
    {
        //
    }
}
