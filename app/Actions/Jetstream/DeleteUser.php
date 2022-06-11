<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\Deletesusers;

class DeleteUser implements Deletesusers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
