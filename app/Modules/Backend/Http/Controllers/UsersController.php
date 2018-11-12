<?php

namespace App\Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\Backend\UsersInterface;

class UsersController extends Controller
{
    public $Users;

    public function __construct(UsersInterface $UsersInterface)
    {
        parent::__construct();
        $UsersInterface = app()->make(UsersInterface::class);
        $this->Users = $UsersInterface;//构造函数的注入等于下面make
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        list($data, $count, $page) = $this->Users->list($request);
        return $this->render(['data' => $data, 'page' => $page, 'json_data' => json_encode($data)]);
    }

    public function show($id)
    {
        if(is_null($id)) {
            $id = app('Auth')::user()->id;
        }
        $user = $this->Users->get($id);
        return $this->render(['user' => $user]);
    }

    public function create()
    {
        return $this->render(['user' => $user]);
    }

    public function store(Request $request)
    {
        if($this->Users->updatePassword($request)) {
            return redirect('backend/user')->with('success', '修改密码成功!');
        }
        return back()->with('warning','原密码或者新密码不正确!')->withInput();
        // return back()->withErrors('原密码或者新密码不正确!')->withInput();
    }

    public function edit($id)
    {
        if(is_null($id)) {
            $id = app('Auth')::user()->id;
        }
        $user = $this->Users->get($id);
        return $this->render(['user' => $user]);
    }

    public function update(Request $request)
    {
        # code...
    }

    public function destroy($id)
    {
        # code...
    }

    public function users(Request $request)
    {
        list($data, $count, $page) = $this->Users->list($request);
        return $this->render(['data' => $data, 'page' => $page, 'json_data' => json_encode($data)]);
    }

    // public function edit($id)
    // {
    //     # code...
    // }
}
