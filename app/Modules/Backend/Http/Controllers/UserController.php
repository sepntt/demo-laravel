<?php

namespace App\Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Backend\UserInterface;

class UserController extends Controller
{
    public $User;

    public function __construct(UserInterface $UserInterface)
    {
        $this->User = $UserInterface;//构造函数的注入等于下面make
        // $UserInterface = app()->make(UserInterface::class);

        # code...
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        list($list, $count) = $this->User->list($request);
        return $this->render(['list' => $list]);
    }

    public function store(Request $request)
    {
        if($this->User->updatePassword($request)) {
            dd(111);
            return redirect('user');
        }
        return back()->withErrors('原密码或者新密码不正确！')->withInput();;
    }
}
