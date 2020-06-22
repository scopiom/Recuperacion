<?php

namespace App\Policies;

use App\User;
use App\Content;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function store(User $autUser, Content $content)
    {
        return $autUser->id == $content->user_id;
    }
    public function propstatus(User $autUser, Content $content)
    {
        return $autUser->id == $content->user_id;
    }
    public function status(User $autUser, Content $content)
    {
        return $autUser->id == $content->user_id;
    }
}
