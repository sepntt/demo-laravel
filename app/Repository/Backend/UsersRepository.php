<?php

namespace App\Repository\Backend;

use App\Repository\RepositoryAbstract;

use Illuminate\Foundation\Auth\ResetsPasswords;

class UsersRepository extends RepositoryAbstract implements UsersInterface
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
