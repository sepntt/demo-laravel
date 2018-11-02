<?php

namespace App\Repository\Backend;

use App\Repository\RepositoryAbstract;
use App\Repository\Backend\UserInterface;
use Illuminate\Foundation\Auth\ResetsPasswords;

class UserRepository extends RepositoryAbstract implements UserInterface
{
    use ResetsPasswords;

    public $model = '\App\User';

    public function updatePassword($request)
    {
        $res = false;
        do {
            if(empty($request->password)) {
                $res = false;
                break;
            }
            if($request->password != $request->repassword) {
                $res = false;
                break;
            }
            $user = \Auth::user();
            if(!\Hash::check($request->oldpassword, $user->password)) {
                $res = false;
                break;
            }
            $this->resetPassword($user, $request->password);
            // dd(\Hash::make($request->oldpassword));
            $res = true;
        } while (false);
        return $res;
    }

}
