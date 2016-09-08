<?php

namespace App\Policies;

use App\User;
use App\Models\InvestorForm;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvestorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the investorform.
     *
     * @param  User  $user
     * @param  InvestorForm  $investorform
     * @return mixed
     */
    public function update(User $user, InvestorForm $investorform)
    {
        return $user->id == $investorform->author_id;
    }

    /**
     * Determine whether the user can delete the investorform.
     *
     * @param  User  $user
     * @param  InvestorForm  $investorform
     * @return mixed
     */
    public function delete(User $user, InvestorForm $investorform)
    {
        return $user->id == $investorform->author_id;
    }

    public function offer(User $user, InvestorForm $form){
        return $user->id != $form->author_id;
    }
}
