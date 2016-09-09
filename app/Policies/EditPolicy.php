<?php

namespace App\Policies;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditPolicy {

    use HandlesAuthorization;

    /**
     * Determine whether the user can update the investorform.
     *
     * @param  User  $user
     * @param  InvestorForm  $investorform
     * @return mixed
     */
    public function update(User $user, Model $form) {
        return $user->id == $form->author_id;
    }

    /**
     * Determine whether the user can delete the investorform.
     *
     * @param  User  $user
     * @param  InvestorForm  $investorform
     * @return mixed
     */
    public function delete(User $user, Model $form) {
        return $user->id == $form->author_id;
    }
    

    public function offer(User $user, Model $form) {
       return $user->id == $form->author_id;
    }

}
